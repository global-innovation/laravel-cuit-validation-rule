Validator::extend('foo', 'FooValidator@validate');

Laravel 5 CUIT CBU Validators for Argentina
============================================

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
