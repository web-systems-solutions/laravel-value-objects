<?php

namespace Mistery23\ValueObjects\Objects;

use Mistery23\ValueObjects\Util;
use Mistery23\ValueObjects\ValueObjectInterface;

/**
 * Class NativeType
 */
abstract class NativeType implements ValueObjectInterface, \JsonSerializable
{

    /**
     * @var mixed
     */
    protected $value;


    /**
     * NativeType constructor.
     *
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        if (true === empty($value)) {
            throw new \InvalidArgumentException('Empty value is not allow.');
        }

        $this->value = $value;
    }

    /**
     * Named constructor to instantiate a Value Object
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public static function convertToObjectValue($value)
    {
        return new static($value);
    }

    /**
     * Returns the raw $value
     *
     * @return mixed
     */
    public function convertToDatabaseValue()
    {
        return $this->value;
    }

    /**
     * Decides whether or not this Value Object is considered equal to another Value Object.
     *
     * @param ValueObjectInterface $object
     *
     * @return boolean
     */
    public function sameValueAs(ValueObjectInterface $object): bool
    {
        if (false === Util::classEquals($this, $object)) {
            return false;
        }

        return $this->convertToDatabaseValue() === $object->convertToDatabaseValue();
    }


    /**
     * Returns the raw $value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns the string representation of $value
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getValue();
    }

    /**
     * Converts the value to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        return $this->convertToDatabaseValue();
    }
}
