Embera
======
[![Build Status](https://secure.travis-ci.org/mpratt/Embera.png?branch=master)](http://travis-ci.org/mpratt/Embera)

Embera is a [Oembed](http://oembed.com/) consumer library written in PHP. Basically what it does is take urls from a text and queries the matching
service for information about the media.

If you are like me, in most cases all you want is to convert a simple Url to a valid html embed code. Now, the sweet thing about Embera, is that
if you disable online support, in some services you can skip the part about making the request to a Oembed Provider and still get a valid html
embed code.

Check out the `Basic Usage` instructions for more information.

Supported Sites
===============
Sites marked with an `*` allow offline html embedding
- [Youtube](http://www.youtube.com/) *
- [Vimeo](http://vimeo.com/) *
- [DailyMotion](http://www.dailymotion.com/) *
- [Viddler](http://www.viddler.com) *
- [Instagram](http://instagram.com)
- [SoundCloud](http://soundcloud.com)
- [Twitter](https://twitter.com)
- [Qik](http://qik.com)
- [Flickr](http://flickr.com)
- [Revision3](http://revision3.com)
- [Hulu](http://www.hulu.com)
- [CollegeHumor](http://www.collegehumor.com)
- [Jest](http://www.jest.com)
- [MyOpera](http://my.opera.com)
- [Deviantart](http://deviantart.com)
- [Twitter](https://twitter.com)
- [SpeakerDeck](https://speackerdeck.com)
- [Alpha App.NET](https://alpha.app.net)
- [BlipTV](http://blip.tv)
- [NFB](http://www.nfb.ca)
- [Scribd](http://www.scribd.com)
- [Dotsub](http://dotsub.com)
- [yfrog.com](http://yfrog.com)
- [ClikThrough](http://www.clikthrough.com)
- [SlideShare](http://www.slideshare.net)

Requirements
============
- PHP >= 5.3
- Curl or `allow_url_fopen` must be enabled

Installation
============

### Install with Composer
If you're using [Composer](https://github.com/composer/composer) to manage
dependencies, you can use this library by creating a composer.json and adding this:

    {
        "require": {
            "mpratt/embera": "dev-master"
        }
    }

Save it and run `composer.phar install`

### Standalone Installation (without Composer)
Download/clone this repository, place the `Lib/Embera` directory on your project. Afterwards, you only need to include
the Autoload.php file.

```php
    require '/path/to/Embera/Autoload.php';
    $embera = new \Embera\Embera();
```

Or if you already have PSR-0 complaint autoloader, you just need to register Embera
```php
    $loader->registerNamespace('Embera', 'path/to/Embera');
```

Basic Usage
===========

Auto convert urls to html embed code.
```php
    $text = 'Hi, i just saw this video http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun';
    $embera = new \Embera\Embera();
    echo $embera->autoEmbed($text);
    /* Hi, i just saw this video <iframe src="http://www.dailymotion.com/embed/video/xxwxe1" width="480" height="269" frameborder="0"></iframe> */
```

Want to specify width or maxwidth? use
```php
    $config = array(
        'params' => array('width' => 300)
    );

    $text = 'Check this video out http://vimeo.com/groups/shortfilms/videos/66185763';

    $embera = new \Embera\Embera($config);
    echo $embera->autoEmbed($text);

    /*Check this video out <iframe src="http://player.vimeo.com/video/66185763" width="300" height="126" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>*/
```

With height is basically the same
```php
    $config = array(
        'params' => array('height' => 300)
    );

    $embera = new \Embera\Embera($config);
```

Disable online support. This allows you to get at least the html embed code for some services, without having
to make a real http request to a oembed provider.
```php
    $config = array(
        'oembed' => false
    );

    $text = 'http://vimeo.com/groups/shortfilms/videos/66185763 http://www.flickr.com/photos/bees/8597283706/in/photostream';

    $embera = new \Embera\Embera($config);
    echo $embera->autoEmbed($text);

    /* <iframe src="http://player.vimeo.com/66185763" width="420" height="315" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> http://www.flickr.com/photos/bees/8597283706/in/photostream */
    /* Since Embera doesnt have Flickr offline support, the url stays the same. */
```

Do you want to allow embedding only from a few Sites?
```php
    $config = array(
        'allow' => array('Youtube', 'Vimeo')
    );

    $text = 'http://vimeo.com/groups/shortfilms/videos/66185763 http://www.flickr.com/photos/bees/8597283706/in/photostream http://youtube.com/watch?v=J---aiyznGQ';
    $embera = new \Embera\Embera($config);

    echo $embera->autoEmbed($text);
```

Or perhaps you want to deny embedding from a couple of sites?
```php
    $config = array(
        'deny' => array('Youtube', 'Vimeo')
    );

    $text = 'http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto http://vimeo.com/groups/shortfilms/videos/66185763  http://youtube.com/watch?v=J---aiyznGQ';
    $embera = new \Embera\Embera($config);

    echo $embera->autoEmbed($text);
```

As an alternative you can embed urls only if they start with the embed:// prefix.
```php
    $config = array(
        'use_embed_prefix' => true
    );

    $text = 'embed://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto (this url will not be embeded http://youtube.com/watch?v=J---aiyznGQ)';
    $embera = new \Embera\Embera($config);

    echo $embera->autoEmbed($text);
```

Maybe you are interested on seeing the full oembed response from the urls.
Use the `getUrlInfo()` method.
```php
    $embera = new \Embera\Embera();
    print_r($embera->getUrlInfo('http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto'));

// Sample Output:
Array
(
    [http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto] => Array
        (
            [type] => video
            [version] => 1.0
            [provider_name] => Dailymotion
            [provider_url] => http://www.dailymotion.com
            [title] => BMW Serie3 2012 en México
            [author_url] => http://www.dailymotion.com/Starmedia
            [width] => 480
            [height] => 360
            [html] => <iframe src="http://www.dailymotion.com/embed/video/xp30q9" width="480" height="360" frameborder="0"></iframe>
            [thumbnail_url] => http://s2.dmcdn.net/AaY9x/x240-Xw9.jpg
            [thumbnail_width] => 320
            [thumbnail_height] => 240
            [embera_using_fake] => 0
        )
)
```

You can even feed an array full with urls and inspect the oembed response for
each one them
```php
    $urls = array('http://vimeo.com/groups/shortfilms/videos/66185763',
                  'http://vimeo.com/47360546',
                  'http://www.flickr.com/photos/bees/8597283706/in/photostream',
                  'http://youtube.com/watch?v=J---aiyznGQ');

    $embera = new \Embera\Embera();
    print_r($embera->getUrlInfo($urls));
```

Remember that some Oembed Providers append more/different information (and others less) this depends heavily from each provider and
the type of media you are requesting.

On a quick note, if you see in the response, the key `embera_using_fake` equal `0`, means that the library
got the results from the Oembed provider. When it equals `1`, it means that the html embed code is constructed
from the original url given - It also means that most of the other information is going to be missing.

Advanced Usage
==============

### Error Checking
There are 3 methods for error checking `bool hasErrors()`, `array getErrors()` and `string getLastError()`
```php
    $embera = new \Embera\Embera();
    $result = $embera->autoEmbed($text);

    if ($embera->hasErrors())
        echo $embera->getLastError();

    // Or you can get an array with all the errors
    print_r($embera->getErrors());
```

### Output Formatting
Using the `\Embera\Formatter` object and the decorator pattern you are able to create templates with placeholders and
Embera will fill them with the relevant information from the oembed response.

A placeholder, in this case, is a word enclosed by `{}`, for example `{title}` which should give
you the title of the media. You can use any word from the oembed response ({provider_name}, {thumbnail}, {html}, {type}, etc).

Two new methods are available, the `setTemplate` and `transform`
```php
    $embera = new \Embera\Embera();
    $embera = new \Embera\Formatter($embera);

    $embera->setTemplate('<div class="myclass">{provider_name}: {title} <p>{html}</p></div>');

    echo $embera->transform(array('url1', 'url2', 'url3'));
    // <div class="myclass">provider for url1: the title of url1 <p>embed code for url 1</p></div>
    // <div class="myclass">provider for url2: the title of url2 <p>embed code for url 2</p></div>
    // <div class="myclass">provider for url3: the title of url3 <p>embed code for url 3</p></div>
```

You can also give a string with urls and they will be replaced by the given template
```php
    $embera = new \Embera\Embera();
    $embera = new \Embera\Formatter($embera);

    $embera->setTemplate('<div class="oembed">{html}</div>');

    echo $embera->transform('Hey checkout this video http://url.com/video/id');
    // hey checkout this video <div class="oembed">embed code for url.com/video/id</div>
```

If you like you can use a shorter syntax, just by passing a string or array as a second parameter to the
`setTemplate` method
```php
    $embera = new \Embera\Formatter(new \Embera\Embera());
    echo $embera->setTemplate('<div class="oembed">{html}</div>', array('url1.com', 'url2.com', 'url3.com'));
```

### Adding Custom Providers
Lets say you have a **private** Oembed Provider and you want to manage it with `Embera`. Well you can do it, first you have to create
a new class that extends the `\Embera\Adapters\Service` class. You can use one of the included providers in the /Embera/Providers
directory to get an idea of what it needs to have.

After that you need to use the `addProvider()` method. This method requires that you specify the host of your service,
the class you created and __optionally__ you can pass a third parameter, an array with data that should be used on the query string
to your Oembed Provider, for example an API key.
```php
    /**
     * A very basic custom Service
     */
    class CustomService extends \Embera\Adapters\Service
    {
        protected $apiUrl = 'http://custom-service.com/oembed.json';
        public function validateUrl(){ return preg_match('~customservice\.com/([0-9]+)~i', $this->url); }
    }

    $urls = array(
            'http://customservice.com/9879837498',
            'http://www.customservice.com/98756478',
            'http://customservice.com/9879837498/'
            );

    $embera = new \Embera\Embera();
    $embera->addProvider('customservice.com', 'CustomService', array('api_key' => '********'));
    $response = $embera->getUrlInfo($urls);

    print_r($response);
```

However, If the provider is public, the best way to deal with it is to open a bug report right here on github so
I can create a class for the service and everyone benefits from it.

**Important**: __xml__ responses are **not** supported by `Embera` at the moment!

### Adding custom query string parameters to a service
Some Oembed providers support custom parameters. For example twitter allows the `align` parameter, which
applies alignment styles to the html embed code. Most of the providers have documentation available
where you can search for possible parameters.

Use the config array:
```php
    $config = array(
        'custom_params' => array(
            'Twitter' => array('align' => 'center', 'hide_media' => 1)
        )
    );

    $embera = new \Embera\Embera($config);
```

In this case Im passing the align and hide_media parameters to the twitter service.
As a general rule, you just have to specify the Name of the service as a key and an
associative array with the parameters.

### Modifying attributes of fake a response
By default services fake responses have a width of 420px and height of 315px.
You can modify this attributes via the config array
```php
    $config = array(
        'fake' => array(
            'width' => 800,
            'height' => 300
        )
    );

    $embera = new \Embera\Embera($config);
```

### Passing Options to the HttpRequest Class
The \Embera\HttpRequest class is a simple wrapper for `curl` and `file_get_contents` (when the `allow_url_fopen` directive is
enabled).

You can pass options for each of them when needed
```php
    $config = array(
        'http' => array(
            'curl' => array(
                CURLOPT_CONNECTTIMEOUT => 1000 // Connect timeout for curl
            ),
            'fopen' => array(
                'header' => "Content-Type: plain/text", //  Send a header on fopen
            )
        )
    );

    $embera = new \Embera\Embera($config);
```

License
=======
MIT
For the full copyright and license information, please view the LICENSE file.

Author
=====

Michael Pratt

[Personal Website](http://www.michael-pratt.com)
