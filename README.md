WordsApi
=========

A simple Laravel 5 service provider for the [WordsApi service](https://github.com/vcarreira/wordsapi).

## Installation

Add the following line to the `require` section of `composer.json`:

```json
{
    "require": {
        "vcarreira/wordsapi-laravel": "~1.0"
    }
}
```

## Setup

In `/config/app.php`, add the following to `providers`:

  ```
  WordsApi\WordsApiServiceProvider::class,
  ```

  and the following to `aliases`:

  ```
  'WordsApi' => WordsApi\Facades\WordsApi::class,
  ```

## Configuration
In order to use the service you must first get an API key from [WordsAPI](https://www.wordsapi.com). By default, the package uses the following environment variables to auto-configure the service without modification:

```
WORDSAPI_API_KEY
```


To customize the configuration file, publish the package configuration using Artisan.

```sh
php artisan vendor:publish --provider="WordsApi\WordsApiServiceProvider"
```

Update your settings in the generated `app/config/wordsapi.php` configuration file.

## Usage

To use the service within your app, you need to retrieve it from the [Laravel IoC
Container](http://laravel.com/docs/ioc). The following example uses the `app` helper to retrieve information about the word 'effect'.

```php
    $word = app('wordsapi')->word('effect');
    var_dump($word->definitions());
    var_dump($word->synonyms());
    var_dump($word->rhymes());
    var_dump($word->pronunciation());
```
If the facade is registered within the `aliases` section of the application configuration, you can also use the following code:

```php
    $word = WordsApi::word('effect');
    var_dump($word->definitions());
    var_dump($word->synonyms());
    var_dump($word->rhymes());
    var_dump($word->pronunciation());
```

## Limitation

Version 1.0 does not support search requests.

## Links
* [WordsAPI](https://www.wordsapi.com)
* [WordsAPI documentation](https://www.wordsapi.com/docs)
* [WordsApi PHP wrapper](https://github.com/vcarreira/wordsapi)
