//When single admin is not registered and register button is clicked
function register() {
  window.location.href = "file:///F:/Test/Registration.html";
}

//When admin is already registered
function checkForAdmin() {
  var adminData = localStorage.getItem("adminData");
  var credentialsAdmin = JSON.parse(adminData);
  adminData = credentialsAdmin;
  if (adminData) {
    document.getElementById("registerbtn").disabled = true;
  }
}

//When login button clicked
function login() {
  var email = document.getElementById("mail").value;
  var password = document.getElementById("pass").value;

  //local storage for admin
  var adminData = localStorage.getItem("adminData");
  var credentialsAdmin = JSON.parse(adminData);
  adminData = credentialsAdmin;

  //local storage for user
  var userData = localStorage.getItem("userData");
  var credentialsUser = JSON.parse(userData);
  userData = credentialsUser;

  //take the email and password from localstorage
  var emailData = userData.some((user) => user.email === email);
  var passwordData = userData.some((user) => user.password === password);
  console.log(emailData, passwordData);

  //Check if the emai id and password are match or not
  if (email === adminData[0].email && password === adminData[0].password) {
    window.location.href = "file:///F:/Test/Dashboard.html";
  } else if (emailData && passwordData) {
    window.location.href = "file:///F:/Test/Sub-user.html";
    var currentdate = new Date();
    var datetime =
      currentdate.getDay() +
      "/" +
      currentdate.getMonth() +
      "/" +
      currentdate.getFullYear() +
      " @ " +
      currentdate.getHours() +
      ":" +
      currentdate.getMinutes() +
      ":" +
      currentdate.getSeconds();
    var user = sessionStorage.getItem("userSession");
    var credentialsUser = JSON.parse(user);
    user = credentialsUser;
    var arrayForSessionUser = user;
    var sessionObj = {
      email: email,
      date: datetime,
    };
    arrayForSessionUser.push(sessionObj);
    sessionStorage.setItem("userSession", JSON.stringify(arrayForSessionUser));
  } else {
    alert("Invalid email and password");
  }
}
