<?php
namespace Magenest\BuyNow\Block\Adminhtml\System;

use Magento\Framework\View\Element\Template;

class BuyNow extends Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getConfigValue($value = '')
    {
        return $this->scopeConfig->getValue($value, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getStatusBuyNowButton() {
        $configData = $this->_scopeConfig
            ->getValue('general/general/enable',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        return $configData;
    }
}
