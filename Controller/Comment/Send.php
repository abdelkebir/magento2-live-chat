<?php
namespace Godogi\Livechat\Controller\Comment;

class Send extends \Magento\Framework\App\Action\Action
{
	protected $resultJsonFactory; 

	public function __construct(\Magento\Framework\App\Action\Context $context,
								\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory)
	{
		$this->resultJsonFactory = $resultJsonFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		return  $this->resultJsonFactory->create()->setData(['is_ok' => 'yes']);
	}
}