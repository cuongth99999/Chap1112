<?php

namespace Magenest\Movie\Block;

use Magento\Framework\View\Element\Template;
use Magenest\Movie\Model\ResourceModel\DirectorFactory As DirectorResourceModelFactory;
use Magenest\Movie\Model\ResourceModel\ActorFactory As ActorResourceModelFactory;

class DataMovie extends Template
{

    public $actor;
    public $director;
    public $movie;

    public function __construct(
        Template\Context $context,
        \Magenest\Movie\Model\ResourceModel\Actor\CollectionFactory $actorFactory,
        \Magenest\Movie\Model\ResourceModel\Director\CollectionFactory $directorFactory,
        \Magenest\Movie\Model\ResourceModel\Movie\CollectionFactory $movieFactory,
        \Magenest\Movie\Model\DirectorFactory $directorModelFactory,
        \Magenest\Movie\Model\ActorFactory $actorModelFactory,
        DirectorResourceModelFactory $directorResourceModelFactory,
        ActorResourceModelFactory $actorResourceModelFactory,
        array $data = []
    )
    {
        $this->actor = $actorFactory;
        $this->director = $directorFactory;
        $this->movie = $movieFactory;
        $this->directorFactory = $directorModelFactory;
        $this->actorFactory = $actorModelFactory;
        $this->directorResourceModelFactory = $directorResourceModelFactory;
        $this->actorResourceModelFactory = $actorResourceModelFactory;
        parent::__construct($context, $data);
    }

    public function getActor() {
        return $this->actor->create();
    }

    public function getDirector() {
        return $this->director->create();
    }

    public function getMovie() {
        return $this->movie->create();
    }

    public function getDirectorNameById($director_id)
    {
//        return $this->director->create()->addFieldToFilter('director_id', ['eq'=>$director_id])->getFirstItem()->getDirectorName();
        $model = $this->directorFactory->create();
        return $model->load($director_id)->getData('director_name');
    }

    public function getListActorNameByMovieId($movie_id)
    {
        return $this->actor->create()->addFieldToFilter('movie_id', ['eq'=>$movie_id])->getData();
    }
}
