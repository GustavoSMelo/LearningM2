<?php
namespace MyVendor\HelloWorld\Model\Config\Product;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class EavCustomAttribute extends AbstractSource
{
    protected $optionFactory;

    public function getAllOptions(): array
    {
        $this->_options = [];

        $this->_options[] = ['label' => 'Custom Eav Attribute Label','value' => 'Value 01'];

        return $this->_options;
    }
}
