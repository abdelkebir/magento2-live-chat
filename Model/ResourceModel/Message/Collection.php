<?php
namespace Godogi\Livechat\Model\ResourceModel\Message;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Godogi\Livechat\Model\Message', 'Godogi\Livechat\Model\ResourceModel\Message');
	}
}