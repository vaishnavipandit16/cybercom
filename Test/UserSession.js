function sessionDetail() {
  var users = sessionStorage.getItem("userSession");
  var credentialsUser = JSON.parse(users);
  users = credentialsUser;

  if (users) {
    var tableData = users.map((user) => {
      return `
        <tr> 
          <td>${user.email}</td>
          <td>${user.date}</td>
        </tr>
        `;
    });
  }
  var tbody = document.querySelector("#body");
  console.log(tableData);
  tbody.innerHTML = tableData;
}
