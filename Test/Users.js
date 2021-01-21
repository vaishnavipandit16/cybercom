//When admin add the user data and add user button is clicked
function userAdd() {
  var fname = document.getElementById("fname").value;
  var email = document.getElementById("mail").value;
  var password = document.getElementById("pass").value;
  var birthday = document.getElementById("bdate").value;

  //Calculate age
  var currentyear = new Date().getFullYear();
  var birthdayString = birthday.toString();
  var year = birthdayString.substring(0, 4);

  var userData = localStorage.getItem("userData");
  var credentialsUser = JSON.parse(userData);
  userData = credentialsUser;
  var arrayForUser = userData;
  var objectForUser = {
    fname: fname,
    email: email,
    password: password,
    birthday: birthday,
    age: currentyear - year,
  };

  //Add the object of user to the array
  arrayForUser.push(objectForUser);
  console.log(arrayForUser);

  //Set the localStorage Data for the user
  localStorage.setItem("userData", JSON.stringify(arrayForUser));
}

//When the page is load and get the users data from localhost to display in the table
function userTable() {
  var userData = localStorage.getItem("userData");
  var credentialsUser = JSON.parse(userData);
  userData = credentialsUser;
  console.log(userData);

  if (userData) {
    var tableData = userData.map((user) => {
      return `
        <tr> 
          <td>${user.fname}</td>
          <td>${user.email}</td>
          <td>${user.password}</td>
          <td>${user.birthday}</td>
          <td>${user.age}</td>
          <td><a href="#" onclick="edit(${user.email})">Edit</a><a href="delete.html">Delete</a></td>
        </tr>
        `;
    });
  }
  var tbody = document.querySelector("#body");
  console.log(tableData);
  tbody.innerHTML = tableData;
}

//When admin click on the edit link
function edit(email) {
  console.log("edit");
  var userData = localStorage.getItem("userData");
  var credentialsUser = JSON.parse(userData);
  userData = credentialsUser;

  //take all the data which is to be changed
  var emailData = userData.some((user) => {
    if (user.email === email) {
      return user;
    }
  });
  console.log("emaildata" + emailData);

  //take aal the data to the fields
  document.getElementById("fname").innerHTML = emailData[0].fname;
  document.getElementById("mail").innerHTML = emailData[0].email;
  document.getElementById("pass").innerHTML = emailData[0].Password;
  document.getElementById("bdate").innerHTML = emailData[0].birthday;
  document.getElementById("userLabel").innerHTML = "Update User";
  document.getElementById("addUser").innerHTML = "Update User";
  if (document.getElementById("addUser").value === "Update User") {
    document.getElementById("addUser").onclick(() => {
      var data = JSON.parse(localStorage.userData);
      for (var i = 0; i < data.length; i++) {
        if (emailData[0].email === data[i].email) {
          data[i].fname = document.getElementById("fname").value;
          data[i].email = document.getElementById("mail").value;
          data[i].password = document.getElementById("pass").value;
          data[i].birthday = document.getElementById("bdate").value;
          break;
        }
      }
      localStorage.setItem("userData", JSON.stringify(data));
    });
  }
}
