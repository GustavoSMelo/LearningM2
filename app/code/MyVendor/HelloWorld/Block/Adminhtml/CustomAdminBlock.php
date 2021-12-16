<?php
namespace MyVendor\HelloWorld\Block\Adminhtml;

class CustomAdminBlock extends \Magento\Backend\Block\Template
{
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getName(): string
    {
        return 'Custom hello world for admin page';
    }
}
