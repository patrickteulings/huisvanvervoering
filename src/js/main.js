import "../styles/style.scss";

import ElementToggle from "./utilities/toggle/elementToggle.js";
import LatestPosts from "./utilities/latestposts.js";
import SocialShare from "./utilities/share/SocialShare";

const rellax = new Rellax(".rellax");
const toggles = document.querySelectorAll('[data-module="toggle"]');
const shares = document.querySelectorAll('[data-module="share"]');

for (let toggle of toggles) {
  toggle = new ElementToggle(toggle);
}

for (let shareItem of shares) {
  shareItem = new SocialShare(shareItem);
}

const posts = document.querySelector(".hvv.latest-posts");
console.log(posts);
const Latest = new LatestPosts(posts);

console.log("I AM MAIN.JS BITCH");
