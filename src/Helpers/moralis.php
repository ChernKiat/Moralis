<?php

use ChernKiat\Moralis\Native;
use ChernKiat\Moralis\Storage;

if (!function_exists('moralis')) {
    function moralis($model) {
        switch ($model) {
            case 'native':
                return app(Native::class);
                break;
            case 'storage':
                return app(Storage::class);
                break;
            default:
                return null;
                break;
        }
    }
}
