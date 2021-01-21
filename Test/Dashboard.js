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
        <td><a href="Edit.html">Edit</a><a href="delete.html">Delete</a></td>
      </tr>
      `
    );
  }
  var tbody = document.querySelector("#body");
  console.log(tableData);
  tbody.innerHTML = tableData;
}
