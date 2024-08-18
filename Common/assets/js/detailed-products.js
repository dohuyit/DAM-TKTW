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

  const btnRight = document.getElementById("btn-right");
  const btnLeft = document.getElementById("btn-left");

  btnRight.onclick = function () {
    if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
      container.scrollLeft = 0;
    } else {
      container.scrollLeft += widthItem;
    }
  };

  btnLeft.onclick = function () {
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
  let autoScrollInterval = setInterval(autoScroll, 2000);

  function stopAutoScroll() {
    clearInterval(autoScrollInterval);
  }

  function startAutoScroll() {
    autoScrollInterval = setInterval(autoScroll, 2000);
  }

  container.addEventListener("mouseover", stopAutoScroll);
  container.addEventListener("mouseout", startAutoScroll);

  btnRight.addEventListener("mouseover", stopAutoScroll);
  btnRight.addEventListener("mouseout", startAutoScroll);

  btnLeft.addEventListener("mouseover", stopAutoScroll);
  btnLeft.addEventListener("mouseout", startAutoScroll);
}

sliderItem();

// ============================= line Desc ==================//
document.addEventListener("DOMContentLoaded", function () {
  const pElement = document.getElementById("formatted-text");
  const lines = pElement.innerHTML.split("\n");

  // Tạo một biến để lưu trữ văn bản đã định dạng
  let formattedText = "";

  // Duyệt qua từng dòng và bao quanh bằng thẻ <span>
  lines.forEach((line, index) => {
    // Nếu dòng là dòng chẵn, thêm class "even-line"
    if ((index + 1) % 2 === 0) {
      formattedText += `<span class="even-line">${line}</span>\n`;
    } else {
      formattedText += `<span>${line}</span>\n`;
    }
  });

  // Cập nhật lại nội dung của phần tử <p>
  pElement.innerHTML = formattedText;
});

//=========================== end ============================//

// =============================TAB COMMENT =================//
document.addEventListener("DOMContentLoaded", function () {
  const commentButton = document.getElementById("btn-comment");
  const innerOverlayComment = document.getElementById("innerOverlayComment");

  commentButton.addEventListener("click", function () {
    innerOverlayComment.style.display = "flex";
    document.body.classList.add("no-scroll");
  });

  innerOverlayComment.addEventListener("click", function (event) {
    if (event.target === innerOverlayComment) {
      innerOverlayComment.style.display = "none";
      document.body.classList.remove("no-scroll");
    }
  });
});
//========================================================//
