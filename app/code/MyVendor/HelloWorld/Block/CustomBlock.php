<?php
namespace MyVendor\HelloWorld\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class CustomBlock extends Template
{
    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function helloWorld(): string
    {
        return __('Hello world');
    }
}
