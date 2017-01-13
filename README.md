[![Latest Stable Version](https://poser.pugx.org/arrilot/slim-api-controller/v/stable.svg)](https://packagist.org/packages/arrilot/slim-api-controller/)
[![Total Downloads](https://img.shields.io/packagist/dt/arrilot/slim-api-controller.svg?style=flat)](https://packagist.org/packages/arrilot/slim-api-controller)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/arrilot/slim-api-controller/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/arrilot/slim-api-controller/)

# Simple base api controller for slimframework.com

## Installation

1) `composer require arrilot/slim-api-controller`

2) Register the strategy and a logger into service container.

```php
$container = $app->getContainer();
$container['foundHandler'] = function () {
    return new \Arrilot\SlimApiController\OnlyArgsStrategy();
};
$container['logger'] = function () {
    // return ...
};
```