<?php

namespace Mistery23\ValueObjects\Objects;

use Ramsey\Uuid\Uuid;

/**
 * Class Id
 */
class Id extends NativeType
{


    /**
     * @return static
     *
     * @throws \Exception
     */
    public static function next(): self
    {
        return new static(Uuid::uuid4()->toString());
    }
}
