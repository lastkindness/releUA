'use strict';

const path = require('path');
const { VueLoaderPlugin } = require('vue-loader');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');

module.exports = {
    mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
    entry: {
        app: './assets/src/js/script.js',
        blocks: './blocks/entry.js'
    },
    output: {
        path: path.resolve(__dirname, 'assets/dist'),
        filename: '[name].min.js'
    },
    optimization: {
        minimize: true,
        minimizer: [
            new TerserPlugin({
                terserOptions: {
                    format: {
                        comments: false
                    },
                },
                extractComments: false
            })
        ]
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader'
                ]
            },
            {
                test: /\.vue$/,
                exclude: /node_modules/,
                use: {
                    loader: 'vue-loader'
                }
            },
            {
                test: /\.(woff(2)?|ttf|eot|svg|otf|jpg|png|jpeg)$/,
                type: 'asset/resource',
                generator: {
                    filename: '[contenthash][ext]'
                }
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].min.css'
        }),
        new VueLoaderPlugin(),
        new BrowserSyncPlugin({
            host: 'localhost',
            port: 9999,
            proxy: 'http://crispwp.loc/',
            files: [
                '**/*.php',
                'assets/dist/*.js',
                'assets/dist/*.css'
            ],
            reloadDelay: 500
        })
    ],
    stats: {
        colors: true,
        children: false
    },
    externals: {
        jquery: 'jQuery'
    },
    devtool: 'source-map'
};
