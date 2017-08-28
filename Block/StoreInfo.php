<?php
namespace silici0\StoreInfo\Block;

class StoreInfo extends \Magento\Framework\View\Element\Template
{
    protected $_storeInformation;
    protected $_scopeConfig;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Store\Model\Information $storeInformation,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->_storeInformation = $storeInformation;
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function getStoreInformationObject()
    {
        $ret = $this->_storeInformation->getStoreInformationObject($this->_storeManager->getStore());
        $data = $ret->getData();
        $data['email'] = $this->_scopeConfig->getValue(
            'trans_email/ident_sales/email',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        return $data;
    }
}

// array(11) {
//   ["name"]=>
//   string(18) "Best Gym Equipment"
//   ["phone"]=>
//   string(11) "11994267137"
//   ["hours"]=>
//   NULL
//   ["street_line1"]=>
//   string(19) "Anthigio cavechinni"
//   ["street_line2"]=>
//   NULL
//   ["city"]=>
//   string(3) "Itu"
//   ["postcode"]=>
//   string(8) "13310140"
//   ["region_id"]=>
//   string(10) "São Paulo"
//   ["country_id"]=>
//   NULL
//   ["vat_number"]=>
//   NULL
//   ["region"]=>
//   NULL
//   ["email"]=>
//   NULL
// }