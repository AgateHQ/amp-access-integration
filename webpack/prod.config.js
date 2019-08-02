const path = require('path');
const S3Uploader = require('webpack-s3-uploader');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
 
 
module.exports = {
  mode: 'production',
  entry: [
    path.resolve(__dirname, '../src/assets/css/axate.css'),
    path.resolve(__dirname, '../src/assets/css/main.css'),
  ],
  output: {
    path: path.resolve(__dirname, '../build/'), 

  },
  optimization: {
    minimizer: [new OptimizeCSSAssetsPlugin({})],
  },
  module: {
    rules: [
      {
        test: /\.css$/,
       use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {},
          },
          'css-loader',
        ],
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      // Options similar to the same options in webpackOptions.output
      // both options are optional
      filename: 'axate.css',
    }),
    new CopyPlugin([
      { from: path.resolve(__dirname, '../src/example/index.html'), to: 'index.html' },
      { from: path.resolve(__dirname, '../src/assets/images'), to: 'images' },
      { from: path.resolve(__dirname, '../src/assets/css'), to: 'css' },
    ]),
    new S3Uploader({
      s3Options: {
        accessKeyId: process.env.AWS_KEY_ID,
        secretAccessKey: process.env.AWS_KEY_SECRET,
      },
      s3UploadOptions: {
        Bucket: 'axate-amp'
      },
    })
  ]
}