function typingAnimate() {
  document.addEventListener("DOMContentLoaded", function () {
    const placeholder = "Nhập từ khóa tìm kiếm của bạn...";
    const input = document.getElementById("search");
    let index = 0;

    function typePlaceholder() {
      if (index < placeholder.length) {
        input.setAttribute("placeholder", placeholder.substring(0, index + 1));
        index++;
        setTimeout(typePlaceholder, 100);
      } else {
        index = 0;
        setTimeout(typePlaceholder, 2000);
      }
    }

    typePlaceholder();
  });
}

typingAnimate();

function sliderShow() {
  const btnPre = document.getElementById("pre");
  const btnNext = document.getElementById("next");
  const slide = document.querySelector(".slide-container");
  const imgItem = document.querySelectorAll(".img-item");
  const dots = document.querySelectorAll(".dots-slide li");

  var index = 0;
  var lengthImg = imgItem.length - 1;
  btnNext.onclick = function () {
    if (index === lengthImg) {
      index = 0;
    } else {
      index++;
    }
    reloadSlider();
  };

  btnPre.onclick = function () {
    if (index === 0) {
      index = lengthImg;
    } else {
      index--;
    }
    reloadSlider();
  };

  let autoReload = setInterval(() => {
    btnNext.click();
  }, 4000);

  function reloadSlider() {
    let checkleft = imgItem[index].offsetLeft;
    slide.style.transform = `translateX(-${checkleft}px)`;

    let lastActiveDot = document.querySelector(".dots-slide li.active");
    lastActiveDot.classList.remove("active");
    dots[index].classList.add("active");
    clearInterval(autoReload);
    let autoReload = setInterval(() => {
      btnNext.click();
    }, 4000);
  }

  dots.forEach((li, key) => {
    li.addEventListener("click", function () {
      index = key;
      reloadSlider();
    });
  });
}
sliderShow();

function sliderItem() {
  const container = document.querySelector(".container-hot-cate");
  const widthItem = document.querySelector(".item-cate").offsetWidth + 60;

  document.getElementById("btn-hot-next").onclick = function () {
    if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
      container.scrollLeft = 0;
    } else {
      container.scrollLeft += widthItem;
    }
  };

  document.getElementById("btn-hot-prev").onclick = function () {
    if (container.scrollLeft <= 0) {
      container.scrollLeft = container.scrollWidth - container.offsetWidth;
    } else {
      container.scrollLeft -= widthItem;
    }
  };

  function autoScroll() {
    if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
      container.scrollLeft = 0;
    } else {
      container.scrollLeft += widthItem;
    }
  }

  let autoScrollInterval = setInterval(autoScroll, 3000);

  container.addEventListener("mouseover", function () {
    clearInterval(autoScrollInterval);
  });

  container.addEventListener("mouseout", function () {
    autoScrollInterval = setInterval(autoScroll, 3000);
  });
}

sliderItem();

function sliderBanner() {
  const container = document.querySelector(".container-highlight-cate");
  const widthItem = document.querySelector(".item-highlight").offsetWidth + 20;

  document.getElementById("btn-highlight-next").onclick = function () {
    if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
      container.scrollLeft = 0;
    } else {
      container.scrollLeft += widthItem;
    }
  };

  document.getElementById("btn-highlight-prev").onclick = function () {
    if (container.scrollLeft <= 0) {
      container.scrollLeft = container.scrollWidth - container.offsetWidth;
    } else {
      container.scrollLeft -= widthItem;
    }
  };

  function autoScroll() {
    if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
      container.scrollLeft = 0;
    } else {
      container.scrollLeft += widthItem;
    }
  }

  let autoScrollInterval = setInterval(autoScroll, 3500);

  container.addEventListener("mouseover", function () {
    clearInterval(autoScrollInterval);
  });

  container.addEventListener("mouseout", function () {
    autoScrollInterval = setInterval(autoScroll, 3500);
  });
}

sliderBanner();

// ============== Phần sản phẩm all==============//
function slider() {
  const containers = document.querySelectorAll(
    ".wrapper-products .container-products"
  ); // Get all product containers
  const prevBtns = document.querySelectorAll(".wrapper-products .prev");
  const nextBtns = document.querySelectorAll(".wrapper-products .next");

  containers.forEach((container, index) => {
    // Loop through each container
    const widthItem = document.querySelector(".item-products").offsetWidth + 20; // Get item width

    prevBtns[index].onclick = function () {
      // Prev button click handler
      if (container.scrollLeft === 0) {
        container.scrollLeft = container.scrollWidth - container.offsetWidth;
      } else {
        container.scrollLeft -= widthItem;
      }
    };

    nextBtns[index].onclick = function () {
      // Next button click handler
      if (
        container.scrollLeft + container.offsetWidth ===
        container.scrollWidth
      ) {
        container.scrollLeft = 0;
      } else {
        container.scrollLeft += widthItem;
      }
    };

    // Auto scroll (optional)
    function autoScroll() {
      if (
        container.scrollLeft + container.offsetWidth >=
        container.scrollWidth
      ) {
        container.scrollLeft = 0;
      } else {
        container.scrollLeft += widthItem;
      }
    }
    let autoScrollInterval = setInterval(autoScroll, 3500);
    container.addEventListener("mouseover", function () {
      clearInterval(autoScrollInterval);
    });
    container.addEventListener("mouseout", function () {
      autoScrollInterval = setInterval(autoScroll, 3500);
    });
  });
}

slider();

// ================ END PRODUCTS ALL===============//

// Lấy tham chiếu đến video và nút span
var myVideo = document.getElementById("myVideo");
var btnVideo = document.querySelector(".btn-video");
var videoPlaying = false;

btnVideo.addEventListener("click", function () {
  if (!videoPlaying) {
    myVideo.setAttribute("controls", true);
    myVideo.play();
    btnVideo.style.opacity = "0";
    videoPlaying = true;
  }
});

// Sự kiện tạm dừng video
myVideo.addEventListener("pause", function () {
  // Hiển thị lại nút span
  btnVideo.style.opacity = "1";
  videoPlaying = false;
});

myVideo.addEventListener("play", function () {
  btnVideo.style.opacity = "0";
  videoPlaying = true;
});
// =====================================//

// ======================== ADD TO CART=========================//
var btnCart = document.querySelectorAll(".add-cart");
btnCart.forEach((btn, index) => {
  btnCart[index].addEventListener("click", () => {
    btnCart[index].classList.add("active");
    setTimeout(() => {
      document.getElementById("audio_blink").play();
    }, 3300);

    setTimeout(() => {
      btnCart[index].classList.remove("active");
    }, 4200);
  });
});
