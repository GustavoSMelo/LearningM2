<?php
namespace MyVendor\HelloWorld\Model\ResourceModel\Toy;

use MyVendor\HelloWorld\Model\ResourceModel\Toy as ResourceModelToy;
use MyVendor\HelloWorld\Model\Toy;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Toy::class, ResourceModelToy::class);
    }
}
