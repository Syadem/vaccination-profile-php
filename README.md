# Vaccination profile for PHP

## Installation

Declare this repository in your `composer.json`, then install the package with [Composer](https://getcomposer.org/):

```bash
composer config repositories.syadem-vaccination-profile git https://github.com/Syadem/vaccination-profile-php.git
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
