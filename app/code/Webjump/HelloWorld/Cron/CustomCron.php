<?php
namespace Webjump\HelloWorld\Cron;

use Webjump\HelloWorld\Logger\CustomLogger;

class CustomCron
{
    private CustomLogger $customLogger;

    public function __construct(CustomLogger $customLogger)
    {
        $this->customLogger = $customLogger;
    }

    public function execute ()
    {
        $this->customLogger->info('Executing a cron job');
    }
}
