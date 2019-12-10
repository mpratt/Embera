# Caching

Embera provides a simple caching interface in order to reduce server
load requesting information to the providers. The engine is a simple
file cache, so you need to add a writable folder.

To enable it use the following code as an example:

```php

use Embera\Cache\Filesystem;
use Embera\Http\HttpClient;
use Embera\Http\HttpClientCache;
use Embera\Embera;

$writablePath = sys_get_temp_dir(); // Your writable Path
$duration = 60; // Duration of the cache in seconds

$httpCache = new HttpClientCache(new HttpClient());
$httpCache->setCachingEngine(new Filesystem($writablePath, $duration));

// Instantiate Embera
$embera = new Embera([], null, $httpCache);

// Do Your thing
```

## Cache Flushing

```php

use Embera\Cache\Filesystem;
use Embera\Http\HttpClient;
use Embera\Http\HttpClientCache;
use Embera\Embera;

$writablePath = sys_get_temp_dir(); // Your writable Path
$duration = 60; // Duration of the cache in seconds
$cache = new Filesystem($writablePath, $duration);
$cache->clear();
```
