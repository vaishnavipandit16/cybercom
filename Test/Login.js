function register() {
  window.location.href = "file:///F:/Test/Registration.html";
}
function checkForAdmin() {
  var adminData = localStorage.getItem("adminData");
  var credentialsAdmin = JSON.parse(adminData);
  adminData = credentialsAdmin;
  if (adminData) {
    document.getElementById("registerbtn").disabled = true;
  }
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
  var emailData = userData.some((user) => user.email === email);
  var passwordData = userData.some((user) => user.password === password);
  console.log(emailData, passwordData);
  if (email === adminData[0].email && password === adminData[0].password) {
    window.location.href = "file:///F:/Test/Dashboard.html";
  } else if (emailData && passwordData) {
    window.location.href = "file:///F:/Test/Sub-user.html";
  } else {
    alert("Invalid email and password");
  }
}
