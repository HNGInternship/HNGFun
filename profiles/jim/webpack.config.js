const path = require('path');

module.exports = {
  entry: "./src/index.js", // string | object | array

  output: {
    path: path.resolve(__dirname, "dist"), // string
    filename: "Jimie.js",
  },

  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      },
      {
        test: /\.css$/,
        use: ["style-loader", "css-loader"]
      }
    ]
  },
  plugins: []
};