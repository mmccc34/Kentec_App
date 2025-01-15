const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

module.exports = {
  entry: './assets/js/main.js', // Point d'entrée
  output: {
    filename: 'app.bundle.js', // Fichier JS généré
    path: path.resolve(__dirname, 'public/build'), // Chemin de sortie
    publicPath: '/build/', // Chemin public
  },
  module: {
    rules: [
      {
        test: /\.js$/, // Babel pour JS moderne
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
          },
        },
      },
      {
        test: /\.scss$/, // Pour SCSS -> CSS
        use: [
          MiniCssExtractPlugin.loader, // Extrait le CSS dans un fichier
          'css-loader',                // Transforme le CSS en JS
          'sass-loader',               // Compile SCSS en CSS
        ],
      },
      {
        test: /\.(png|jpe?g|gif|svg|webp)$/i, // Types d'images pris en charge
        type: 'asset/resource', // Copie les fichiers dans le répertoire de sortie
        generator: {
          filename: 'images/[name].[hash][ext]', // Chemin et nom des fichiers générés
        },
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'app.css', // Fichier CSS généré
    }),
    // Plugin pour copier les images depuis le dossier 'src/assets/images' vers 'public/build/images'
    new CopyWebpackPlugin({
      patterns: [
        { from: 'assets/Images', to: 'images' }, // Copier les images
      ],
    }),
  ],
  mode: 'development',
};
