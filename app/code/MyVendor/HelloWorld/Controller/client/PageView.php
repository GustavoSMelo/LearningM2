<?php
namespace MyVendor\HelloWorld\Controller\client;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\UrlRewrite\Model\OptionProvider;
use Magento\UrlRewrite\Model\UrlRewrite;

class PageView extends \Magento\Framework\App\Action\Action
{
    /**
     *
     * @var PageFactory;
     */
    protected $_pageFactory;

    /**
     *
     * @var UrlRewrite
     */
    protected $urlRewrite;

    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       PageFactory $pageFactory,
       UrlRewrite $urlRewrite
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->urlRewrite = $urlRewrite;
        return parent::__construct($context);
    }

    public function execute()
    {
        // $this->urlRewrite->setStoreId(1);
        // $this->urlRewrite->setIsSystem(0);
        // $this->urlRewrite->setIdPath(rand(1, 100000));
        // $this->urlRewrite->setTargetPath('myroute/client/pageview');
        // $this->urlRewrite->setRequestPath('url/rewrite/ex03');
        // $this->urlRewrite->setRedirectType(OptionProvider::PERMANENT);

        // $this->urlRewrite->save();

        return $this->_pageFactory->create();
    }
}
