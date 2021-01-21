function userAdd() {
  var fname = document.getElementById("fname").value;
  var email = document.getElementById("mail").value;
  var password = document.getElementById("pass").value;
  var birthday = document.getElementById("bdate").value;

  var arrayForUser = [];
  var objectForUser = {
    fname: fname,
    email: email,
    password: password,
    birthday: birthday,
  };
  arrayForUser.push(objectForUser);
  console.log(arrayForUser);
  localStorage.setItem("userData", JSON.stringify(arrayForUser));
}

function userTable() {
  var userData = localStorage.getItem("userData");
  var credentialsUser = JSON.parse(userData);
  userData = credentialsUser;
  console.log(userData);
  var currentyear = new Date().getFullYear();

  if (userData) {
    var tableData = userData.map(
      (user) => `
        <tr> 
          <td>${user.fname}</td>
          <td>${user.email}</td>
          <td>${user.password}</td>
          <td>${user.birthday}</td>
          <td></td>
          <td><a href="" onclick="edit(${user.email})">Edit</a><a href="delete.html">Delete</a></td>
        </tr>
        `
    );
  }
  var tbody = document.querySelector("#body");
  console.log(tableData);
  tbody.innerHTML = tableData;
}

function edit(email) {
  var userData = localStorage.getItem("userData");
  var credentialsUser = JSON.parse(userData);
  userData = credentialsUser;

  var emailData = userData.some((user) => {
    if (user.email === email) {
      return user;
    }
  });
  console.log(emailData);
  document.getElementById("fname").value = emailData[0].fname;
  document.getElementById("mail").value = emailData[0].email;
  document.getElementById("pass").value = emailData[0].Password;
  document.getElementById("bdate").value = emailData[0].birthday;
  document.getElementById("userLabel").value = "Update User";
  document.getElementById("addUser").value = "Update User";
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

//function update() {}
