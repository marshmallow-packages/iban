![alt text](https://marshmallow.dev/cdn/media/logo-red-237x46.png "marshmallow.")

# IBAN

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marshmallow/iban.svg?style=flat-square)](https://packagist.org/packages/marshmallow/iban)
[![Total Downloads](https://img.shields.io/packagist/dt/marshmallow/iban.svg?style=flat-square)](https://packagist.org/packages/marshmallow/iban)
[![License](https://img.shields.io/packagist/l/marshmallow/iban.svg?style=flat-square)](https://packagist.org/packages/marshmallow/iban)

With this package you will be able to validate IBAN numbers and get BIC information.

## Installation

Install the package via Composer:

```bash
composer require marshmallow/iban
```

The package requires PHP `^7.0|^8.0`. Everything is exposed through static methods, so there is nothing to register or configure.

## Usage

The package exposes a single class, `Marshmallow\IBAN\IBAN`, with three static methods.

### Validate an IBAN

Call `Marshmallow\IBAN\IBAN::validate($iban)` to check whether the provided IBAN is valid. Returns `true` or `false`. Spaces are ignored, so both spaced and unspaced IBANs are accepted.

```php
use Marshmallow\IBAN\IBAN;

IBAN::validate('NL93 RABO 0317 7456 46'); // true
IBAN::validate('NL00RABO0000000000');     // false
```

### Get the bank account number

Call `Marshmallow\IBAN\IBAN::getBankAccount($iban)` to get the bank account number. Returns the account number as a string, or `null` when the IBAN is not valid.

```php
use Marshmallow\IBAN\IBAN;

IBAN::getBankAccount('NL93RABO0317745646'); // "317745646"
```

### Get the BIC from an IBAN

Call `Marshmallow\IBAN\IBAN::getBic($iban)` to look up the BIC information for an IBAN. Returns an `array` when a match is found, or `null` when the IBAN is invalid or no match exists.

```php
use Marshmallow\IBAN\IBAN;

IBAN::getBic('NL93RABO0317745646');
```

```php
[
    "bic"            => "RABONL2U",
    "identifier"     => "RABO",
    "name"           => "RABOBANK",
    "iban"           => "NL93RABO0317745646",
    "account_number" => "317745646",
]
```

## Tests during development

When the package is installed as a path dependency inside a host application, you can run its tests with:

```bash
php artisan test packages/marshmallow/iban
```

## Security Vulnerabilities

Please report security vulnerabilities by email to [stef@marshmallow.dev](mailto:stef@marshmallow.dev) rather than via the public issue tracker.

## Credits

- [Stef](https://marshmallow.dev)
- [All Contributors](https://github.com/marshmallow-packages/iban/contributors)

## License

The MIT License (MIT).
