<?php

namespace Mistery23\ValueObjects;

/**
 * Interface ValueObjectInterface
 */
interface ValueObjectInterface
{


    /**
     * Named constructor to make a Value Object from a native value.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public static function convertToObjectValue($value);

    /**
     * Returns the native value of this Value Object.
     *
     * @return mixed
     */
    public function convertToDatabaseValue();

    /**
     * Compares two Value Objects and tells if they can be considered equal.
     *
     * @param ValueObjectInterface $object
     *
     * @return boolean
     */
    public function sameValueAs(ValueObjectInterface $object): bool;

    /**
     * Returns the string representation of this Value Object.
     *
     * @return string
     */
    public function __toString();
}
