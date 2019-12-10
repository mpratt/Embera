# Embera - PHP Oembed consumer library [![Build Status](https://travis-ci.org/mpratt/embera.svg?branch=master)](https://travis-ci.org/mpratt/embera)

[![Total Downloads](https://img.shields.io/packagist/dt/mpratt/embera.svg)](https://packagist.org/packages/mpratt/embera)
[![Latest Stable Version](https://img.shields.io/packagist/v/mpratt/embera.svg)](https://packagist.org/packages/mpratt/embera)
[![Support via PayPal](https://cdn.rawgit.com/twolfson/paypal-github-button/1.0.0/dist/button.svg)](https://paypal.me/mtpratt)

Embera is an Oembed consumer library written in PHP.
It takes urls from a text and queries the matching service for information about the media and embeds the resulting html.
It supports **+150** sites, such as Youtube, Twitter, Livestream, Dailymotion, Instagram, Vimeo and [many many more](doc/02-providers.md).

## Installation

Install the latest stable version with:

```bash
$ composer require mpratt/embera:~2.0
```

## Basic Usage

```php
<?php

```

This library has fake responses, caching support, responsive embeds and many
other features. You can find out more by reading the documentation below.

## Documentation

- [Usage instructions](doc/01-usage.md)
- [Supported providers](doc/02-providers.md)
- [Using provider collections](doc/03-provider-collections.md)
- [Using fake Responses](doc/04-responsive-embeds.md)
- [Using responsive embeds](doc/05-responsive-embeds.md)
- [Enabling cache](doc/06-caching.md)
- [Advanced Usage](doc/07-advanced-usage.md)

## Requirements

## Submitting bugs and feature requests

Bugs and feature request are tracked on [GitHub](https://github.com/mpratt/Embera/issues)

## Author

Michael Pratt - <yo@michael-pratt.com> - <http://www.michael-pratt.com>
See also the list of [contributors](https://github.com/mpratt/Embera/contributors) which participated in this project.

If you like this library, it has been useful to you and want to support me, you can do it via paypal.

[![Support via PayPal](https://cdn.rawgit.com/twolfson/paypal-github-button/1.0.0/dist/button.svg)](https://paypal.me/mtpratt)

## License

Embera is licensed under the MIT License - see the `LICENSE` file for details
