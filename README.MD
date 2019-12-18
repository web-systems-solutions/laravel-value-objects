# Laravel value objects

## Install
```
composer require mistery23/laravel-value-objects
```
Features
---
Additional functional for eloquent casts. This package can you cast your attribute in value objects wrap.

If use `id` format `uuid` (`ramsey/uuid`), you can use `Mistery23\ValueObjects\Objects\Id`.
For the provide back capability in relations, in this package use `mistery23/eloquent-object-relations` package.

You can use the `Mistery23\ValueObjects\Objects\EmailAddress` for your email attribute.
You can extend the `Mistery23\ValueObjects\Objects\EnumType` for your status attribute (`marc-mabe/php-enum`).

If you want to create own value object type, you can extend `Mistery23\ValueObjects\Objects\NativeType` for simple object, or implement `Mistery23\ValueObjects\ValueObjectInterface`. 

---

Using
---
```
use Mistery23\ValueObjects\HasValueObjects;

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
```
---

File Tree
---
```bash
|-- .gitignore
|-- LICENSE.MD
|-- README.MD
|-- composer.json
`-- src
    |-- HasValueObjects.php
    |-- Objects
    |   |-- EmailAddress.php
    |   |-- EnumType.php
    |   |-- Id.php
    |   `-- NativeType.php
    |-- Util.php
    `-- ValueObjectInterface.php
```

- Tree command can be installed using brew: brew install tree
- File tree generated using command tree -a -I '.idea|.git|node_modules|vendor|storage|tests|composer.lock'

---
License
---
This package is free software distributed under the terms of the [MIT license](https://opensource.org/licenses/MIT). Enjoy!
