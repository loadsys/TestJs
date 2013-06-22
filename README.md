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

## Configure

To configure the plugin, write options with `Configure::write()`.

The valid framework options are:

- qunit - Use the qunit testing framework
- jasmine - Use the jasmine spec framework
- mocha - Use the mocha test/spec framework (also set chai for assertions)

The valid chai options are:

- assert - Use the assert assertion style (boolean)
- expect - Use the expect assertion style (boolean)
- should - Use the should assertion style (boolean)

``` php
Configure::write('TestJs', array(
  'qunit' => false,
  'jasmine' => false,
  'mocha' => true,
  'chai' => 'expect'
));
```
