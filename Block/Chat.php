<?php
namespace Godogi\Livechat\Block;
class Chat extends \Magento\Framework\View\Element\Template
{
	public $_storeManager;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
								\Magento\Store\Model\StoreManagerInterface $storeManager)
	{
		$this->_storeManager=$storeManager;
		parent::__construct($context);
	}

	public function getFormAction(){
		return $this->_storeManager->getStore()->getUrl('livechat/comment/send');
	}
}
