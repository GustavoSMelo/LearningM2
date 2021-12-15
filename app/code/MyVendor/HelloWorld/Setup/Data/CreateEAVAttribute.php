<?php
namespace MyVendor\HelloWorld\Setup\Data;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class CreateEAVAttribute implements DataPatchInterface
{
    private $eavSetupFactory;

    private $setup;

    public function __construct(EavSetupFactory $eavSetupFactory, ModuleDataSetupInterface $setup)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->setup = $setup;
    }

    public function apply(): void
    {
        $this->setup->getConnection()->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->setup]);
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

        $this->setup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases(): array
    {
        return [];
    }
}
