Jonnitto.NodeTypes
==================

[![Latest Stable Version](https://poser.pugx.org/jonnitto/nodetypes/v/stable)](https://packagist.org/packages/jonnitto/nodetypes)
[![Total Downloads](https://poser.pugx.org/jonnitto/nodetypes/downloads)](https://packagist.org/packages/jonnitto/nodetypes)
[![License](https://poser.pugx.org/jonnitto/nodetypes/license)](https://packagist.org/packages/jonnitto/nodetypes)

Some NodeTypes for the greatest Content System on earth: [Neos](https://www.neos.io). The Elements only get rendered of there is any content.

Important
=========
I split this package up in several other packages:

* [Jonnitto.Headline](https://github.com/jonnitto/Jonnitto.Headline)
* [Jonnitto.Text](https://github.com/jonnitto/Jonnitto.Text)
* [Jonnitto.AssetList](https://github.com/jonnitto/Jonnitto.AssetList)
* [Jonnitto.MultiColumn](https://github.com/jonnitto/Jonnitto.MultiColumn)
* [Jonnitto.Image](https://github.com/jonnitto/Jonnitto.Image) and/or * [Jonnitto.Picture](https://github.com/jonnitto/Jonnitto.Picture)
* [Jonnitto.TextWithPicture](https://github.com/jonnitto/Jonnitto.TextWithPicture)
* [Jonnitto.ImagesInARow](https://github.com/jonnitto/Jonnitto.ImagesInARow)

I recomend to use these, because in the newest version is this package only a link to these new packages.

Installation
------------
Most of the time you have to make small adjustments to a package (e.g. configuration in Settings.yaml). Because of that, it is important to add the corresponding package to the composer from your theme package. Mostly this is the site packages located under Packages/Sites/. To install it correctly go to your theme package (e.g.Packages/Sites/Foo.Bar) and run following command:

```
composer require jonnitto/nodetypes --no-update
```

The --no-update command prevent the automatic update of the dependencies. After the package was added to your theme composer.json, go back to the root of the Neos installation and run composer update. Et voilà! Your desired package is now installed correctly.


Credits
-------

Credits go out to [dotpulse](http://dotpulse.ch) and [Dmitri Pisarev](https://github.com/dimaip). Thank you for all the inspiration and investment.


License
-------

Licensed under MIT, see [LICENSE](LICENSE)
