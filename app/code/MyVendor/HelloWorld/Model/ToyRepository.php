<?php

namespace MyVendor\HelloWorld\Model;

use Magento\Framework\Api\Search\SearchResultFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NotFoundException;
use MyVendor\HelloWorld\Api\Data\ToyInterface;
use MyVendor\HelloWorld\Api\ToyRepositoryInterface;
use MyVendor\HelloWorld\Model\ToyFactory;
use MyVendor\HelloWorld\Api\Data\ToySearchCriteriaInterface;
use MyVendor\HelloWorld\Model\ResourceModel\Toy\CollectionFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use MyVendor\HelloWorld\Model\ResourceModel\Toy as ToyResource;
use MyVendor\HelloWorld\Model\Data\Toy as ToyData;

class ToyRepository implements ToyRepositoryInterface
{
    /**
     * @var ToyResource
     */
    private $toyResource;

    /**
     * @var ToyFactory
     */
    private $toyModelFactory;

    /**
     * @var SearchResultFactory
     */
    private $searchResultFactory;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var JoinProcessorInterface
     */
    private $joinProcessorInterface;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessorInterface;

    /**
     * @var ExtensibleDataObjectConverter
     */
    private $extensibleData;

    /**
     * @var ToyData
     */
    private $toyData;

    /**
     * Constructor for toy repository
     *
     * @param ToyFactory $toyModelFactory
     * @param SearchResultFactory $searchResultFactory
     * @param JoinProcessorInterface $joinProcessorInterface
     * @param CollectionProcessorInterface $collectionProcessorInterface
     * @param ExtensibleDataObjectConverter $extensibleData
     * @param ToyResource $toyResource
     * @param ToyData $toyData
     */
    public function __construct(
        ToyFactory $toyModelFactory,
        SearchResultFactory $searchResultFactory,
        JoinProcessorInterface $joinProcessorInterface,
        CollectionProcessorInterface $collectionProcessorInterface,
        ExtensibleDataObjectConverter $extensibleData,
        ToyResource $toyResource,
        ToyData $toyData
    )
    {
        $this->toyModelFactory = $toyModelFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->joinProcessorInterface = $joinProcessorInterface;
        $this->collectionProcessorInterface = $collectionProcessorInterface;
        $this->extensibleData = $extensibleData;
        $this->toyResource = $toyResource;
        $this->toyData = $toyData;
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
        $data = $this->extensibleData->toNestedArray($toyInterface, [], ToyInterface::class);

        $toy = $this->toyModelFactory->create()->setData($data);

        try {
            $this->toyResource->save($toy);
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
            $toyModel = $this->toyModelFactory->create()->load($id);

            $this->toyData
                ->setId($toyModel->getData(ToyInterface::ENTITY_TABLE_ID))
                ->setName($toyModel->getData(ToyInterface::COLUMN_NAME))
                ->setPrice($toyModel->getData(ToyInterface::COLUMN_PRICE))
                ->setOwnerId($toyModel->getData(ToyInterface::COLUMN_OWNER_ID));

            return $this->toyData;
        } catch (NotFoundException $err) {
            throw new NotFoundException(__('Not found a toy with this ID'));
        }
    }

    /**
     * Get a list of all toys
     *
     * @param SearchCriteriaInterface $searchCriteriaInterface
     * @return ToySearchCriteriaInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteriaInterface): ToySearchCriteriaInterface
    {
        $collection = $this->collectionFactory->create();

        $this->joinProcessorInterface->process($collection, ToyInterface::class);
        $this->collectionProcessorInterface->process($searchCriteriaInterface, $collection);

        $items = [];

        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        /**
         * @var ToySearchCriteriaInterface
         */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteriaInterface);
        $searchResult->setItems($items);
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }
}
