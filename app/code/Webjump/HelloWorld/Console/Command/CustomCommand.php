<?php
namespace Webjump\HelloWorld\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CustomCommand extends Command {

    const INPUT_ARGUMENT = 'argument';

    public function __construct() {
        parent::__construct();
    }

    public function configure() {
        $this->setName('my:custom:command');
        $this->setDescription('This is my custom command that show a message using the data passed by arguments');
        $this->addArgument(self::INPUT_ARGUMENT, InputArgument::REQUIRED, 'message');

        parent::configure();
    }

    public function execute(InputInterface $inputInterface, OutputInterface $outputInterface)
    {
        $outputInterface->writeln("Hello world ". $inputInterface->getArgument('argument'));
    }
}
