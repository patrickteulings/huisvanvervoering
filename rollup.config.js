import scss from "rollup-plugin-scss";
import { nodeResolve } from "@rollup/plugin-node-resolve";

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
      watch: "./src/styles",
    }),
    nodeResolve(),
  ],
  watch: true,
};
