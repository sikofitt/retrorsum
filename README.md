# Retrorsum

This is a simple thing that will search for a file traversing down from the current directory.

This came about because I was thinking of how I could find the base directory of a project without guessing with `__DIR__."/../../../"` and without forcing an app/ directory or something.

I wanted to find a way to find the base directory of an app from a class.

At the moment it does not work if the path is a symlink.

## Usage

```php
use Sikofitt\Retrorsum\Finder;

$finder = new Finder('autoload.php');

define('BASE_DIR', dirname((string)$finder));
```

or

```php
define('BASE_DIR', dirname((string)(new Finder('composer.json'))));
```

Although this could set BASE_DIR as an empty string if it found nothing.

```php
$finder = new Finder('composer.json');
if(true === $finder->isFound())
{
    define('BASE_DIR', dirname($finder->getPath()));
} else {
   // Whatever your other method would be.
}
```

## License
GPL-3.0
