let thisPage = 1;
let limit = 5;
let list = document.querySelectorAll("#user-table-body tr");

function loadItem() {
  let beginGet = limit * (thisPage - 1);
  let endGet = limit * thisPage - 1;
  list.forEach((item, key) => {
    if (key >= beginGet && key <= endGet) {
      item.style.display = "table-row";
    } else {
      item.style.display = "none";
    }
  });
  listPage();
}
loadItem();

function listPage() {
  let count = Math.ceil(list.length / limit);
  document.querySelector(".list-page").innerHTML = "";

  if (thisPage != 1) {
    let prev = document.createElement("li");
    prev.innerHTML = '<i class="fa-solid fa-angles-left"></i>';
    prev.style.fontSize = "12px";
    prev.setAttribute("onclick", "changePage(" + (thisPage - 1) + ")");
    document.querySelector(".list-page").appendChild(prev);
  }

  for (let i = 1; i <= count; i++) {
    let newPage = document.createElement("li");
    newPage.innerText = i;
    if (i == thisPage) {
      newPage.classList.add("active");
    }
    newPage.setAttribute("onclick", "changePage(" + i + ")");
    document.querySelector(".list-page").appendChild(newPage);
  }

  if (thisPage != count) {
    let next = document.createElement("li");
    next.innerHTML = '<i class="fa-solid fa-angles-right"></i>';
    next.style.fontSize = "12px";
    next.setAttribute("onclick", "changePage(" + (thisPage + 1) + ")");
    document.querySelector(".list-page").appendChild(next);
  }
}

function changePage(i) {
  thisPage = i;
  loadItem();
}
