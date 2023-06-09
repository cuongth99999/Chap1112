<?php

namespace Magenest\Movie\Model\ResourceModel\Movie\Grid;

use Magento\Eav\Model\ResourceModel\Entity\Attribute;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Sales\Model\Order\Item as ItemOrder;
use Magento\Sales\Model\ResourceModel\Order\Item;
use Psr\Log\LoggerInterface as Logger;

class Collection extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult
{
    protected $itemOrder;

    /**
     * @var \Magento\Ui\DataProvider\AddFilterToCollectionInterface[]
     */
    protected $addFilterStrategies;

    public function __construct(
        Attribute $eavAttribute,
        ItemOrder $itemOrder,
        EntityFactory $entityFactory,
        Logger $logger,
        FetchStrategy $fetchStrategy,
        EventManager $eventManager,
        array $addFilterStrategies = [],
        $mainTable = 'magenest_movie',
        $resourceModel = Item::class,
        $identifierName = null,
        $connectionName = null
    )
    {
        $this->addFilterStrategies = $addFilterStrategies;
        $this->itemOrder = $itemOrder;
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel, $identifierName, $connectionName);
    }

    protected function _initSelect()
    {
        parent::_initSelect();
        $john = $this->getSelect()->joinLeft(
            ['movie_director' => $this->getTable('magenest_director')],
            'main_table.director_id = movie_director.director_id');

        $john2 = $this->getSelect()->joinLeft(
            ['movie_actor' => $this->getTable('magenest_actor')],
            'main_table.movie_id = movie_actor.movie_id');
        return $this;
    }
}
