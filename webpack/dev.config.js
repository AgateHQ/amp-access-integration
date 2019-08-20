const path = require('path');
const CopyPlugin = require('copy-webpack-plugin');

 
module.exports = {
  mode: 'development',
  entry: [
    path.resolve(__dirname, '../src/assets/css/axate.css'),
    path.resolve(__dirname, '../src/assets/css/main.css')
  ],
  output: {
    path: path.resolve(__dirname, '../build'), 
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
      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'debug-001.html' },
      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'debug-002.html' },
      { from: path.resolve(__dirname, '../src/assets/css'), to: 'css' },
      { from: path.resolve(__dirname, '../src/assets/images'), to: 'images' }, 
    ]),
  ]
}