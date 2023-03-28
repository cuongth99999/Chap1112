<?php

namespace Magenest\Movie\Model\ResourceModel\Actor;

use Magenest\Movie\Model\Actor as Model;
use Magenest\Movie\Model\ResourceModel\Actor as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'magenest_actor_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
