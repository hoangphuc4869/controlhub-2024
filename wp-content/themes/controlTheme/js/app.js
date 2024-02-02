var swiper = new Swiper(".mySwiper", {
  centeredSlides: true,
  autoplay: {
    delay: 15000,
    disableOnInteraction: false,
  },
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
});

var swiper = new Swiper(".productsSwiper", {
  slidesPerView: 4,
  spaceBetween: 20,
  pagination: {
    el: ".swiper-pagination-products",
    clickable: true,
  },
  breakpoints: {
    300: {
      slidesPerView: 1,
    },
    500: {
      slidesPerView: 2,
    },
    800: {
      slidesPerView: 3,
    },
    1020: {
      slidesPerView: 4,
    },
  },
});

var swiper = new Swiper(".topSellers", {
  slidesPerView: 4,
  spaceBetween: 20,
  pagination: {
    el: ".swiper-pagination-products-top",
    clickable: true,
  },
  breakpoints: {
    300: {
      slidesPerView: 1,
    },
    500: {
      slidesPerView: 2,
    },
    800: {
      slidesPerView: 3,
    },
    1020: {
      slidesPerView: 4,
    },
  },
});

var swiper = new Swiper(".cateSwiper", {
  slidesPerView: 4,
  spaceBetween: 15,
  grid: {
    rows: 2,
    fill: "row",
  },

  pagination: {
    el: ".swiper-pagination-cate",
    clickable: true,
  },
  breakpoints: {
    300: {
      slidesPerView: 3,
      grid: {
        rows: 2,
        fill: "row",
      },
    },
    600: {
      slidesPerView: 3,
      grid: {
        rows: 2,
        fill: "row",
      },
    },
    800: {
      slidesPerView: 4,
      grid: {
        rows: 2,
        fill: "row",
      },
    },
  },
});

var swiper = new Swiper(".newProductsSwiper", {
  slidesPerView: 2,
  spaceBetween: 15,
  grid: {
    rows: 2,
    fill: "row",
  },
  pagination: {
    el: ".swiper-pagination-products",
    clickable: true,
  },
  breakpoints: {
    300: {
      slidesPerView: 1,
      grid: {
        rows: 1,
        fill: "row",
      },
    },
    500: {
      slidesPerView: 2,
      grid: {
        rows: 2,
        fill: "row",
      },
    },
    // 800: {
    //   slidesPerView: 2,
    // },
  },
});

var swiper = new Swiper(".swiperFlashDeals", {
  slidesPerView: 4,
  grid: {
    rows: 2,
    fill: "row",
  },
  breakpoints: {
    300: {
      slidesPerView: 1,
      grid: {
        rows: 1,
        fill: "row",
      },
    },
    500: {
      slidesPerView: 2,
      grid: {
        rows: 2,
        fill: "row",
      },
    },
    800: {
      slidesPerView: 3,
      grid: {
        rows: 2,
        fill: "row",
      },
    },
    1020: {
      slidesPerView: 4,
      grid: {
        rows: 2,
        fill: "row",
      },
    },
  },
  spaceBetween: 15,
  pagination: {
    el: ".swiper-pagination-deals",
    clickable: true,
  },
});

const angleDowns = document.querySelectorAll(".m-sidebar i");

const list = document.querySelectorAll(".m-sidebar ul");

var isArrowDown = new Array(angleDowns.length).fill(true);

if (angleDowns) {
  angleDowns.forEach((angle, index) => {
    angle.addEventListener("click", () => {
      list[index].classList.toggle("hide-side");
      if (isArrowDown[index]) {
        angle.classList.remove("fa-angle-up");
        angle.classList.add("fa-angle-down");
      } else {
        angle.classList.remove("fa-angle-down");
        angle.classList.add("fa-angle-up");
      }
      isArrowDown[index] = !isArrowDown[index];
    });
  });
}
