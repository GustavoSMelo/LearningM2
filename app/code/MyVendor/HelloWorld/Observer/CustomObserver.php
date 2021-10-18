<?php
namespace MyVendor\HelloWorld\Observer;

use MyVendor\HelloWorld\Logger\CustomLogger;

class CustomObserver implements \Magento\Framework\Event\ObserverInterface
{

    private CustomLogger $customLogger;

    public function __construct(CustomLogger $customLogger)
    {
        $this->customLogger = $customLogger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->customLogger->info('Action of observer');
    }
}
