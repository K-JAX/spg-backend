const path = require('path');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const ExtractCssChunks = require("extract-css-chunks-webpack-plugin")
const MiniCssExtractPlugin = require('mini-css-extract-plugin');


module.exports = {
    entry:  {
        script: './src/script.js'
    },
    output: {
        filename: 'script.js',
    },
    module: {
        rules: [{
            test: /\.(sa|sc|c)ss$/,
            use: [
                {
                    loader: ExtractCssChunks.loader,
                    options: {
                        hot: true,
                        reloadAll: true,
                    },
                },
                'css-loader',
                'postcss-loader',
                'sass-loader',
            ]
        }]
    },
    devtool: 'inline-source-map',
    plugins: [
        new MiniCssExtractPlugin({
            // Options similar to the same options in webpackOptions.output
            // both options are optional
            filename: '../style.css',
            chunkFilename: '../style.css',
          }),
          new ExtractCssChunks(
              {
                // Options similar to the same options in webpackOptions.output
                // both options are optional
                filename: '../style.css',
                chunkFilename: '../style.css',
                orderWarning: true, // Disable to remove warnings about conflicting order between imports
              }
          ),
          new BrowserSyncPlugin({
              // browse to http://localhost:3000/ during development,
              // ./public directory is being served
              host: 'localhost',
              proxy: 'http://hmrtest.loc/',
              port: 3000,
              files: [
                  "**/*.php"
              ]
        })
    ],
}