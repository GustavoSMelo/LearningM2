<?php
namespace MyVendor\HelloWorld\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
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
     * @return ToyInterface
     */
    public function getById(int $id): ToyInterface;

    /**
     * Save a toy using a instance of same
     *
     * @param ToyInterface $toyInterface
     * @return void
     */
    public function save(ToyInterface $toyInterface): void;

    /**
     * Get a list of ToySearchCriteriaInterface
     *
     * @param SearchCriteriaInterface $searchCriteriaInterface
     * @return ToySearchCriteriaInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteriaInterface): ToySearchCriteriaInterface;
}
