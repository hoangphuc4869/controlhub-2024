// menu pc

var iconArrow = document.querySelectorAll("ul.menu-pc > li.menu-item-242 > a");

iconArrow.forEach(function (element) {
  element.classList.add("icon-arrow");
});

var subProduct = document.querySelectorAll(
  "ul.menu-pc > li.menu-item-242 > ul"
);

subProduct.forEach(function (element) {
  element.id = "sub-product";
});

// menu mobile

// thanh tìm kiếm

$(".btn-search").on("click", function () {
  var inputText = $(".search-mobile");
  if (inputText.css("display") == "none") {
    $(".search-mobile").show(300);
  } else {
    $(".search-mobile").hide(300);
  }
});

// sub menu

var subProductMobile = document.querySelectorAll(
  "ul.menu-mobile > li.menu-item-242 > ul"
);

subProductMobile.forEach(function (element) {
  element.id = "sub-product-mobile";
});

var iconBar = document.getElementsByClassName("icon-bar")[0];

var modalMenu = document.getElementsByClassName("modal-menu")[0];
var menuMobile = document.getElementsByClassName("menu-mobile")[0];

iconBar.onclick = function () {
  modalMenu.classList.toggle("action-menu");
};

modalMenu.onclick = function () {
  modalMenu.classList.remove("action-menu");
};

menuMobile.addEventListener("click", function (event) {
  event.stopPropagation();
});

// ----------------------

$(".menu-item-242").on("click", function () {
  $("#sub-product-mobile").slideToggle();
});

// slider Featured Products

$(".carousel_1").owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  navText: [
    "<div class='btn-prev'><i class='far fa-chevron-left'></i></div>",
    "<div class='btn-next'><i class='far fa-chevron-right'></i></div>",
  ],

  autoplay: true,
  // autoplayTimeout:5000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 4,
    },
  },
});

// slider Our product categories

$(".carousel_2").owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  navText: [
    "<div class='btn-prev'><i class='far fa-chevron-left'></i></div>",
    "<div class='btn-next'><i class='far fa-chevron-right'></i></div>",
  ],

  autoplay: true,
  // autoplayTimeout:5000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 4,
    },
  },
});
