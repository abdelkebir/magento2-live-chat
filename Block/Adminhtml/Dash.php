<?php
namespace Godogi\LiveChat\Block\Adminhtml;
class Dash extends \Magento\Framework\View\Element\Template
{
	protected $_storeManager;
	protected $_livechatFactory;
	protected $_backendUrl;
	protected $_urlInterface;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
								\Magento\Store\Model\StoreManagerInterface $storeManager,
								\Magento\Backend\Model\UrlInterface $backendUrl,
								\Godogi\LiveChat\Model\ResourceModel\Message\CollectionFactory $livechatFactory,
								\Magento\Framework\UrlInterface $urlInterface)
	{
		$this->_storeManager = $storeManager;
		$this->_backendUrl = $backendUrl;
		$this->_livechatFactory = $livechatFactory;
		$this->_urlInterface = $urlInterface;
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
	public function getFormAdminAction(){
		return $this->_backendUrl->getUrl('livechat/message/send');
	}
	
}
