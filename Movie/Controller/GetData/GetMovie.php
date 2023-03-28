<?php

namespace Magenest\Movie\Controller\GetData;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Famework\Controller\ResultFactory;

class GetMovie extends Action implements HttpGetActionInterface
{
    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */

    protected $postFactory;

    public function __construct(
        Context                                $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Movie\'s List'));
        $layout = $resultPage->getLayout();
        return $resultPage;
    }
}
