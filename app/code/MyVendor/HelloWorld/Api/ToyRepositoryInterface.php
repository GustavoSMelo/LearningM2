<?php
namespace MyVendor\HelloWorld\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NotFoundException;
use MyVendor\HelloWorld\Api\Data\ToyInterface;
use MyVendor\HelloWorld\Api\Data\ToySearchCriteriaInterface;

/**
 * Repository of toy
 */
interface ToyRepositoryInterface
{
    /**
     * Get a toy using a id
     *
     * @param int $id
     * @throws NotFoundException
     * @return ToyInterface
     */
    public function getById(int $id): ToyInterface;

    /**
     * Save a toy using a instance of same
     *
     * @param ToyInterface $toyInterface
     * @throws CouldNotSaveException
     * @return void
     */
    public function save(ToyInterface $toyInterface): void;

    /**
     * Get a list of ToySearchCriteriaInterface
     *
     * @param SearchCriteriaInterface $searchCriteriaInterface
     * @throws NotFoundException
     * @return ToySearchCriteriaInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteriaInterface): ToySearchCriteriaInterface;
}
