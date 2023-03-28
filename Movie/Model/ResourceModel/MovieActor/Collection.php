<?php

namespace Magenest\Movie\Model\ResourceModel\MovieActor;

class Collection
{
    protected $resourceConnection;

    public function __construct(
        \Magento\Framework\App\ResourceConnection $resourceConnection
    )
    {
        $this->resourceConnection = $resourceConnection;
    }

    public function getDataByMovieId($movieId)
    {
        $connection = $this->resourceConnection->getConnection();
        $tableName = $this->resourceConnection->getTableName('magenest_movie_actor');
        $sql = "SELECT * FROM " .$tableName. " WHERE movie_id = " .$movieId;
        $connection->query($sql);
        return $connection->fetchAll($sql);
    }

}
