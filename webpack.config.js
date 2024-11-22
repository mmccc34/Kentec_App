const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

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
        test: /\.(png|jpe?g|gif|svg)$/, // Gestion des fichiers images
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].[hash].[ext]',
              outputPath: 'images/',
            },
          },
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'app.css', // Fichier CSS généré
    }),
  ],
  mode: 'development',
};
