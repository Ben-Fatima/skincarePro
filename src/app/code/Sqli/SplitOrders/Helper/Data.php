<?php

namespace Sqli\SplitOrders\Helper;

use Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const BO_split_Enable_Path = 'splitorders/splitorder/enable';
    const FO_split_Enable_Path = 'splitorders/splitorder/enablefront';
    const Attribute_Path = 'splitorders/splitorder/attributes';

    public function isActive($id = null)
    {
        $value = $this->scopeConfig->isSetFlag(self::BO_split_Enable_Path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $id);
        if ($value) {
            return true;
        }
        return false;

    }

    public function isActiveFront($id = null)
    {
        $value = $this->scopeConfig->isSetFlag(
            self::FO_split_Enable_Path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $id);
        if ($value) {
            return true;
        }
        return false;

    }

    public function getAttribute($id = null)
    {
        return $this->scopeConfig->getValue(
            self::Attribute_Path,
            ScopeInterface::SCOPE_STORE,
            $id);
    }

}
