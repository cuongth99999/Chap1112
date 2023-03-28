<?php

namespace Magenest\Movie\Block;

use Magento\Framework\View\Element\Template;
use Magenest\Movie\Model\ResourceModel\DirectorFactory As DirectorResourceModelFactory;

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
        DirectorResourceModelFactory $directorResourceModelFactory,
        array $data = []
    )
    {
        $this->actor = $actorFactory;
        $this->director = $directorFactory;
        $this->movie = $movieFactory;
        $this->directorFactory = $directorModelFactory;
        $this->directorResourceModelFactory = $directorResourceModelFactory;
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
}
