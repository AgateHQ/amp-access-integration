const path = require('path');
const CopyPlugin = require('copy-webpack-plugin');

 
module.exports = {
  mode: 'development',
  entry: [
    path.resolve(__dirname, "../src/css/style.css")

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
    contentBase: '../build'
  },
  plugins: [
    new CopyPlugin([
      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'index.html' },
      { from: path.resolve(__dirname, '../src/img'), to: 'img' },
    ]),
  ]
}