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
  devtool: 'source-map',
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