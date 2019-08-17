Laravel Validator Rule for CUIT
===============================

# Installation

To install this package include it in your `composer.json`

```shell
composer require globalinnovation/cuit-rule
```

Add the following lines to the `boot` method of the `AppServiceProvider` class ([Check Laravel documentation](https://laravel.com/docs/5.8/validation#custom-validation-rules)):

```php
Validator::extend('cuit', 'GlobalInnovation\Validation\Rules\CUIT@validate');
Validator::replacer('cuit', "The CUIT is invalid.");
```
