# TestJs Plugin

A plugin to quickly setup browser based javascript unit testing.

## Installation

Run the following shell command to install the default `test.ctp` view.

``` bash
Console/cake TestJs.testjs_install
```

## Usage

To use the plugin, load the plugin and be sure to enable the routes.

``` php
CakePlugin::load('TestJs', array('routes' => true));
```

To view the test page to `/testjs` in the browser (use `/app_name/testjs` if your app is in a sub directory). This url is only available when the app is not in debug = 0.
