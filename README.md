# Blade Loader for Twig

[![Latest Version on Packagist](https://img.shields.io/packagist/v/enflow/twig-blade-loader.svg?style=flat-square)](https://packagist.org/packages/enflow/twig-blade-loader)
![GitHub Workflow Status](https://github.com/enflow/twig-blade-loader/workflows/run-tests/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/enflow/twig-blade-loader.svg?style=flat-square)](https://packagist.org/packages/enflow/twig-blade-loader)

The `enflow/twig-blade-loader` package provides the option to load Blade syntax into your Twig files. Mostly used for importing Blade Components from third-parties into your Twig-only application.

## Installation
You can install the package via composer:

``` bash
composer require enflow/twig-blade-loader
```

## Usage
The Twig extension will automatically register when `rcrowe/twigbridge` is used.
If you're using another configuration, you may wish to register the extension manually by loading the extension `Enflow\TwigBladeLoader\TwigBladeLoaderExtension`.

### Example

Take for instance, you have your Twig file, but you wish to include the https://medialibrary.pro/ library from Spatie. This only includes Blade Component syntax:
```<x-media-library-attachment name="avatar"/>```

You can use the `{% blade %}` syntax for this. 

```twig
{% blade %}<x-media-library-attachment :name="$fieldName"/>{% endblade %}
```

That's it! Your variables are automatically passed along from your global scope, and available to pass along.

## Variables
You may choose to pass along extra variables to your Blade logic:

```twig
{% blade with {fieldName: 'avatar'} %}
    <x-media-library-attachment :name="$fieldName"/>
{% endblade %}
```

## Caveat
There is one big caveat tho: Blade variables. As the syntax for rendering Blade variables is the same as Twig's, this conflicts.
You may use the 'verbatim' class to work around this:

```twig
{% blade with {'name': 'name-in-verbatim'} %}
{% verbatim %}
{{ $name }}
{% endverbatim %}
{% endblade %}
```

## Testing
``` bash
$ composer test
```

## Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security
If you discover any security related issues, please email michel@enflow.nl instead of using the issue tracker.

## Credits
- [Michel Bardelmeijer](https://github.com/mbardelmeijer)
- [All Contributors](../../contributors)

## About Enflow
Enflow is a digital creative agency based in Alphen aan den Rijn, Netherlands. We specialize in developing web applications, mobile applications and websites. You can find more info [on our website](https://enflow.nl/en).

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
