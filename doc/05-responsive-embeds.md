# Responsive Embeds

Responsive embeds its a feature used in order to provide responsive capabilities
to html responses. Some providers already return responsive html, however most of
them dont, and this is where this feature comes to play. **It is still in beta testing
so use it carefully**.

First of all you need to add the following lines into your stylesheet

```css
.embera-embed-responsive {
  position: relative;
  display: block;
  width: 100%;
  padding: 0;
  overflow: hidden;
  padding-bottom: 50%;
}

.embera-embed-responsive-item {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}
```

Then you have to tell the library you are going to use responsive embeds

```php
$config = [
    'responsive' => true
];

$embera = new Embera($config);

$text = 'This is the best video ever! Look: https://www.youtube.com/watch?v=J---aiyznGQ';
echo $embera->autoEmbed($text);
```

The resulting html is something like this:

```html
This is the best video ever! Look:
<div
  class="embera-embed-responsive embera-embed-responsive-video embera-embed-responsive-provider-youtube"
>
  <iframe
    class="embera-embed-responsive-item embera-embed-responsive-item-video"
    src="https://www.youtube.com/embed/J---aiyznGQ?feature=oembed"
    frameborder="0"
    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen
  ></iframe>
</div>
```

As you can see, the library adds more classes to the html. You can even use a class
based on the provider and the type of item you are displaying. This also means that
in some cases you might need to adjust the height of the returned html.

This gives you the flexibility to add more styling to the html embed.
