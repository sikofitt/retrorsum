# Retrorsum

This is a simple thing that will search for a file traversing down from the current directory.

This came about because I was thinking of how I could find the base directory of a project without guessing with `__DIR__."/../../../"` and without forcing an app/ directory or something.

I wanted to find a way to find the base directory of an app from a class.

## Usage

```php
use Sikofitt\Retrorsum\Finder;

$finder = new Finder('composer.json');

define('BASE_DIR', (string)$finder);
```

or

```php
define('BASE_DIR', (string)(new Finder('composer.json')));
```

Although this could set BASE_DIR as an empty string if it found nothing.

```php
$finder = new Finder('composer.json');
if(true === $finder->isFound())
{
    define('BASE_DIR', $finder->getPath());
} else {
   // Whatever your other method would be.
}
```

## License
GPL-3.0
