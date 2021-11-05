<?php
namespace MyVendor\HelloWorld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Context;
use MyVendor\HelloWorld\Api\Data\ToyInterface;

class Toy extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init(ToyInterface::TABLE_NAME, ToyInterface::ENTITY_TABLE_ID);
    }
}
