<?php
namespace Godogi\LiveChat\Model\ResourceModel\Message;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Godogi\LiveChat\Model\Message', 'Godogi\LiveChat\Model\ResourceModel\Message');
	}
}