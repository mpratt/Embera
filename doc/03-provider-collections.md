# Provider Collections

Embera uses provider collections which return all the oembed providers. By
default Embera uses the `DefaultProviderCollection` object which registers
all the **+150** supported websites.

However there are more collections like the `SlimProviderCollection` and the
`CustomProviderCollection`, that you can use to choose which providers you
want to support.

You can also register other providers, even providers you have created for
yourself.

## Default Provider Collection

Lets take a look at the default Provider Collection and some examples.

### Disabling some Providers

The following example will only detect all providers except Youtube and Instagram

```php

use Embera\Embera;
use Embera\ProviderCollection\DefaultProviderCollection;

$config = [
    'https_only' => true,
];

$collection = new DefaultProviderCollection($config);
$collectionWithoutYoutubeAndInstagram = $collection->filter(function ($elem) {
    return (!in_array($elem, ['Youtube', 'Instagram']));
});

$embera = new Embera($config, $collectionWithoutYoutubeAndInstagram);
echo $embera->autoEmbed('.......');
```

### Only Allowing some Providers

If you you only want to allow urls from a couple from providers you can use the same
method as the example above by changing only one line. For example we only want to
allow urls from Kickstarter

```php
$collection = new DefaultProviderCollection($config);
$onlyKickstarter = $collection->filter(function ($elem) {
    return ($elem == 'Kickstarter');
});

$embera = new Embera($config, $onlyKickstarter);
echo $embera->autoEmbed('.......');
```

### Adding support to a custom provider

Lets say you want to add support to your custom oembed provider, you can do that too!
Just create a class implementing the `ProviderInterface` or using another provider
as an example and add it to the collection.

```php
$collection = new DefaultProviderCollection($config);
$collection->addProvider('*.yourproviderhost.com', '\Class\With\Your\Provider');

$embera = new Embera($config, $collection);
```

Or use:

```php
$collection = new DefaultProviderCollection($config);
$collection->registerProvider('\Class\With\Your\Provider', false);

$embera = new Embera($config, $collection);
```

## Slim Provider Collection

The Slim Provider collection has the same methods of the `DefaultProviderCollection`,
the only difference is that instead of supporting all the providers (+150), it
only supports around **50** providers.

There is no criteria for choosing this providers other than my perception of
popularity. if you want me to add a "popular" site to this collection
please let me know.

If you want the current list of supported providers, you should look at the `SlimProviderCollection`
source.

```php
use Embera\Embera;
use Embera\ProviderCollection\SlimProviderCollection;

$config = [];

$slimCollection = new SlimProviderCollection($config);
$embera = new Embera($config, $slimCollection);
```

## Custom Provider Collection

This collection is useful when you have a list of providers you want to
support and dont want to use the `filter` method.

This collection is empty, just waiting for you to register the providers
you want.

```php
use Embera\Embera;
use Embera\ProviderCollection\CustomProviderCollection;

$config = [];

$customCollection = new CustomProviderCollection($config);
$customCollection->registerProvider('Youtube');
$customCollection->registerProvider('Flickr');
$customCollection->registerProvider('Instagram');

$embera = new Embera($config, $customCollection);
```

This example only registers 3 providers, `Youtube`, `Flickr` and `Instagram`.
