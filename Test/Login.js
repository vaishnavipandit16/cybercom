function register() {
  window.location.href = "file:///F:/Test/Registration.html";
}
function login() {
  var email = document.getElementById("mail").value;
  var password = document.getElementById("pass").value;
  var adminData = localStorage.getItem("adminData");
  var credentialsAdmin = JSON.parse(adminData);
  adminData = credentialsAdmin;
  var userData = localStorage.getItem("userData");
  var credentialsUser = JSON.parse(userData);
  userData = credentialsUser;
  if (email === adminData[0].email && password === adminData[0].password) {
    window.location.href = "file:///F:/Test/Dashboard.html";
  } else if (
    email === userData.map((user) => user.email) &&
    password === userData.map((user) => user.password)
  ) {
    window.location.href = "file:///F:/Test/Sub-user.html";
  } else {
    alert("Invalid email and password");
  }
}
