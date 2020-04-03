<p align="center">
    <img src="https://cdn.marshmallow-office.com/media/images/logo/marshmallow.transparent.red.png">
</p>
<p align="center">
    <a href="https://github.com/Marshmallow-Development">
        <img src="https://img.shields.io/github/issues/Marshmallow-Development/package-iban.svg" alt="Issues">
    </a>
    <a href="https://github.com/Marshmallow-Development">
        <img src="https://img.shields.io/github/forks/Marshmallow-Development/package-iban.svg" alt="Forks">
    </a>
    <a href="https://github.com/Marshmallow-Development">
        <img src="https://img.shields.io/github/stars/Marshmallow-Development/package-iban.svg" alt="Stars">
    </a>
    <a href="https://github.com/Marshmallow-Development">
        <img src="https://img.shields.io/github/license/Marshmallow-Development/package-iban.svg" alt="License">
    </a>
</p>

# IBAN
Package to validate IBAN and get BIC information.

### Installing
```
composer require marshmallow/iban
```

### Validate IBAN
Call `\Marshmallow\IBAN\IBAN::validate($iban)` to check if the provided iban is valid. This function will return `true|false`.

### Get account number
Call `\Marshmallow\IBAN\IBAN::getBankAccount($iban)` to get the bank account number. If the IBAN is not valid, it will return `null`.

### Get BIC from IBAN
Call `\Marshmallow\IBAN\IBAN::getBic($iban)` to get the BIC code for this iban number. An `array` will be returned if we can match it. If not, `null` will be returned. 
```
[
    "bic" => "RABONL2U"
    "identifier" => "RABO"
    "name" => "RABOBANK"
    "iban" => "NL93RABO0317745646"
    "account_number" => "317745646"
]
```