# shinsenter/defer-laravel

🚀 A Laravel package that focuses on minimizing payload size of HTML document
and optimizing processing on the browser when rendering the web page.

- **Package**: [shinsenter/defer-laravel](https://packagist.org/packages/shinsenter/defer-laravel)
- **Version**: 1.0.3
- **Author**: Mai Nhut Tan <shin@shin.company>
- **Copyright**: 2021 AppSeeds <https://code.shin.company/>
- **License**: [MIT](https://raw.githubusercontent.com/shinsenter/defer-laravel/master/LICENSE)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/shinsenter/defer-laravel.svg)](https://packagist.org/packages/shinsenter/defer-laravel)
[![CodeFactor](https://www.codefactor.io/repository/github/shinsenter/defer-laravel/badge)](https://www.codefactor.io/repository/github/shinsenter/defer-laravel)
[![Total Downloads](https://img.shields.io/packagist/dt/shinsenter/defer-laravel.svg)](https://packagist.org/packages/shinsenter/defer-laravel)


## Features

- [x] Simplify library options
- [x] Embed defer.js library
- [x] Normalize DOM elements
- [x] Fix missing meta tags
- [x] Fix missing media attributes
- [x] Preconnect to required origins
- [x] Preload key requests
- [x] Prefetch key requests
- [x] Browser-level image lazy-loading for the web
- [x] Lazy-load offscreen and hidden iframes
- [x] Lazy-load offscreen and hidden videos
- [x] Lazy-load offscreen and hidden images
- [x] Lazy-load CSS background images
- [x] Reduce the impact of JavaScript
- [x] Defer non-critical CSS requests
- [x] Defer third-party assets
- [x] Add fallback `<noscript>` tags for lazy-loaded objects
- [x] Add custom HTML while browser is rendering the page (splashscreen)
- [x] Attribute to ignore optimizing the element
- [x] Attribute to ignore lazyloading the element
- [x] Optimize AMP document
- [x] Minify HTML output


## Installation

Require the `shinsenter/defer-laravel` package
in your `composer.json` and update your dependencies:

```sh
composer require shinsenter/defer-laravel
```


## Global usage

To allow `DeferMiddleware` for all of your routes,
add the `DeferMiddleware` middleware at the top
of the `$middleware` property of  `app/Http/Kernel.php` class:

```php
protected $middleware = [
  \AppSeeds\DeferLaravel\DeferMiddleware::class,
    // ...
];
```


## Configuration

The defaults are set in `config/defer-laravel.php`.
Publish the config to copy the file to your own config:

```sh
php artisan vendor:publish --tag="defer-laravel"
```


### Options

View the [defer-laravel.php](https://github.com/shinsenter/defer-laravel/blob/master/config/defer-laravel.php)
config file for more details.


### Lumen

On Lumen, just register the `DeferServiceProvider` manually
in your `bootstrap/app.php` file:

```php
$app->register(\AppSeeds\DeferLaravel\DeferServiceProvider::class);
```

Also copy the [defer-laravel.php](https://github.com/shinsenter/defer-laravel/blob/master/config/defer-laravel.php)
config file to `config/defer-laravel.php` and put it into action:

```php
$app->configure('defer-laravel');
```


## Global usage for Lumen

To allow `DeferMiddleware` for all your routes,
add the `DeferMiddleware` middleware to the global middleware.

```php
$app->middleware([
    // ...
    \AppSeeds\DeferLaravel\DeferMiddleware::class,
]);
```


### Changelog

Please see [CHANGELOG](CHANGELOG.md)
for more information what has changed recently.


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


### Security

If you discover any security related issues,
please email [shin@shin.company](mailto:shin@shin.company)
instead of using the issue tracker.


## License

The MIT License (MIT).
Please see [License File](LICENSE.md) for more information.


## My works


### Defer.js

https://github.com/shinsenter/defer.js/

🥇 A super small, super efficient library
that helps you lazy load almost everything
like images, video, audio, iframes
as well as stylesheets, and JavaScript.


### defer.php

https://github.com/shinsenter/defer.php/

🚀 A PHP library that aims to help you
concentrate on web performance optimization.


### Wordpress plugin

https://github.com/shinsenter/defer-wordpress/

⚡️ A native, blazing fast lazy loader.
✅ Legacy browsers support (IE9+).
💯 SEO friendly.
🧩 Lazy load almost anything.


## Support my activities

[![Donate via Paypal](https://img.shields.io/badge/Donate-Paypal-blue)](https://www.paypal.me/shinsenter)
[![Become a sponsor](https://img.shields.io/badge/Donate-Patreon-orange)](https://www.patreon.com/appseeds)
[![Become a stargazer](https://img.shields.io/badge/Support-Stargazer-yellow)](https://github.com/shinsenter/defer.php/stargazers)
[![Report an issue](https://img.shields.io/badge/Support-Issues-green)](https://github.com/shinsenter/defer.php/issues/new)


* * *

From Vietnam 🇻🇳 with love.

