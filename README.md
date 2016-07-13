# Yii2 module for generate robots.txt file by url rules
## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

### Install

Either run

```
$ php composer.phar require execut/yii2-robots-txt "dev-master"
```

or add

```
"execut/yii2-robots-txt": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Configuration example
Add to application config folowing rules:
```php
[
    'components' => [
        'urlManager' => [
            'rules' => [
                ['pattern' => 'robots', 'route' => 'robotsTxt/web/index', 'suffix' => '.txt'],
            ]
        ]
    ],
    'modules' => [
        'robotsTxt' => [
            'class' => 'execut\robotsTxt\Module',
            'components'    => [
                'generator' => [
                    'class' => \execut\robotsTxt\Generator::class,
                    'host' => 'localhost',
                    'sitemap' => 'sitemap.xml',
                    //or generate link through the url rules
                    'sitemap' => [
                        'sitemapModule/sitemapController/sitemapAction',
                    ],
                    'userAgent' => [
                        '*' => [
                            'Disallow' => [
                                'noIndexedHtmlFile.html',
                                [
                                    'notIndexedModule/noIndexedController/noIndexedAction',
                                    'noIndexedActionParam' => 'noIndexedActionParamValue',
                                ]
                            ],
                            'Allow' => [
                                //..
                            ],
                        ],
                        'BingBot' => [
                            'Sitemap' => '/sitemapSpecialForBing.xml',
                            'Disallow' => [
                                //..
                            ],
                            'Allow' => [
                                //..
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
```

After configuration robots.txt file is opened by /robots.txt link

## License

**yii2-robots-txt** is released under the Apache License Version 2.0. See the bundled `LICENSE.md` for details.
