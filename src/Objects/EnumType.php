<?php

namespace Mistery23\ValueObjects\Objects;

use Mistery23\ValueObjects\ValueObjectInterface;
use MabeEnum\Enum as BaseEnum;

/**
 * Class EnumType
 */
abstract class EnumType extends BaseEnum implements ValueObjectInterface, \JsonSerializable
{


    /**
     * @param mixed $value
     *
     * @return EnumType
     */
    public static function convertToObjectValue($value)
    {
        return static::get($value);
    }

    /**
     * @return mixed
     */
    public function convertToDatabaseValue()
    {
        return $this->getValue();
    }

    /**
     * @param ValueObjectInterface $object
     *
     * @return boolean
     */
    public function sameValueAs(ValueObjectInterface $object): bool
    {
        return $this->is($object);
    }

    /**
     * @return string
     */
    public function jsonSerialize(): string
    {
        return $this->getName();
    }
}
