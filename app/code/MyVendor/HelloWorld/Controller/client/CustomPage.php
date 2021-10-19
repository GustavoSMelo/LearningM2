<?php

namespace MyVendor\HelloWorld\Controller\client;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Controller\ResultFactory;

class CustomPage extends Action {

    public function execute()
    {
        /** @var Page $page */
        $page = $this->pageFactory->create(ResultFactory::TYPE_PAGE);

        $block = $page->getLayout()->getBlock('client_custompage_index')->toHtml();

        return $block;
    }
}
