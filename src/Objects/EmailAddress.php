<?php

namespace Mistery23\ValueObjects\Objects;

/**
 * Class EmailAddress
 */
class EmailAddress extends NativeType
{


    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        parent::__construct($value);

        $filteredValue = filter_var($this->value, FILTER_VALIDATE_EMAIL);

        if (false === $filteredValue) {
            throw new \InvalidArgumentException("Invalid argument $value: Not an email address.");
        }

        $this->value = mb_strtolower($filteredValue);
    }
}
