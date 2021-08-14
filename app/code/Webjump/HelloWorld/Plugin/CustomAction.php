<?php
namespace Webjump\HelloWorld\Plugin;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Action\Action;

class CustomAction
{

    public function beforeDispatch (Action $action, RequestInterface $request) {
        echo "before dispatch \n";
        return [$request];
    }

    public function afterDispatch (Action $action, $result) {
        echo "after dispatch \n";
        return $result;
    }

    public function aroundDispatch (Action $action, callable $proceed, RequestInterface $request) {
        echo "around dispatch \n";
        return $proceed($request);
    }
}
