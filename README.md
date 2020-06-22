# Embera - PHP Oembed consumer library

[![Build Status](https://api.travis-ci.org/mpratt/embera.svg?branch=master)](https://travis-ci.org/mpratt/embera)
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

### Standalone Installation (without Composer)

Download the latest release or clone this repository and include the `Àutoloader.php` file inside the `Embera/src` directory.

```php
require '....../Autoloader.php';

use Embera\Embera;

$embera = new Embera();
```

## Requirements

- PHP >= 7.0 (It should work on 5.6)
- Curl or allow_url_fopen should be enabled

## Basic Usage

The most common or basic example is this one:

```php
use Embera\Embera;

$embera = new Embera();
echo $embera->autoEmbed('Hi! Have you seen this video? https://www.youtube.com/watch?v=J---aiyznGQ Its the best!');
```

The last example returns something like the following text:

```html
Hi! Have you seen this video?
<iframe
  width="459"
  height="344"
  src="https://www.youtube.com/embed/J---aiyznGQ?feature=oembed"
  frameborder="0"
  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
  allowfullscreen
></iframe>
Its the best!
```

You can also inspect urls for their oembed data:

```php
use Embera\Embera;

$embera = new Embera();
print_r($embera->getUrlData([
    'https://vimeo.com/374131624',
    'https://www.flickr.com/photos/bees/8597283706/in/photostream',
]));
```

That will return something like this

```php
Array
(
    [https://vimeo.com/374131624] => Array
        (
            [type] => video
            [version] => 1.0
            [provider_name] => Vimeo
            [provider_url] => https://vimeo.com/
            [title] => VACATION movie
            [author_name] => Andrey Kasay
            [author_url] => https://vimeo.com/andreykasay
            [is_plus] => 0
            [account_type] => basic
            [html] => <iframe src="......."></iframe>
            [width] => 426
            [height] => 240
            [duration] => 146
            [description] => Остросюжетное кино про жизнь
            [thumbnail_url] => https://i.vimeocdn.com/video/832478725_295x166.jpg
            [thumbnail_width] => 295
            [thumbnail_height] => 166
            [thumbnail_url_with_play_button] => https://i.vimeocdn.com/......Fcrawler_play.png
            [upload_date] => 2019-11-19 06:27:37
            [video_id] => 374131624
            [uri] => /videos/374131624
            [embera_using_fake_response] => 0
            [embera_provider_name] => Vimeo
        )
    [https://www.flickr.com/photos/bees/8597283706/in/photostream] => Array
        (
            [type] => photo
            [flickr_type] => photo
            [title] => Durumu
            [author_name] => ‮‭‬bees‬
            [author_url] => https://www.flickr.com/photos/bees/
            [width] => 1024
            [height] => 723
            [url] => https://live.staticflickr.com/8385/8597283706_7b51ea50b1_b.jpg
            [web_page] => https://www.flickr.com/photos/bees/8597283706/
            [thumbnail_url] => https://live.staticflickr.com/8385/8597283706_7b51ea50b1_q.jpg
            [thumbnail_width] => 150
            [thumbnail_height] => 150
            [web_page_short_url] => https://flic.kr/p/e6HjVq
            [license] => All Rights Reserved
            [license_id] => 0
            [html] => .........
            [version] => 1.0
            [cache_age] => 3600
            [provider_name] => Flickr
            [provider_url] => https://www.flickr.com/
            [embera_using_fake_response] => 0
            [embera_provider_name] => Flickr
            [html_alternative] => ........
        )
)
```

The response data depends on the provider, each of them returns information about the consulted
media, however this library always tries to provide an embeddable `html` key that can be used to
embed the information on a html document.

This library has fake responses / Offline support which is a way of getting the html embeddable code without the
need of querying the oembed provider. It also has caching support, provider collections, responsive
embeds and many other features. You can find out more by reading the documentation below.

## Documentation

- [Usage/Configuration instructions](doc/01-usage.md)
- [Supported providers](doc/02-providers.md)
- [Using provider collections](doc/03-provider-collections.md)
- [Using fake Responses](doc/04-fake-responses.md)
- [Using responsive embeds](doc/05-responsive-embeds.md)
- [Enabling cache](doc/06-caching.md)
- [Advanced Usage](doc/07-advanced-usage.md)

## Migrating from version >= 1.9.x

The folder structure has changed, the library is now in the `src` folder and
you can find an autoloader there if you are not using composer.

The configuration array has changed in order to make it simpler.
Take a look at the [Usage/Configuration instructions](doc/01-usage.md) to update it.

The other major change is that the `inspectUrlInfo()` method is now called `getUrlData()`.
The `HtmlFormatter` class does not exist anymore since the library allows now other type
of templating.

Updating should be fairly easy, check the documentation.

## Submitting bugs and feature requests

Bugs and feature request are tracked on [GitHub](https://github.com/mpratt/Embera/issues)

## Author

Michael Pratt - <yo@michael-pratt.com> - <http://www.michael-pratt.com>
See also the list of [contributors](https://github.com/mpratt/Embera/contributors) which participated in this project.

If you like this library, it has been useful to you and want to support me, you can do it via paypal.

[![Support via PayPal](https://cdn.rawgit.com/twolfson/paypal-github-button/1.0.0/dist/button.svg)](https://paypal.me/mtpratt)

## License

Embera is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
