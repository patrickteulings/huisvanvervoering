import SwiperCore, { Navigation } from 'swiper/core';
import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';

SwiperCore.use([Navigation]);

export default class Gallery {
  // Constructor always gets called, pass initial params here
  constructor(_elem) {
    this.elem = _elem;
    this.elementsArray = this.elem.querySelectorAll('.blocks-gallery-item');
    this.imageObjects = [];
    this.galleryIsOpen = false;
    this.swiper = '';
    this.initialize();
  }

  initialize() {
    this.getImages();
    this.addEvents();
  }

  // An initializer to create a nice array of objects
  getImages() {
    this.elementsArray.forEach((item, index) => {
      const img = item.getElementsByTagName('img')[0];
      const imageObj = {
        trigger: item,
        imageURL: img.dataset.fullUrl,
      };

      this.imageObjects.push(imageObj);
    });

    for (const [index, item] of this.imageObjects.entries()) {
      if (index >= 7) {
        item.trigger.style.display = 'none';
      }
      if (index === 6) {
        const container = document.createElement('div');
        container.className = `thumb-residual-images`;
        container.innerHTML = `<span class="thumb-residual-images__inner"><span class="thumb-plus-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></span><span class="thumb-number">${
          this.imageObjects.length - 6
        }</span><span class="thumb-text"> Afbeeldingen</span></span>`;
        item.trigger.appendChild(container);
      }
    }
  }

  // Navigation entry-point
  jumpToImage(item, index) {
    if (!document.getElementById('galleryContainer')) {
      this.createGallery(index);
    } else {
      const container = document.getElementById('galleryContainer');
      container.removeAttribute('hidden');
      this.swiper.slideTo(index);

      document.body.classList.add('body-is-locked');
    }
  }

  // Create gallery HTML
  createGallery(index = 0) {
    const container = document.createElement('div');
    container.id = 'galleryContainer';
    container.className = `swiper-container gallery-container`;

    const closeButton = document.createElement('div');
    closeButton.className = 'swiper-button-close';
    closeButton.innerHTML =
      '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>';

    const next = document.createElement('div');
    next.className = 'swiper-button-next';

    const prev = document.createElement('div');
    prev.className = 'swiper-button-prev';

    const imagesWrapper = document.createElement('div');
    imagesWrapper.className = 'swiper-wrapper';

    container.appendChild(next);
    container.appendChild(prev);
    container.appendChild(closeButton);
    container.appendChild(imagesWrapper);

    document.body.appendChild(container);

    // Add Images WITHOUT actually loading them!!!!
    this.imageObjects.forEach((item) => {
      const wrapper = document.createElement('div');
      const image = document.createElement('img');

      wrapper.className = 'swiper-slide';
      wrapper.dataset.url = item.imageURL;
      wrapper.style.width = window.innerWidth + 'px';

      image.className = 'image';
      image.src = item.imageURL;

      imagesWrapper.appendChild(wrapper);
      wrapper.appendChild(image);
    });

    this.swiper = new Swiper('.swiper-container', {
      // Optional parameters
      loop: false,
      initialSlide: index,

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    document.body.classList.add('body-is-locked');

    document.addEventListener('keydown', (e) => {
      if (e.code === 'Escape') {
        this.closeGallery();
      }
    });

    closeButton.onclick = (e) => {
      this.closeGallery();
    };
  }

  // Close and remove listeners if needed
  closeGallery() {
    const container = document.getElementById('galleryContainer');
    container.setAttribute('hidden', 'true');
    this.galleryIsOpen = false;
    document.body.classList.remove('body-is-locked');
  }

  // Click events etc
  addEvents() {
    // Open gallery on Image Click
    this.imageObjects.forEach((item, index) => {
      item.trigger.onclick = (e) => {
        this.jumpToImage(item, index);
      };
    });
  }
}
