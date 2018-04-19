<?php
namespace Godogi\Livechat\Model;
class Message extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Godogi\Livechat\Model\ResourceModel\Message');
	}
}