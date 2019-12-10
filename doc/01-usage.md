# Usage

## Basic Usage

The most common or basic example is this one, which autoembeds the html into the text

```php
use Embera\Embera;

$embera = new Embera();
echo $embera->autoEmbed('Hi! Have you seen this video? https://www.youtube.com/watch?v=J---aiyznGQ Its the best!');
```

You can Inspect urls and fetch the oembed results by doing:

```php
use Embera\Embera;

$embera = new Embera();
print_r($embera->getUrlData([
    'https://vimeo.com/374131624',
    'https://www.flickr.com/photos/bees/8597283706/in/photostream',
]));
```

## Passing Configuration Options

You can pass an array with the following keys into the `Embera` object:

| key                | Description                                                                                                                                                                 |
| ------------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| https_only         | true/false - Wether the library should use providers that support https on their html response.                                                                             |
| fake_responses     | Embera::ALLOW_FAKE_RESPONSES / Embera::DISABLE_FAKE_RESPONSES / Embera::ONLY_FAKE_RESPONSES - More Information in [fake responses documentation](04-fake-responses.md)      |
| ignore_tags        | Array with tags that should be ignored when detecting urls from a text. So that for example Embera doesnt replace urls inside an `iframe` or `img` tag.                     |
| responsive         | true/false - Wether we modify the html response in order to get responsive html. - More Information in the [responsive data documentation](05-responsive-embeds.md). (BETA) |
| maxwidth / width   | Set the maximun width of the embeded resource                                                                                                                               |
| maxheight / height | Set the maximun height of the embeded resource                                                                                                                              |

You can pass custom parameters to some providers, by prefixig them with their provider name. Look at the [07-advanced-usage.md](07-advanced-usage.md) guide for more information.

### Examples

The Following example will only use Fake responses, set a max width of 600 and will convert urls where the provider supports https.

```php
use Embera\Embera;

$config = [
    'https_only' => true,
    'fake_responses' => Embera::ONLY_FAKE_RESPONSES,
    'width' => 600,
];

$embera = new Embera($config);
echo $embera->autoEmbed('Hi! Have you seen this video? https://www.youtube.com/watch?v=J---aiyznGQ Its the best!');
```
