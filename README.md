# Vaccination profile for PHP

## Installation

The package is published on [Packagist](https://packagist.org/packages/syadem/vaccination-profile). Install it with [Composer](https://getcomposer.org/):

```bash
composer require syadem/vaccination-profile
```

## Usage

`Container::init()` downloads the latest version of the nomenclature. It is costly: call it once and keep the instance in a global cache.

```php
<?php
$container = Syadem\VaccinationProfile\Container::init();

foreach ($container->getConditions()->all() as $condition) {
  echo $condition->getLabel()->getFr() . "\n";
}
```

## License

MIT
