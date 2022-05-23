## Overview

[![Build Status](https://api.travis-ci.com/silverstripe/silverstripe-installer.svg?branch=4)](https://travis-ci.com/silverstripe/silverstripe-installer)

Base project folder for a SilverStripe ([http://silverstripe.org](http://silverstripe.org)) installation. Required modules are installed via [http://github.com/silverstripe/recipe-cms](http://github.com/silverstripe/recipe-cms). For information on how to change the dependencies in a recipe, please have a look at [https://github.com/silverstripe/recipe-plugin](https://github.com/silverstripe/recipe-plugin). In addition, installer includes [theme/simple](https://github.com/silverstripe-themes/silverstripe-simple) as a default theme.

## Installation ##

`composer create-project silverstripe/installer my-app`

See [Getting Started](https://docs.silverstripe.org/en/4/getting_started/) for more information.

## Bugtracker ##

Bugs are tracked on github.com ([framework issues](https://github.com/silverstripe/silverstripe-framework/issues),
[cms issues](https://github.com/silverstripe/silverstripe-cms/issues)).
Please read our [issue reporting guidelines](https://docs.silverstripe.org/en/4/contributing/issues_and_bugs/).

## Development and Contribution ##

If you would like to make changes to the SilverStripe core codebase, we have an extensive [guide to contributing code](https://docs.silverstripe.org/en/4/contributing/code/).

## Links ##

 * [Changelogs](https://docs.silverstripe.org/en/4/changelogs/)
 * [Bugtracker: Framework](https://github.com/silverstripe/silverstripe-framework/issues)
 * [Bugtracker: CMS](https://github.com/silverstripe/silverstripe-cms/issues)
 * [Bugtracker: Installer](https://github.com/silverstripe/silverstripe-installer/issues)
 * [Forums](http://silverstripe.org/forums)
 * [Developer Mailinglist](https://groups.google.com/forum/#!forum/silverstripe-dev)
 * [License](./LICENSE)


## local setup

PHP 7.2
Composer 2

## 
Setup with React
- npm init
- install webpack and webpack-cli
- to use the latest JS features we need the babel packages `npm i --save-dev babel-loader @babel/polyfill @babel/core`

After the react dir is created with a demo indix.jsx entry point file, we create the webpack.config
```
const path = require('path'),
webpack = require('webpack')

module.exports = {
  entry: [
    '@babel/polyfill',
    path.resolve(__dirname, 'public/react/index.jsx')
  ],
  output: {
    filename: 'javascript/bundle.js',
    path: path.resolve(__dirname, 'public/react')
  },
  mode: 'development',
  module: {
    rules: [
      {
        test: /\.jsx$/,
        use: {
          loader: 'babel-loader'
        }
      }
    ]
  }
}
```

We can then add the scripts to run webpack in our package.json
```
  "scripts": {
    "build": "webpack",
    "watch": "webpack --watch"
  },
```

Next we need to install the deps to get React working:
`npm i --save-dev react react-dom @babel/preset-env @babel/preset-react`

Next we want to add a .babelrc with both of these presets included
```
{
  "presets" : ["@babel/preset-env", "@babel/preset-react"]
}
```

By including `devtool: sourcemaps,` to the webpack config, we can view the source of our code and view the uncompiled code with `cntrl p` and then searching for the component we are looking for.