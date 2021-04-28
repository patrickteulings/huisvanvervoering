import { breakpoints } from "./../../config/breakpoints";

export default class Gallery {
  // Constructor always gets called, pass initial params here
  constructor(_elem) {
    this.elem = _elem;
    this.firstListItem = this.elem.getElementsByTagName("li")[0];
    this.blockTitle = this.elem.querySelector(".block-title");
    this.images = [];
    this.initialize();
  }

  initialize() {
    this.getImages();
    // this.onResize();
    // this.addEvents();
  }

  onResize() {
    this.firstListItem.style.marginLeft = 0;
    let marginLeft = (window.innerWidth - 900) / 2;

    if (window.innerWidth >= breakpoints.tabletWide) {
      this.firstListItem.style.marginLeft = `${
        (window.innerWidth - 900) / 2
      }px`;
    }

    if (window.innerWidth >= breakpoints.desktop) {
      marginLeft = (window.innerWidth - 1058) / 2;
    }

    marginLeft = marginLeft <= 32 ? 32 : marginLeft;
    this.firstListItem.style.marginLeft = `${marginLeft}px`;
    this.blockTitle.style.marginLeft = `${marginLeft}px`;
  }

  getImages() {
    const arr = this.elem.querySelectorAll(".blocks-gallery-item");

    console.log(arr, "arr");
  }

  addEvents() {
    window.addEventListener("resize", () => this.onResize());
  }
}
