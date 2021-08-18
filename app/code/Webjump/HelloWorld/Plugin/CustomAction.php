<?php
namespace Webjump\HelloWorld\Plugin;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Action\Action;
use Webjump\HelloWorld\Logger\CustomLogger;

class CustomAction
{

    private CustomLogger $loggerDebug;

    public function __construct(CustomLogger $loggerDebug) {
        $this->loggerDebug = $loggerDebug;
    }

    public function beforeDispatch (Action $action, RequestInterface $request) {
        echo "before dispatch \n";
        $this->loggerDebug->debug('before dispatch');
        $this->loggerDebug->critical('before dispatch');
        return [$request];
    }

    public function afterDispatch (Action $action, $result) {
        echo "after dispatch \n";
        $this->loggerDebug->debug('after dispatch');
        return $result;
    }

    public function aroundDispatch (Action $action, callable $proceed, RequestInterface $request) {
        echo "around dispatch \n";
        $this->loggerDebug->debug('around dispatch');
        return $proceed($request);
    }
}
