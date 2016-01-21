#PHPass Hashing integration for Laravel 5

[![Build Status](https://travis-ci.org/ksungcaya/phpass-laravel.svg?branch=master)](https://travis-ci.org/ksungcaya/phpass-laravel)
[![HHVM Status](http://hhvm.h4cc.de/badge/ksungcaya/phpass-laravel.svg)](http://hhvm.h4cc.de/package/ksungcaya/phpass-laravel)

A PHPass Hasher integration to Laravel 5. This package overrides the default Bycrypt Hasher of Laravel 
and uses the [Phpass](http://openwall.com/phpass/) Library from Openwall for password hashing and checking methods.

If you are using Laravel 4, try out the old implementation [here](https://github.com/ksungcaya/phpass).

## Installation

Install package through Composer.

```js
"require": {
    "ksungcaya/phpass-laravel": "1.*"
}
```

Then run composer update
```
$ composer update
```

Update `config/app.php` and include a reference to this package's service provider in the providers array.

```php
'providers' => [
    Sungcaya\Phpass\PhpassHashServiceProvider::class
]
```

## Usage

Now that PHPass is installed in Laravel, you can now use the normal `Hash` methods.

```php
Hash::make('secret');
Hash::check('secret', $hashedPassword);
```

## That's it!

Please refer to Laravel documentation on [Hashing](http://laravel.com/docs/5.1/hashing) to know more about the Hash methods.
