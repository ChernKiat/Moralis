# moralis-laravel

This is a basic wrapper package for sending events to the [Moralis](https://moralis.io) API. It exposes a single class function, `moralis()`, that you can use across your Laravel controllers, models, and views.

## Installation

Run `composer require chernkiat/moralis-laravel` from your Laravel application root. Once that's finished, you'll need to open up your `.env` file and add the following to the bottom:

```php
MORALIS_API_KEY={your-api-key}
```

## Usage

## To send a single event in your application, use `moralis()->event(name, value, dimension)`. Name is a required string, value a required float, and dimension is an optional string that defaults to null.

## You can also send batch events with `moralis()->batch(items)`. See the [documentation on batching](https://app.quickmetrics.io/docs/send-events/batching) for more details about how your items array should be formatted.

## More Info

If you have any questions, feel free to reach out to me on Twitter [@PCKiat](https://twitter.com/PCKiat).
