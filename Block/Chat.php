<?php
namespace Godogi\LiveChat\Block;
class Chat extends \Magento\Framework\View\Element\Template
{
	protected $_storeManager;
	protected $_session;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
								\Magento\Store\Model\StoreManagerInterface $storeManager,
								\Magento\Framework\Session\SessionManager $sessionManager)
	{
		$this->_storeManager=$storeManager;
		parent::__construct($context);
	}

	public function getFormAction(){
		return $this->_storeManager->getStore()->getUrl('livechat/message/send');
	}
	
	public function getSessionId(){
		return $this->_session->getSessionId();
	}
}