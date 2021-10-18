<?php
namespace MyVendor\HelloWorld\Controller\client;

use Magento\Framework\Controller\Result\Json;

class JsonView extends \Magento\Framework\App\Action\Action
{

    private Json $json;

    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       Json $json
    )
    {
        $this->json = $json;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->json->setData([
            'message' => 'Hello world '
        ]);
    }
}
