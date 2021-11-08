<?php
namespace MyVendor\HelloWorld\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NotFoundException;
use MyVendor\HelloWorld\Api\Data\ToyInterface;
use MyVendor\HelloWorld\Api\ToyRepositoryInterface;
use MyVendor\HelloWorld\Model\ToyFactory;
use MyVendor\HelloWorld\Api\Data\ToyInterfaceFactory;

class ToyRepository implements ToyRepositoryInterface
{
    /**
     * @var ToyFactory
     */
    private $toyModelFactory;

    /**
     * @var ToyInterfaceFactory
     */
    private $toyInterfaceFactory;

    public function __construct(ToyFactory $toyFactory, ToyInterfaceFactory $toyInterfaceFactory)
    {
        $this->toyModelFactory = $toyFactory;
        $this->toyInterfaceFactory = $toyInterfaceFactory;
    }

    /**
     * Method to save a toy
     *
     * @param ToyInterface $toyInterface
     * @throws CouldNotSaveException
     * @return void
     */
    public function save(ToyInterface $toyInterface): void
    {
        /**
         * @var Toy $toyModel
         */
        $toyModel = $this->toyModelFactory->create();

        try {
            $toyModel->save($toyInterface);
        } catch (CouldNotSaveException $err) {
            throw new CouldNotSaveException(__('Is not possible to save this toy, please, try again'));
        }
    }

    /**
     * Get a toy using a unique Id
     *
     * @param int $id
     * @throws NotFoundException
     * @return ToyInterface
     */
    public function getById(int $id): ToyInterface
    {
        try {
            /**
             * @var Toy $toyModel
             */
            $toyModel = $this->toyModelFactory->create();

            /**
             * @var ToyInterface $toyInterface
             */
            $toyInterface = $this->toyInterfaceFactory->create();

            $toyInterface
                ->setId($toyModel->getData(ToyInterface::ENTITY_TABLE_ID))
                ->setName($toyModel->getData(ToyInterface::COLUMN_NAME))
                ->setPrice($toyModel->getData(ToyInterface::COLUMN_PRICE))
                ->setOwnerId($toyModel->getData(ToyInterface::COLUMN_OWNER_ID));

            return $toyInterface;

        } catch (NotFoundException $err) {
            throw new NotFoundException(__('Not found a toy with this ID'));
        }
    }

    // write a getList()

}
