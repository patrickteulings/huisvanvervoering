import '../styles/style.scss';

import ElementToggle from './utilities/toggle/elementToggle.js';
import LatestPosts from './utilities/latestposts.js';
import SocialShare from './utilities/share/SocialShare';
import Gallery from './components/gallery/gallery';

const rellax = new Rellax('.rellax');
const toggles = document.querySelectorAll('[data-module="toggle"]');
const shares = document.querySelectorAll('[data-module="share"]');
const posts = document.querySelectorAll('.hvv.latest-posts');
const galleries = document.querySelectorAll('.hvv.gallery');

for (let toggle of toggles) {
  toggle = new ElementToggle(toggle);
}

for (let shareItem of shares) {
  shareItem = new SocialShare(shareItem);
}

for (let post of posts) {
  post = new LatestPosts(post);
}

for (let gallery of galleries) {
  gallery = new Gallery(gallery);
}

console.log('DESIGN AND DEVELOPMENT BY PATRICKTEULINGS.NL');
