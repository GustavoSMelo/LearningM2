<?php
namespace Webjump\HelloWorld\Controller\client;

use Magento\Framework\Controller\Result\Raw;

class RawView extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected Raw $raw;

    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       Raw $raw
    )
    {
        $this->raw = $raw;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->raw->setContents('Hello world from raw page ');
    }
}
