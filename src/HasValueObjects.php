<?php

namespace Mistery23\ValueObjects;

use Mistery23\ObjectRelations\HasObjectRelations;

/**
 * ```php
 *      class User extends Model {
 *
 *          use HasValueObjects;
 *
 *
 *          protected $casts = [
 *              'email' => EmailAddress::class
 *          ];
 *      }
 * ```
 * Trait HasValueObjects
 */
trait HasValueObjects
{

    use HasObjectRelations;

    /**
     * @var array
     */
    protected $cachedObjects = [];

    /**
     * @var array
     */
    protected static $embeddedTypes = [
        'int',
        'integer',
        'real',
        'float',
        'double',
        'decimal',
        'string',
        'bool',
        'boolean',
        'object',
        'array',
        'json',
        'collection',
        'date',
        'datetime',
        'custom_datetime',
        'timestamp',
    ];


    /**
     * @param mixed $key
     * @param mixed $value
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    protected function castAttribute($key, $value)
    {
        if (true === empty($value)) {
            return null;
        }

        $castToClass = $this->getValueObjectCastType($key);

        if (null === $castToClass) {
            return parent::castAttribute($key, $value);
        }

        if (false === in_array(ValueObjectInterface::class, class_implements($castToClass), true)) {
            throw new \InvalidArgumentException($castToClass . ' not implement ' . ValueObjectInterface::class);
        }

        return $castToClass::convertToObjectValue($value);
    }

    /**
     * @param mixed $key
     * @param mixed $value
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function setAttribute($key, $value)
    {
        $castToClass = $this->getValueObjectCastType($key);

        if (null === $castToClass) {
            return parent::setAttribute($key, $value);
        }

        if (false === ($value instanceof $castToClass)) {
            throw new \InvalidArgumentException("Attribute '$key' must be an instance of " . $castToClass);
        }

        // Now it has the type, store as native value.
        return parent::setAttribute($key, $value->convertToDatabaseValue());
    }

    /**
     * @param mixed $key
     *
     * @return mixed|null
     */
    private function getValueObjectCastType($key)
    {
        $casts = array_diff($this->getCasts(), self::$embeddedTypes);

        if (true === isset($casts[$key]) && true === class_exists($casts[$key])) {
            return $casts[$key];
        }

        return null;
    }
}
