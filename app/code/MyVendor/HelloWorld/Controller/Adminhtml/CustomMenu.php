<?php
namespace MyVendor\HelloWorld\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;
use Magento\Backend\App\Action\Context;

class CustomMenu extends Action
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
        $resultPage = $this->_pageFactory->create();
        $resultPage->setActiveMenu('MyVendor_HelloWorld::custom_menu_id');
        $resultPage->getConfig()->getTitle()->prepend(__('Custom Menu'));

        return $resultPage;
    }
}
