<?php
namespace Godogi\LiveChat\Model;
class Message extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Godogi\LiveChat\Model\ResourceModel\Message');
	}
}