<?php
namespace MyVendor\HelloWorld\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context): void
    {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'custom_attribute_m2',
            [
                'type' => 'text',
                'label' => 'Custom Attribute',
                'input' => 'multiselect',
                'source' => 'MyVendor\HelloWorld\Model\Config\Product\EavCustomAttribute',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
            ]
        );

        $setup->endSetup();
    }
}
