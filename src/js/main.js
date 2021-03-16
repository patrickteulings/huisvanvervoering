import "../styles/style.scss";

import ElementToggle from "./utilities/toggle/elementToggle.js";
import LatestPosts from "./utilities/latestposts.js";
const rellax = new Rellax(".rellax");
const toggles = document.querySelectorAll('[data-module="toggle"]');

console.log("rellax", rellax);

for (let toggle of toggles) {
  toggle = new ElementToggle(toggle);
}

const posts = document.querySelector(".hvv.latest-posts");
console.log(posts);
const Latest = new LatestPosts(posts);

console.log("I AM MAIN.JS BITCH");
