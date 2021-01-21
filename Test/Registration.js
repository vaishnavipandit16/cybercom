//When the registration button is clicked
function registration() {
  //get the values of registration form
  var fname = document.getElementById("fname").value;
  var email = document.getElementById("mail").value;
  var password = document.getElementById("pass").value;
  var confirmPassword = document.getElementById("cpass").value;
  var city = document.getElementById("city").value;
  var state = document.getElementById("state").value;
  var terms = document.getElementById("terms").value;

  var validPass = /\w[0-9]/;

  //Put the validation for the registration form and redirect to login page
  if (
    fname !== "" &&
    email !== "" &&
    password !== "" &&
    confirmPassword !== "" &&
    terms !== "off"
  ) {
    if (password.match(validPass) && password.length >= 8) {
      if (password === confirmPassword) {
        var arrayForAdmin = [];
        var objectForAdmin = {
          fname: fname,
          email: email,
          password: password,
          confirmPassword: confirmPassword,
          city: city,
          state: state,
          terms: terms,
        };
        arrayForAdmin.push(objectForAdmin);
        localStorage.setItem("adminData", JSON.stringify(arrayForAdmin));
        window.location.href = "file:///F:/Test/Login.html";
      } else {
        alert("Password and confirm password should be matched");
      }
    } else {
      alert("password should be valid and length should be greater than 8");
    }
  } else {
    alert(
      "Enter all the values for name,email,password,confirm password and check the checkbox."
    );
  }
}
