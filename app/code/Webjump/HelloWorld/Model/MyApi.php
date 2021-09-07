<?php
namespace Webjump\HelloWorld\Model;

use Magento\Framework\Webapi\Rest\Request;
use Webjump\HelloWorld\Api\MyApiInterface;

class MyApi implements MyApiInterface
{

    private Request $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }
    /**
     *
     * @param string $urlQuery
     * @return array
     */
    public function getUrlParam($urlQuery): array
    {
        return [
            'message' => "Success webapi: $urlQuery "
        ];
    }

    /**
     *
     * @return array
     */
    public function postMessage(): array
    {
        $bodyParams = $this->request->getBodyParams();

        return [
            'message' => "Success webapi: ". json_encode($bodyParams)
        ];
    }
}
