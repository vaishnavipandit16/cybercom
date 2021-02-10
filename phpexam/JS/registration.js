function validate() {
  let prefix = document.getElementById("prefix").value;
  let fname = document.getElementById("fname").value;
  let lname = document.getElementById("lname").value;
  let email = document.getElementById("email").value;
  let mobile = document.getElementById("mobile").value;
  let password = document.getElementById("password").value;
  let cpassword = document.getElementById("cpassword").value;
  let info = document.getElementById("info").value;
  let agree = document.getElementById("agree").checked;

  checkPrefix(prefix);
  checkFname(fname, lname);
  checkEmail(email);
  checkMobile(mobile);
  checkPassword(password);
  checkCpassword(cpassword, password);
  checkInfo(info);
  checkAgree(agree);
}

function checkPrefix(prefix) {
  if (prefix == "") {
    document.getElementById("e-prefix").innerHTML = "Enter prefix";
  } else {
    document.getElementById("e-prefix").innerHTML = "";
  }
}
function checkFname(fname, lname) {
  let pat = /^[A-Za-z]*[A-Za-z]$/;
  if (fname === "" || !fname.match(pat)) {
    document.getElementById("e-fname").innerHTML = "Enter First Name";
  } else {
    document.getElementById("e-fname").innerHTML = "";
  }

  if (lname === "" || !lname.match(pat)) {
    document.getElementById("e-lname").innerHTML = "Enter Last Name";
  } else {
    document.getElementById("e-lname").innerHTML = "";
  }
}

function checkEmail(email) {
  let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (email === "" || !email.match(emailPattern)) {
    document.getElementById("e-email").innerHTML = "Enter Email";
  } else {
    document.getElementById("e-email").innerHTML = "";
  }
}

function checkMobile(mobile) {
  if (mobile.length != 10) {
    document.getElementById("e-mobile").innerHTML = "Enter 10 digits";
  } else {
    document.getElementById("e-mobile").innerHTML = "";
  }
}

function checkPassword(password) {
  let pat = /^[A-Za-z]\w{7,14}$/;
  if (password === "" || !password.match(pat)) {
    document.getElementById("e-pass").innerHTML = "Enter Proper Password";
  } else {
    document.getElementById("e-pass").innerHTML = "";
  }
}

function checkCpassword(cpassword, password) {
  if (cpassword !== password) {
    document.getElementById("e-cpass").innerHTML =
      "should be match with password";
  } else {
    document.getElementById("e-cpass").innerHTML = "";
  }
}

function checkInfo(info) {
  if (info === "") {
    document.getElementById("e-info").innerHTML = "Enter information";
  } else {
    document.getElementById("e-info").innerHTML = "";
  }
}

function checkAgree(agree) {
  if (!agree) {
    document.getElementById("e-check").innerHTML = "Accept all the terms";
  } else {
    document.getElementById("e-check").innerHTML = "";
  }
}
