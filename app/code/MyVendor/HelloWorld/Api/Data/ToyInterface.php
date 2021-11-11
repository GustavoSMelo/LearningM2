<?php

namespace MyVendor\HelloWorld\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface of Toys
 */
interface ToyInterface extends ExtensibleDataInterface
{
    // definition of columns

    const TABLE_NAME = 'toy_table';

    /**
     * @var string
     */
    const ENTITY_TABLE_ID = 'id';

    /**
     * @var string
     */
    const COLUMN_NAME = 'name';

    /**
     * @var string
     */
    const COLUMN_PRICE = 'price';

    /**
     * @var string
     */
    const COLUMN_OWNER_ID = 'owner_id';

    // getters

    /**
     * Getter entity id
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * Getter name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Getter price
     *
     * @return float
     */
    public function getPrice(): float;

    /**
     * Getter relationship between toy and customer
     *
     * @return int
     */
    public function getOwnerId(): int;

    // setters

    /**
     * Setter id
     *
     * @return self
     */
    public function setId(int $int): self;

    /**
     * Setter Name
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name): self;

    /**
     * Setter price
     *
     * @param float $price
     * @return self
     */
    public function setPrice(float $price): self;

    /**
     * Setter owner id
     *
     * @param int $ownerId
     * @return self
     */
    public function setOwnerId(int $ownerId): self;
}
