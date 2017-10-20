Jonnitto.NodeTypes
==================

[![Latest Stable Version](https://poser.pugx.org/jonnitto/nodetypes/v/stable)](https://packagist.org/packages/jonnitto/nodetypes)
[![Total Downloads](https://poser.pugx.org/jonnitto/nodetypes/downloads)](https://packagist.org/packages/jonnitto/nodetypes)
[![License](https://poser.pugx.org/jonnitto/nodetypes/license)](https://packagist.org/packages/jonnitto/nodetypes)

Some NodeTypes for the greatest Content System on earth: [Neos](https://www.neos.io). The Elements only get rendered of there is any content.  
Work in progress.

Installation
------------
Most of the time you have to make small adjustments to a package (e.g. configuration in Settings.yaml). Because of that, it is important to add the corresponding package to the composer from your theme package. Mostly this is the site packages located under Packages/Sites/. To install it correctly go to your theme package (e.g.Packages/Sites/Foo.Bar) and run following command:

```
composer require jonnitto/nodetypes --no-update
```

The --no-update command prevent the automatic update of the dependencies. After the package was added to your theme composer.json, go back to the root of the Neos installation and run composer update. Et voilà! Your desired package is now installed correctly.



Replacement for Neos.NodeTypes
------------------------------
* Headline
	* Without Aloha, you can choose markup, style, alignment a link in the inspector. The headline tag is the outer element. In that way, all the css stylings get easier.
* Image
* Text


Atoms
-----
* Button
* Headline
* Text


Molecules
---------
* Notification
* Image


Credits
-------

Credits go out to [dotpulse](http://dotpulse.ch) and [Dmitri Pisarev](https://github.com/dimaip). Thank you for all the inspiration and investment.


License
-------

Licensed under MIT, see [LICENSE](LICENSE)
