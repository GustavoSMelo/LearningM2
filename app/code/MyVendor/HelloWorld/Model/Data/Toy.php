<?php
namespace MyVendor\HelloWorld\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use MyVendor\HelloWorld\Api\Data\ToyInterface;

class Toy extends AbstractExtensibleObject implements ToyInterface
{
    // getters

    /**
     * get Id
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->_get(self::ENTITY_TABLE_ID);
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
}
