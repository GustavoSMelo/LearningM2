<?php
namespace MyVendor\HelloWorld\Console\Command;

use Magento\Framework\Exception\CouldNotSaveException;
use MyVendor\HelloWorld\Api\Data\ToyInterface;
use MyVendor\HelloWorld\Api\Data\ToyInterfaceFactory;
use MyVendor\HelloWorld\Api\ToyRepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use MyVendor\HelloWorld\Model\Data\Toy;

class ToySaveCommand extends Command
{
    /**
     * @var ToyRepositoryInterface
     */
    private $toyRepositoryInterface;

    /**
     * @var Toy
     */
    private $toy;

    /**
     * @param ToyRepositoryInterface $toyRepositoryInterface
     * @param Toy $toyInterfaceFactory
     */
    public function __construct(ToyRepositoryInterface $toyRepositoryInterface, Toy $toy)
    {
        $this->toyRepositoryInterface = $toyRepositoryInterface;
        $this->toy = $toy;

        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('toy:save');
        $this->setDescription('This command is used to save a toy in database ');

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws CouldNotSaveException
     * @return null|int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->toy->setName('teste');
            $this->toy->setPrice(10.2);
            $this->toy->setOwnerId(1);

            $this->toyRepositoryInterface->save($this->toy);
            $output->writeln('<info>Toy saved with success</info>');
        } catch (CouldNotSaveException $err) {
            $output->writeln('<error>An error encountered when try to save a toy.</error>');
        }
    }
}
