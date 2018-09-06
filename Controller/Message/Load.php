<?php
namespace Godogi\LiveChat\Controller\Message;

class Load extends \Magento\Framework\App\Action\Action
{
	protected $resultJsonFactory; 
	protected $messageModel;
	protected $sessionManager;
	protected $messageCollectionFactory;

	public function __construct(\Magento\Framework\App\Action\Context $context,
								\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
								\Godogi\LiveChat\Model\Message  $messageModel,
								\Godogi\LiveChat\Model\ResourceModel\Message\CollectionFactory $messageCollectionFactory,
								\Magento\Framework\Session\SessionManager $sessionManager)
	{
		$this->resultJsonFactory 	= $resultJsonFactory;
		$this->messageModel 		= $messageModel;
		$this->sessionManager = $sessionManager;
		$this->messageCollectionFactory = $messageCollectionFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$postMessage = $this->getRequest()->getPost();
		$collection = $this->messageCollectionFactory->create();
		$collection->addFieldToFilter('session_id', array('eq' => $postMessage['session-id']));
		$collection->setOrder('created_at','ASC');
		$result = $this->resultJsonFactory->create();
		$result->setData($collection->getData());
		return  $result;
	}
}