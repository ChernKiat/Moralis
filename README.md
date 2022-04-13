# moralis-laravel

This is a basic wrapper package for sending events to the [Moralis](https://moralis.io) API. It exposes a single class function, `moralis()`, that you can use across your Laravel controllers, models, and views.

## Installation

Run `composer require chernkiat/moralis-laravel` from your Laravel application root. Once that's finished, you'll need to open up your `.env` file and add the following to the bottom:

```php
MORALIS_API_KEY={your-api-key}
```

## Usage

## To send a single file to your Moralis server, use `moralis('storage')->uploadFile(filename, content)`.

## You can also send batch files with `moralis('storage')->uploadFiles(files)`. See the [documentation on batching](https://docs.moralis.io/moralis-dapp/web3-sdk/ipfs-storage-new) for more details about how your files array should be formatted.

## More Info

If you have any questions, feel free to reach out to me on Twitter [@PCKiat](https://twitter.com/PCKiat).
