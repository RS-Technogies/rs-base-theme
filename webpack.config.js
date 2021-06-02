const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = {
    entry: './assets/js/index.js',
    output: {
        filename: 'main.js',
        path: path.resolve(__dirname, 'assets/dist/')
    },
    optimization:{
        splitChunks: {
            cacheGroups: {
                styles: {
                    name: 'styles',
                    test: /\.css$/,
                    chunks: 'all',
                    enforce: true
                }
            }
        }
    },
    module: {
        rules: [{
            test: /\.scss$/,
            include: [
                path.resolve(__dirname, 'node_modules'),
                path.resolve(__dirname, 'assets/scss')
            ],
            use: [
                MiniCssExtractPlugin.loader,
                {
                    loader: "css-loader",
                    options: {
                        url: false
                    }
                },
                {
                    loader: "postcss-loader"
                }, {
                    loader: 'sass-loader'
                }
            ],

        }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "style.min.css",
        }),
        new CssMinimizerPlugin({
            minimizerOptions: {
                preset: [
                    'default',
                    {
                        discardComments: { removeAll: true },
                    },
                ],
            },
        })
    ]
};