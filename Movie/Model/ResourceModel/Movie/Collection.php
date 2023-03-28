<?php

namespace Magenest\Movie\Model\ResourceModel\Movie;

use Magenest\Movie\Model\Movie as Model;
use Magenest\Movie\Model\ResourceModel\Movie as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'magenest_movie_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
