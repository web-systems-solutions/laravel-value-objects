<?php

declare(strict_types=1);

namespace Mistery23\ValueObjects;

/**
 * Class Util
 */
class Util
{


    /**
     * @param object $input
     * @param object $output
     *
     * @return boolean
     */
    public static function classEquals(object $input, object $output): bool
    {
        return get_class($input) === get_class($output);
    }

    /**
     * Returns full namespaced class as string
     *
     * @param object $object
     *
     * @return string
     *
     * @phan-suppress PhanUnreferencedPublicMethod
     */
    public static function getClassAsString(object $object): string
    {
        return get_class($object);
    }
}
