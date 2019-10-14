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

      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'page-1.html' },
      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'page-2.html' },
      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'page-3.html' },
      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'page-4.html' },
      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'page-5.html' },
      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'page-6.html' },
      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'page-7.html' },
      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'page-8.html' },

      { from: path.resolve(__dirname, '../src/assets/css'), to: 'css' },
      { from: path.resolve(__dirname, '../src/assets/images'), to: 'images' }, 
    ]),
  ]
}