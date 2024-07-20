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

function sliderItem() {
  const container = document.querySelector(".container-products");
  const widthItem = document.querySelector(".item-products").offsetWidth + 20;

  document.getElementById("btn-right").onclick = function () {
    if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
      container.scrollLeft = 0;
    } else {
      container.scrollLeft += widthItem;
    }
  };

  document.getElementById("btn-left").onclick = function () {
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

// =============================================================//

// =============================TAB COMMENT =================//
document.addEventListener('DOMContentLoaded', function() {
  const commentButton = document.getElementById('btn-comment');
  const innerOverlayComment = document.getElementById('innerOverlayComment');

  commentButton.addEventListener('click', function() {
    innerOverlayComment.style.display = 'flex';
    document.body.classList.add('no-scroll');
  });

  innerOverlayComment.addEventListener('click', function(event) {
    if (event.target === innerOverlayComment) {
      innerOverlayComment.style.display = 'none';
      document.body.classList.remove('no-scroll');
    }
  });
});
//========================================================//