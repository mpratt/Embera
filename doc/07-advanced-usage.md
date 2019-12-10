# Advanced Usage

Embera has some other goodies that you can use to modify
the response, check for errors or even templating.

Here are some examples.

## Passing custom parameters to provider

Some providers allow custom parameters. You can pass information
to them in the configuration array using their Provider name as
prefix. For example, to pass parameters to the Twitter provider:

```php

$config = [
 'Twitter_align' => 'center',
 'Twitter_hide_media' => 1
];

$embera = new Embera($config);
```

## Modifying Responses

Lets say you want to modify the html response from a oembed
provider right from the source. You can add filters which help
you access the response right from the output.

```php
$embera = new Embera();
$embera->addFilter(function ($response) {
    if (!empty($response['html']) && $response['embera_provider_name'] == 'Youtube') {
        $response['html'] = '<div class="my-class">' . $response['html'] . '</div>';
    }

    return $response;
});

$text = 'This is the best video ever! Look: https://www.youtube.com/watch?v=J---aiyznGQ';
echo $embera->autoEmbed($text);
// or use print_r($embera->getUrlData($text));
```

The resulting html wraps the embed resource into a div with the class `my-class`,
but only on responses by the Youtube provider.

You can even use it for templating:

```php
$embera = new Embera();
$embera->addFilter(function ($response) {

    $html = [];
    $html[] = '<div class="my-class-' . strtolower($response['embera_provider_name']) . '">';

    if (!empty($response['html'])) {
        $html[] = $response['html'];
    } else {
        $html[] = '<h1>No data returned :(</h1>';
    }

    $html[] = '</div>';
    $response['html'] = implode('', $html);

    return $response;
});

$text = 'This is the best video ever! Look: https://www.youtube.com/watch?v=J---aiyznGQ';
echo $embera->autoEmbed($text);
// or use print_r($embera->getUrlData($text));
```

Filters are very versatile because it enables you to access the whole response and
modify it as you like.

## Error Checking

There are 3 methods for error checking `bool hasErrors()`, `array getErrors()` and
`string getLastError()`

```php
$embera = new Embera();

$text = 'This is the best video ever! Look: https://www.youtube.com/watch?v=J---aiyznGQ';
$result = $embera->autoEmbed($text);

if ($embera->hasErrors()) {
echo $embera->getLastError();
}

// Or you can inspect all the errors
print_r($embera->getErrors());
```

## Ignoring HTML tags when AutoEmbedding

By default, Embera doesnt autoEmbed content/urls that are inside `<pre>`, `<a>`, `<code>`, `<iframe>` and `<img>` tags.
However if you wanted to ignore other tags, you can specify other tags. Use the `ìgnore_tags` configuration option

```php
$config = [
    'ignore_tags' => ['a', 'img', 'strong']
];

$embera = new Embera($config);
```
