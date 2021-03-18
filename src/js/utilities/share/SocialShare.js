/**
 * Use this to share a page on social media, with custom text / urls
 * @todo add LinkedIn
 */

/**
 * Example DOM
 *
 *  <a data-module="socialshare" data-config='{"type":"facebook","customurl":"http://www.prettyurl.com"}'></a>
 */

export default class SocialShare {
  constructor(_elem) {
    this.elem = _elem;
    this.isOpen = false;
    this.config = JSON.parse(_elem.dataset.config);
    this.trigger = _elem;
    this.url = window.location.href;
    this.type = "facebook";
    this.initialize();
  }

  addEvents() {
    this.trigger.addEventListener("click", (e) => {
      e.preventDefault();
      this.shareElement(e);
    });
  }

  shareElement() {
    let shareURL = "";

    if (this.type === "mailto") {
      window.location = `mailto:?body=` + this.url;
      return false;
    }

    if (this.type === "copy") {
      this.copyToClipBoard();
      return false;
    }

    if (this.type === "twitter") {
      shareURL = "http://twitter.com/share?url=";
    }
    if (this.type === "facebook") {
      shareURL = "https://www.facebook.com/sharer/sharer.php?u=";
    }
    if (this.type === "google-plus") {
      shareURL = "https://plus.google.com/share?url=";
    }
    if (this.type === "whatsapp") {
      shareURL = "https//api.whatsapp.com/send?text=";
    }
    if (this.type === "linkedin") {
      shareURL = "https://www.linkedin.com/sharing/share-offsite/?url=";
    }

    window.open(
      shareURL + this.url,
      this.type.charAt(0).toUpperCase(),
      "height=450, width=550, top=" +
        (window.innerHeight / 2 - 225) +
        ", left=" +
        window.innerWidth / 2 +
        ", toolbar=0, location=0, menubar=0, directories=0, scrollbars=0"
    );
  }

  copyToClipBoard() {
    var share_url = document.querySelector(".socials__url");
    var selection = window.getSelection();
    var range = document.createRange();
    share_url.innerHTML = this.url;
    range.selectNodeContents(document.querySelector(".socials__url"));
    selection.removeAllRanges();
    selection.addRange(range);
    document.execCommand("copy");
    selection.removeAllRanges();

    // Show alert
    var alertElem = document.querySelector(".socials__url--alert");
    alertElem.classList.add("is-visible");

    setTimeout(function () {
      alertElem.classList.remove("is-visible");
    }, 3000);
  }

  initialize() {
    console.log(this.config);
    this.type = this.config.type !== undefined ? this.config.type : this.type;
    this.url =
      this.config.customurl !== undefined ? this.config.customurl : this.url;
    this.addEvents();
  }
}
