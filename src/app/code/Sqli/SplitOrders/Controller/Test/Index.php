<?php
namespace Sqli\SplitOrders\Controller\Test;
class Index extends \Magento\Framework\App\Action\Action
{

    protected $helperData;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
         \Sqli\SplitOrders\Helper\Data $helperData

    )
    {
        $this->helperData = $helperData;
        return parent::__construct($context);
    }

    public function execute()
    {

        // TODO: Implement execute() method.
        echo "Enable/Disable Back Split :";
        echo "<br>";
        $value=$this->helperData->isActive();
        if ($value){
            echo"done BO";}
        else{
            echo "undone BO";}
        echo "<br>";
        echo "Enable/Disable Front Split :";
        echo "<br>";
        $val=$this->helperData->isActiveFront();
        if ($val){
            echo"done FO";}
        else{
            echo "undone FO";}
        echo "<br>";
        echo "Split Attribute:";
        echo $this->helperData->getAttribute();

    }
}
