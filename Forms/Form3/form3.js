function addOption(selectbox, text, value) {
  var optn = document.createElement("option");
  optn.text = text;
  optn.value = value;
  selectbox.options.add(optn);
}

//function is called when the page is load
function addOption_list() {
  for (var i = 1; i <= 31; ++i) {
    addOption(document.register_form.day_list, i, i);
  }
  for (var i = 1; i <= 12; ++i) {
    addOption(document.register_form.month_list, i, i);
  }
  for (var i = 1920; i < 2006; ++i) {
    addOption(document.register_form.year_list, i, i);
  }
}

//when the submit button is clicked this function is called
function validation() {
  //Get all the values from the form
  let fname = document.getElementById("fname").value;
  let lname = document.getElementById("lname").value;
  let day = document.getElementById("day_list").value;
  let month = document.getElementById("month_list").value;
  let year = document.getElementById("year_list").value;
  let male = document.getElementById("male").checked;
  let female = document.getElementById("female").checked;
  let country = document.getElementById("country").value;
  let mail = document.getElementById("mail").value;
  let phone = document.getElementById("phone").value;
  let password = document.getElementById("pass").value;
  let cpassword = document.getElementById("cpass").value;
  let agree = document.getElementById("agree").checked;

  checkFname(fname);
  checkLname(lname);
  checkDate(day, month, year);
  checkGender(male, female);
  checkCountry(country);
  checkEmail(mail);
  checkPhone(phone);
  checkPassword(password);
  checkConfirmPassword(cpassword, password);
  checkAgree(agree);
}

//function to Check for the firstname credential
function checkFname(fname) {
  let pat = /^[A-Za-z]*[A-Za-z]$/;
  if (fname === "" || fname.length < 2 || !fname.match(pat)) {
    alert("Name is required and have the length greater than or equals to 2.");
  }
}

//function to check for the lastname credential
function checkLname(lname) {
  let pat = /^[A-Za-z]*[A-Za-z]$/;
  if (lname === "" || lname.length < 2 || !lname.match(pat)) {
    alert(
      "Last Name is required and have the length greater than or equals to 2."
    );
  }
}

//function to check if the gender is selected
function checkGender(male, female) {
  if (!male && !female) {
    alert("Choose gender");
  }
}

//function to check if the country is selected
function checkCountry(country) {
  if (country === "0") {
    alert("Choose country");
  }
}

//function to check for the email credential
function checkEmail(mail) {
  let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (mail === "" || !mail.match(emailPattern)) {
    alert("Email should be in proper pattern");
  }
}

//function to check fo the mail credential
function checkPhone(phone) {
  if (phone.length != 10) {
    alert("Phone range must be 10 digits");
  }
}

// function to check if the date is selected or not
function checkDate(day, month, year) {
  if (day === "" || month === "" || year === "") {
    alert("Select Date");
  }
}

//function to check the password credential
function checkPassword(password) {
  let pat = /^[A-Za-z]\w{7,14}$/;
  if (password === "" || !password.match(pat)) {
    alert(
      "Password length should be between 7 and 15 and should contain digits, underscore and first letter should be character."
    );
  }
}

//function to check the confirm password credential
function checkConfirmPassword(cpassword, password) {
  if (cpassword !== password) {
    alert("Password and Confirm Password should be matched");
  }
}

//function to check if accept all the agreements or not
function checkAgree(agree) {
  if (!agree) {
    alert("Accept all the agrements");
  }
}
