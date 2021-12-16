<?php
namespace MyVendor\HelloWorld\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;
use Magento\Backend\App\Action\Context;

class CustomMenuItem extends Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * @param Context $context
     */
    public function __construct(
       Context $context,
       PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }


    public function execute(): Page
    {
        $page = $this->_pageFactory->create();
        $this->_setActiveMenu('MyVendor_HelloWorld::custom_menu_id');
        $page->getConfig()->getTitle()->prepend(__('Menu example'));

        return $page;
    }

    /**
     * Check Permission.
     *
     * @return bool
     */
    protected function _isAllowed(): bool
    {
        return $this->_authorization->isAllowed('MyVendor_HelloWorld::custom_menu_id');
    }
}
