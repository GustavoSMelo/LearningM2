<?php
namespace MyVendor\HelloWorld\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use MyVendor\HelloWorld\Api\Data\ToyInterface;

/**
 * Getters and setters about columns
 */
class Toy extends AbstractExtensibleObject implements ToyInterface
{
    // getters

    /**
     * Get Id
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->_get(self::ENTITY_TABLE_ID);
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->_get(self::COLUMN_PRICE);
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->_get(self::COLUMN_NAME);
    }

    /**
     * Get owner id
     *
     * @return integer
     */
    public function getOwnerId(): int
    {
        return $this->_get(self::COLUMN_OWNER_ID);
    }

    // setters

    /**
     * Set Id
     *
     * @param integer $id
     * @return ToyInterface
     */
    public function setId(int $id): ToyInterface
    {
        return $this->setData(self::ENTITY_TABLE_ID, $id);
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return ToyInterface
     */
    public function setName(string $name): ToyInterface
    {
        return $this->setData(self::COLUMN_NAME, $name);
    }

    /**
     * Set Price
     *
     * @param float $price
     * @return ToyInterface
     */
    public function setPrice(float $price): ToyInterface
    {
        return $this->setData(self::COLUMN_PRICE, $price);
    }

    /**
     * Set Owner Id
     *
     * @param integer $ownerId
     * @return ToyInterface
     */
    public function setOwnerId(int $ownerId): ToyInterface
    {
        return $this->setData(self::COLUMN_OWNER_ID, $ownerId);
    }
}
