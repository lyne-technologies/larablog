# Larablog | Blog Package for Laravel


Blogs are great for keeping customers updated and informed, but they can get "samey" to build. This package gives to a massive head start in building your blog. It includes all basic admin and front end routes and views, categories and a fancy customisable WYSIWYG editor from TinyMCE.

## Installation

You can install the package via composer:

```bash
composer require lynetechnologies/larablog
```

Publish and run the migrations with:

```bash
php artisan vendor:publish --provider="LyneTechnologies\Larablog\LarablogServiceProvider" --tag="larablog-migrations"
php artisan migrate
```

Publish the js with:

```bash
php artisan vendor:publish --provider="LyneTechnologies\Larablog\LarablogServiceProvider" --tag="larablog-assets"
```

You can publish the config file with the below. This gives you access to edit the default routes etc.
```bash
php artisan vendor:publish --provider="LyneTechnologies\Larablog\LarablogServiceProvider" --tag="larablog-config"
```

###After installing

First you'll need to review the routes that are set in the Larablog config file, make sure the middleware and admin routes are correct.

This package is pretty self-explanatory, and comes with some very basic views that will get you started.

## Editor

The WYSIWYG editor is from TinyMCE (https://www.tiny.cloud/) who have extensive documentation on how to customise your editor. TinyMCE is totally free, but have paid for plans. 

Currently this ships with a number of plugins and features already added to the toolbar, to add, remove or change the order of your editor toolbar, head over to `editor.js`. 

We have no association with Tiny.

###Frequently added features
Here are some of the most added editor features. 

####Font settings
Add the ability to change font family and font size.

```js
//editor.js

toolbar: '... fontselect fontsizeselect',
```

####Code blocks
Add blocks of code with code highlighting

```js
//editor.js

plugins: [
    '... codesample'
],
toolbar: '... codesample',
```

To add highlighting, download ``prism.js`` and ``prism.css`` [here from the prismjs website](https://prismjs.com/download.html#themes=prism&languages=markup+css+clike+javascript). Then add the following to the blog single page:

```html
<link rel="stylesheet" type="text/css" href="prism.css">
<script src="prism.js"></script>
```

####Dark mode

```js
//editor.js

skin: 'oxide-dark',
```



## Testing
TODO 👷

[comment]: <> (```bash)

[comment]: <> (composer test)

[comment]: <> (```)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Thank you for considering contributing to Larablog, please bear in mind the idea of this package is to be the foundation of a blog feature.
Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

For security vulnerabilities please email luke.shell@lynetechnologies.com.

## Credits

- [Luke Shell](https://github.com/LukeShell)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.