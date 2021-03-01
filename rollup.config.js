import scss from "rollup-plugin-scss";

export default {
  input: "./src/js/main.js",
  output: {
    file: "./build/js/main.min.js",
    format: "esm",
  },
  plugins: [
    scss({
      output: "./build/css/style.css",
      failOnError: true,
      watch: './src/styles',
    }),
  ],
  watch: true
};