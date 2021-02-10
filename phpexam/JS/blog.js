function logout() {
  window.location.href = "login.php";
}

function manage_category() {
  window.location.href = "manage_category.php";
}
function manage_post() {
  window.location.href = "manage_category.php";
}

function validate() {
  let title = document.getElementById("title").value;
  let content = document.getElementById("content").value;
  let url = document.getElementById("url").value;
  let mtitle = document.getElementById("mtitle").value;
  let pcat = document.getElementById("pcat").value;
  let image = document.getElementById("image").value;

  checkTitle(title);
  checkContent(content);
  checkUrl(url);
  checkMtitle(mtitle);
  checkPcat(pcat);
  checkImage(image);
}

function checkTitle(title) {
  if (title == "") {
    document.getElementById("e-title").innerHTML = "Enter title";
  } else {
    document.getElementById("e-title").innerHTML = "";
  }
}
function checkContent(content) {
  if (content === "") {
    document.getElementById("e-content").innerHTML = "Enter Content";
  } else {
    document.getElementById("e-content").innerHTML = "";
  }
}

function checkUrl(url) {
  if (url === "") {
    document.getElementById("e-url").innerHTML = "Enter URL";
  } else {
    document.getElementById("e-url").innerHTML = "";
  }
}

function checkMtitle(mtitle) {
  if (mtitle === "") {
    document.getElementById("e-mtitle").innerHTML = "Enter Meta Title";
  } else {
    document.getElementById("e-mtitle").innerHTML = "";
  }
}

function checkPcat(pcat) {
  if (pcat === "") {
    document.getElementById("e-pcat").innerHTML = "Enter Parent Category Id";
  } else {
    document.getElementById("e-pcat").innerHTML = "";
  }
}

function checkImage(image) {
  if (image === "") {
    document.getElementById("e-image").innerHTML = "Choose image";
  } else {
    document.getElementById("e-image").innerHTML = "";
  }
}
