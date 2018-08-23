<?php
namespace Godogi\Livechat\Block;
class Dash extends \Magento\Framework\View\Element\Template
{
	public $_storeManager;
	public $_livechatFactory;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
								\Magento\Store\Model\StoreManagerInterface $storeManager,
								\Godogi\Livechat\Model\ResourceModel\Message\CollectionFactory $livechatFactory)
	{
		$this->_storeManager = $storeManager;
		$this->_livechatFactory = $livechatFactory;
		parent::__construct($context);
	}

	public function getSessions(){
		$livechatCollection = $this->_livechatFactory->create();
		$livechatCollection->setOrder('created_at','DESC');
		$livechatCollection->getSelect()->group('session_id');
		return $livechatCollection;
	}
	public function getDiscussions($sessionId){
		$livechatCollection = $this->_livechatFactory->create();
		$livechatCollection->setOrder('created_at','DESC');
		$livechatCollection->addFieldToFilter('session_id', array('eq' => $sessionId));
		return $livechatCollection;
	}
}
