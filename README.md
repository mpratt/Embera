Embera
======
[![Build Status](https://secure.travis-ci.org/mpratt/Embera.png?branch=master)](http://travis-ci.org/mpratt/Embera) [![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/mpratt/Embera/badges/quality-score.png?s=6122b04c188cd1d245088484966600f2ccb549fb)](https://scrutinizer-ci.com/g/mpratt/Embera/) [![Code Coverage](https://scrutinizer-ci.com/g/mpratt/Embera/badges/coverage.png?s=4cb389493e1806afc497bc53699538454502ea49)](https://scrutinizer-ci.com/g/mpratt/Embera/) [![Latest Stable Version](https://poser.pugx.org/mpratt/embera/v/stable.png)](https://packagist.org/packages/mpratt/embera) [![Total Downloads](https://poser.pugx.org/mpratt/embera/downloads.png)](https://packagist.org/packages/mpratt/embera)

Embera is a [Oembed](http://oembed.com/) consumer library written in PHP. Basically what it does is take urls from a text and queries the matching
service for information about the media.

If you are like me, in most cases all you want is to convert a simple Url to a valid html embed code. Now, the sweet thing about Embera, is that
some providers allow you to skip the part about making the request to a Oembed Provider and still get a valid html embed code! Read the `Offline Support`
section for more information.

On the other hand, there are some oembed providers that dont return html embedable code - Embera detects this and most of the time, it tries to generate
a valid html code for you to use.

Check out the `Basic Usage` instructions for more information.

Supported Sites
===============
Embera supports **60+** sites. Sites marked with an `*` allow offline html embedding

- * [Youtube](http://www.youtube.com/)
- * [Vimeo](http://vimeo.com/)
- * [DailyMotion](http://www.dailymotion.com/)
- [Instagram](http://instagram.com)
- [SoundCloud](http://soundcloud.com)
- [Twitter](https://twitter.com)
- * [Ted](http://ted.com)
- [Flickr](http://flickr.com)
- [Revision3](http://revision3.com)
- [Hulu](http://www.hulu.com)
- * [Kickstarter](http://www.kickstarter.com)
- [Deviantart](http://deviantart.com)
- [Facebook](https://facebook.com) (Public Posts/Videos)
- * [Scribd](http://www.scribd.com)

**And many many more!** for the full list checkout the [PROVIDERS.md](https://github.com/mpratt/Embera/blob/master/PROVIDERS.md) file.

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
            "mpratt/embera": "~1.0"
        }
    }

Save it and run `composer.phar install`

### Standalone Installation (without Composer)
Download the latest release or clone this repository, place the `Lib/Embera` directory on your project. Afterwards, you only need to include
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

For autoconverting urls into html embedable code, use the `autoEmbed()` method:
```php
    $text = 'Hi, I just saw this video http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun';
    $embera = new \Embera\Embera();
    echo $embera->autoEmbed($text);
    /* Hi, I just saw this video <iframe src="http://www.dailymotion.com/embed/video/xxwxe1" ..... */
```

The Embera object accepts an array with configuration options, so lets say you want to specify width or height:
```php
    $config = array(
        'params' => array(
            'width' => 300,
            'height' => 500
        )
    );

    $text = 'Check this video out http://vimeo.com/groups/shortfilms/videos/66185763';

    $embera = new \Embera\Embera($config);
    echo $embera->autoEmbed($text);

    /*Check this video out <iframe src="http://player.vimeo.com/video/66185763" width="300" height="480" ....*/
```

Do you want to allow embedding only from a few Sites?
```php
    $config = array(
        'allow' => array('Youtube', 'Vimeo')
    );

    $text = 'http://vimeo.com/groups/shortfilms/videos/66185763
             http://www.flickr.com/photos/bees/8597283706/in/photostream
             http://youtube.com/watch?v=J---aiyznGQ';

    $embera = new \Embera\Embera($config);

    echo $embera->autoEmbed($text);
    // The flickr url remains the same
```

Or perhaps you want to deny embedding from sites?
```php
    $config = array(
        'deny' => array('Youtube', 'Vimeo')
    );

    $text = 'http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto
             http://vimeo.com/groups/shortfilms/videos/66185763
             http://youtube.com/watch?v=J---aiyznGQ';

    $embera = new \Embera\Embera($config);

    echo $embera->autoEmbed($text);
    // Only the dailymotion link will be autoconverted
```

As an alternative you can embed urls only if they start with the embed:// prefix.
```php
    $config = array(
        'use_embed_prefix' => true
    );

    $text = 'embed://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto
             http://youtube.com/watch?v=J---aiyznGQ';

    $embera = new \Embera\Embera($config);

    echo $embera->autoEmbed($text);
    // Only the dailymotion link will be autoconverted
```

Maybe you are interested on seeing the full oembed response from the urls.
Use the `getUrlInfo()` method that returns an array with the complete information about
the media located in the url
```php
    $embera = new \Embera\Embera();
    print_r($embera->getUrlInfo('http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto'));
```

You can even feed an array full with urls and inspect the oembed response for
each one them.
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

Advanced Usage
==============

### Offline Support
One of the key features of Embera is offline support. This feature allows you to get at least the html embed code for some services,
without having to make a real http request to the oembed provider. What Offline support really means, is that the html embed code is constructed
from the original url given, this also means that most of the other information such as the title or the author's name, is probably going to be missing.
Lets call that a fake response.

Take a look at the [PROVIDERS.md](https://github.com/mpratt/Embera/blob/master/PROVIDERS.md) to see which providers allow offline support.

There is a configuration setting called `oembed` that should be used in order to change the way the library communicates with the oembed endpoint.
By default the value equals null, which means that Embera will first try to get the data from the oembed endpoint and if that fails it tries to return a
fake response. This behaviour is useful when there are problems connecting with the oembed provider! This means that you get at least an html embedable code.

When the `oembed` setting equals `true` the library gets the data directly from the oembed provider. If something goes wrong with the request, Embera skips
the usage of fake responses.

On the other hand you can set the `oembed` setting to `false` and by doing that, you will always get fake responses. By doing this you can skip the request
to the oembed provider. This library has offline support for a bunch of providers.

```php
    $config = array(
        'oembed' => false
    );

    $text = 'http://vimeo.com/groups/shortfilms/videos/66185763
             http://www.flickr.com/photos/bees/8597283706/in/photostream';

    $embera = new \Embera\Embera($config);
    echo $embera->autoEmbed($text);

    /* <iframe src="http://player.vimeo.com/66185763" width="420" height="315" ...
       http://www.flickr.com/photos/bees/8597283706/in/photostream */

    /* Since Embera doesnt have Flickr offline support, the url stays the same. */
```


When using the `getUrlInfo()` method, it is possible to see if the information from the provider came
directly from the oembed endpoint or if it was generated by the offline feature. If you see in the response,
the key `embera_using_fake` equal `0`, means that the library got the results from the Oembed provider.
When it equals `1`, the html embed code was generated by the library.

### Error Checking
There are 3 methods for error checking `bool hasErrors()`, `array getErrors()` and `string getLastError()`
```php
    $embera = new \Embera\Embera();
    $result = $embera->autoEmbed($text);

    if ($embera->hasErrors())
        echo $embera->getLastError();

    // Or you can inspect all the errors
    print_r($embera->getErrors());
```

### Ignoring HTML tags when AutoEmbedding
By default, Embera doesnt autoEmbed content/urls that are inside `<pre>`, `<a>`, `<code>` and `<img>` tags.
However if you wanted to ignore other tags, you can specify other tags. Use the `ìgnore_tags` configuration option

```php
    $config = array(
        'ignore_tags' => array('a', 'img', 'strong')
    );

    $embera = new \Embera\Embera();
    echo $embera->autoEmbed($text);
```

For reference, you might want to take a look at mthe `HtmlProcessor` class which is in charge of ignoring those tags.

### Output Formatting
Using the `\Embera\Formatter` object and the decorator pattern you are able to create templates with placeholders and
Embera will fill them with the relevant information from the oembed response.

A placeholder, in this case, is a word enclosed by `{}`, for example `{title}` which should give
you the title of the media. You can use any word from the oembed response ({provider_name}, {thumbnail_url}, {html}, {type}, etc).

The `Formatter` object has 2 more methods - `setTemplate()` and `transform()`
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

**Important**: __xml__ responses are **not** supported by `Embera` at the moment! Use JSON instead.

### Adding custom query string parameters to a service
Some Oembed providers support custom parameters. For example Twitter allows the `align` parameter, which
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

### Modifying attributes of fake/offline responses
By default services with offline support have a width of 420px and height of 315px.
You can modify this attributes via the config array:
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

You can pass options for each one of them when needed
```php
    $config = array(
        'http' => array(
            'curl' => array(
                CURLOPT_CONNECTTIMEOUT => 1000 // Connect timeout for curl
            ),
            'fopen' => array(
                'header' => "Content-Type: plain/text", //  Send a header with file_get_contents/fopen
            )
        )
    );

    $embera = new \Embera\Embera($config);
```

License
=======
**MIT**
For the full copyright and license information, please view the LICENSE file.

Author
=====
Hi! I'm Michael Pratt and I'm from Colombia!
My [Personal Website](http://www.michael-pratt.com) is in spanish.
