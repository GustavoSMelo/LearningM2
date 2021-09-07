<?php
namespace Webjump\HelloWorld\Api;

interface MyApiInterface
{
    /**
     *
     * @param string $message
     * @return array
     */
    public function getUrlParam(string $message): array;

    /**
     *
     * @return array
     */
    public function postMessage (): array;
}
