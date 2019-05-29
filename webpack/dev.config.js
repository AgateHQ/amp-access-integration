const path = require('path');
const CopyPlugin = require('copy-webpack-plugin');

 
module.exports = {
  mode: 'development',
  entry: [
    path.resolve(__dirname, "../src/css/agate.css"),
    path.resolve(__dirname, "../src/css/main.css")

  ],
  output: {
    path: path.resolve(__dirname, "../build"), // string
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: ['style-loader', 'css-loader'],
      }
    ]
  },
  watch: true,
 
  devServer: {
    contentBase: '../build',
    port: 8000
  },
  plugins: [
    new CopyPlugin([
      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'index.html' },
      { from: path.resolve(__dirname, '../src/img'), to: 'img' },
    ]),
  ]
}