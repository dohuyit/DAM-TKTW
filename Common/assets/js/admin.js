var itemNav = document.querySelectorAll(".box-nav-topic2 .item-nav-aside");
itemNav.forEach((item, index) => {
  itemNav[index].addEventListener("click", () => {
    itemNav[index].classList.toggle("active");
  });
});

// ================= CHECK BOX =======================
// Chọn tất cả các checkbox và các toggle-box
var checkboxes = document.querySelectorAll(".toggle-input");
var btnCheck = document.querySelectorAll(".toggle-box");

// Lặp qua tất cả các btnCheck và gán sự kiện click
btnCheck.forEach((btn, index) => {
  btn.addEventListener("click", (event) => {
    event.preventDefault(); // Ngăn chặn hành vi mặc định của form
    // Lấy checkbox liên quan đến toggle-box này
    var checkbox = checkboxes[index];
    // Toggle trạng thái của checkbox
    checkbox.checked = !checkbox.checked;
    // Cập nhật class 'active' dựa trên trạng thái của checkbox
    if (checkbox.checked) {
      btn.classList.add("active");
    } else {
      btn.classList.remove("active");
    }
  });
});

// Khởi tạo trạng thái ban đầu cho các toggle-box dựa trên trạng thái của checkbox
checkboxes.forEach((checkbox, index) => {
  var btn = btnCheck[index];
  if (checkbox.checked) {
    btn.classList.add("active");
  } else {
    btn.classList.remove("active");
  }
});

// ===================================================//

document.addEventListener("DOMContentLoaded", function () {
  const toggleButton = document.getElementById("btn-add-cate");
  const toggleForm = document.getElementById("form-add-cate");

  toggleButton.addEventListener("click", function () {
    if (toggleForm.classList.contains("form")) {
      toggleForm.classList.remove("form");
    } else {
      toggleForm.classList.add("form");
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const toggleButton = document.getElementById("btn-add-slide");
  const toggleForm = document.getElementById("form-add-slide");

  toggleButton.addEventListener("click", function () {
    if (toggleForm.classList.contains("form")) {
      toggleForm.classList.remove("form");
    } else {
      toggleForm.classList.add("form");
    }
  });
});

// ================== UPLOAD IMG ==================//
document
  .getElementById("input-file")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("img-show").src = e.target.result;
    };
    if (file) {
      reader.readAsDataURL(file);
    }
  });
