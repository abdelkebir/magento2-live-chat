<?php
namespace Godogi\LiveChat\Controller\Adminhtml\Message;

class Send extends \Magento\Framework\App\Action\Action
{
	protected $resultJsonFactory; 
	protected $messageModel;
	protected $sessionManager;

	public function __construct(\Magento\Framework\App\Action\Context $context,
								\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
								\Godogi\LiveChat\Model\Message  $messageModel,
								\Magento\Framework\Session\SessionManager $sessionManager)
	{
		$this->resultJsonFactory 	= $resultJsonFactory;
		$this->messageModel 		= $messageModel;
		$this->sessionManager = $sessionManager;
		return parent::__construct($context);
	}

	public function execute()
	{
		$postMessage = $this->getRequest()->getPost();
		$message = $this->messageModel;
		$message->setSessionId($postMessage['session']);
		$message->setMessage($postMessage['message']);
		$message->setIsAdmin(true);
		$created = false;
        if($message->save()){
        	return  $this->resultJsonFactory->create()->setData(['created' => true, 'message ID' => $message->getId()]);
        }else{
        	return  $this->resultJsonFactory->create()->setData(['created' => false]);
        }
	}
}