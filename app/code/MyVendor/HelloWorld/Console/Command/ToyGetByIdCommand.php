<?php
namespace MyVendor\HelloWorld\Console\Command;

use Exception;
use MyVendor\HelloWorld\Api\Data\ToyInterface;
use MyVendor\HelloWorld\Api\ToyRepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ToyGetByIdCommand extends Command
{
    /**
     * @var ToyRepositoryInterface
     */
    private $toyRepositoryInterface;

    /**
     * @param ToyRepositoryInterface $toyRepositoryInterface
     */
    public function __construct(ToyRepositoryInterface $toyRepositoryInterface)
    {
        $this->toyRepositoryInterface = $toyRepositoryInterface;
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('toy:getById');
        $this->setDescription('This command is used to get a toy using a id.');

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null|int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            /**
             * @var ToyInterface
             */
            $toyInterfaceResponse = $this->toyRepositoryInterface->getById(1);

            var_dump($toyInterfaceResponse);
        } catch (Exception $err) {
            $output->writeln("<error>A toy with this email does not exists </error>");
        }
    }
}
