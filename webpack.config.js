const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

module.exports = {
  entry: {
    app: './resources/scripts/main.js',
    main: './resources/styles/main.scss',
    article: './resources/styles/article.scss',
    editor: './resources/styles/style-editor.scss',
    
  },
  output: {
    filename: 'scripts/[name].js',
    path: path.resolve(__dirname, 'public'),
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
          },
        },
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader, // Extract CSS to separate files
          'css-loader', // Translates CSS into CommonJS
          'sass-loader', // Compiles Sass to CSS
        ],
      },
      {
        test: /\.(png|jpg|gif|svg|woff|woff2|eot|ttf)$/,
        type: 'asset/resource',
        generator: {
          filename: 'images/[name][ext]', // Specify where images/fonts are output
        },
      },
      {
        test: /\.(woff|woff2|eot|ttf)$/,
        type: 'asset/resource',
        generator: {
          filename: 'fonts/[name][ext]', // Specify where images/fonts are output
        },
      },
    ],
  },
  plugins: [
    new CleanWebpackPlugin(), // Cleans the output directory before each build

    new CopyWebpackPlugin({
      patterns: [
        {
          from: 'resources/images',
          to: 'images',
          noErrorOnMissing: true,
        },
        {
          from: 'resources/fonts',
          to: 'fonts',
          noErrorOnMissing: true,
        },
      ],
    }),

    new MiniCssExtractPlugin({
      filename: 'styles/[name].css', // Compiled CSS output files
    }),
    new ImageMinimizerPlugin({
      minimizer: {
        implementation: ImageMinimizerPlugin.imageminMinify,
        options: {
          plugins: [
            ['gifsicle', { interlaced: true }],
            ['jpegtran', { progressive: true }],
            ['optipng', { optimizationLevel: 5 }],
            [
              'svgo',
              {
                name: 'preset-default',
                params: {
                  overrides: {
                    removeViewBox: false, // Keep the viewBox attribute
                  },
                },
              },
            ],
          ],
        },
      },
    }),

    new BrowserSyncPlugin({
      proxy: 'http://localhost:8881/', // Replace with your local development URL
      files: [
        'public/scripts/*.js',
        'public/styles/*.css',
        'resources/scripts/*.js',
        'resources/**/*.js',
        'resources/styles/*.scss',
        'resources/**/*.scss',
        '**/*.php', // Watch for changes in PHP files
      ],
      open: true,
      reloadOnRestart: true,
    }),
  ],
  optimization: {
    minimizer: [
      new TerserPlugin({
        extractComments: false,
      }),
      new CssMinimizerPlugin(), // Minimizes the output CSS
    ],
    splitChunks: {
      chunks: 'all',
      minSize: 20000,
      maxSize: 70000,
    },
  },
  performance: {
    hints: false,
  },
  devtool: 'source-map', // Generate source maps for debugging
  mode: 'production', // Set mode to production
};
