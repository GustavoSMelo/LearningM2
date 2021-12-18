<?php
namespace MyVendor\HelloWorld\Setup\Data;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Catalog\Api\ProductAttributeManagementInterface;
use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;

class CreateCustomEavAttribute implements DataPatchInterface
{
    private $eavSetupFactory;

    private $setup;

    private $productAttributeManagementInterface;

    public function __construct(
        EavSetupFactory $eavSetupFactory,
        ModuleDataSetupInterface $setup,
        ProductAttributeManagementInterface $productAttributeManagementInterface)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->setup = $setup;
        $this->productAttributeManagementInterface = $productAttributeManagementInterface;
    }

    public function apply(): void
    {
        $this->setup->getConnection()->startSetup();

        /**
         * @var EavSetup $eavSetup
         */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->setup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'custom_attribute_m2',
            [
                'type' => 'text',
                'label' => 'custom_attribute_m2',
                'input' => 'select',
                'frontend' => '',
                'required' => false,
                'backend' => '',
                'sort_order' => '30',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'default' => null,
                'visible' => true,
                'user_defined' => true,
                'searchable' => true,
                'filterable' => true,
                'comparable' => true,
                'visible_on_front' => true,
                'unique' => false,
                'apply_to' => 'simple,grouped,bundle,configurable,virtual',
                'group' => 'General',
                'used_in_product_listing' => true,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'option' => ''
            ]
        );

        $attributeId = $eavSetup->getAttributeSetId(Product::ENTITY, 997);

        $this->productAttributeManagementInterface->assign($attributeId,0,'default',50);

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
