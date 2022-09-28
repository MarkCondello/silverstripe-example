# Environment requirements
- PHP 7.2
- Composer 2

# Setup with Vite

*Configurations:*
You can modify the default config in `mysite.yml`:

```
ViteHelper\Vite\ViteHelper:
  forceProductionMode: false
  devHostNeedle: '.test'
  devPort: 3000
  jsSrcDirectory: 'public_src/'
  mainJS: 'main.js'
  manifestDir: '/public/manifest.json'
```

*ViteHelper Config setting options:*
- If you set `forceProductionMode` to true, the build files (created after running `vite build`) will be served.
- Set the `devHostNeedle` to distinguish your live site from your local environment, e.g `localhost:8080`, `mysite.test` or `127.0.0.1`. 
  - **Note:** The vite dev server must also be running. 
- Set the `devPort` to the port of the vite dev server, e.g. `3000` – the vite port will be shown in the terminal when running the dev server. To set a fixed port (recommended), remember to also set it in the [vite config](https://github.com/brandcom/silverstripe-vite/wiki/example-vite-config) - under `server`. The port in both configs must always match. 
- Define the `mainJS` entry point to where your applications script file is located.
  - E.g., if you use TypeScript, change the `mainJs` prop to `"main.ts"`.
- Define the `manifestDir` for where the manifest file will be located.

## Usage

Insert JS / CSS tags in your main template, e.g., `Page.ss`:

```
<head>
    ...
    $Vite.HeaderTags.RAW
</head>
<body>
    ...
    $Vite.BodyTags.RAW
</body>
```


## Vite config
The config must match the `vite.config.js`. You need to **?flush** after making changes to yml configs.

Take a look at the [ViteHelper.php](https://github.com/passchn/silverstripe-vite/blob/master/src/Vite/ViteHelper.php) for more Information. 

The config from your vite.config.js or vite.config.ts must match your ViteHelper config for this plugin.

See this [example vite.config.ts](https://github.com/brandcom/silverstripe-vite/wiki/example-vite-config) for default configuration. 

**Note:** When using vite below `2.9.0`, the server config will be different. [See this config](https://github.com/brandcom/silverstripe-vite/wiki/example-vite-config#vite-below-290).

# Webpack Setup with React
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