//When submit button is clicked, this function will be called
function validation() {
  //Get all the information from the form
  let fname = document.getElementById("name").value;
  let password = document.getElementById("pass").value;
  let address = document.getElementById("address").value;
  let hockey = document.getElementById("hockey").checked;
  let football = document.getElementById("football").checked;
  let badminton = document.getElementById("badminton").checked;
  let cricket = document.getElementById("cricket").checked;
  let vollyball = document.getElementById("vollyball").checked;
  let male = document.getElementById("male").checked;
  let female = document.getElementById("female").checked;
  let age = document.getElementById("age").value;
  let file = document.getElementById("file").value;

  checkFname(fname);
  checkPassword(password);
  checkAddress(address);
  checkGame(hockey, football, badminton, cricket, vollyball);
  checkGender(male, female);
  checkAge(age);
  checkFile(file);
}

//For checking the username credential
function checkFname(fname) {
  let pat = /^[A-Za-z]*[A-Za-z]$/;
  if (fname === "" || fname.length < 2 || !fname.match(pat)) {
    alert("Name is required and have the length greater than or equals to 2.");
  }
}

//For checking the password credential
function checkPassword(password) {
  let pat = /^[A-Za-z]\w{7,14}$/;
  if (password === "" || !password.match(pat)) {
    alert(
      "Password length should be between 7 and 15 and should contain digits, underscore and first letter should be character."
    );
  }
}

//For checking the address credential
function checkAddress(address) {
  if (address === "") {
    alert("Please anter the address");
  }
}

//For checking if the game is selected or not
function checkGame(hockey, football, badminton, cricket, vollyball) {
  if (!hockey && !football && !badminton && !cricket && !vollyball) {
    alert("Choose atleast one game.");
  }
}

//For checking if the gender is selected or not
function checkGender(male, female) {
  if (!male && !female) {
    alert("Choose gender");
  }
}

//For checking if the age is selected or not
function checkAge(age) {
  if (age === "0") {
    alert("Select the age");
  }
}

//For checking if the file is selected or not
function checkFile(file) {
  if (file.length === 0) {
    alert("select the file");
  }
}
