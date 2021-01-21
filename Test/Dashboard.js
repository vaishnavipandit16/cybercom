function ageCount() {
  var userData = localStorage.getItem("userData");
  var credentialsUser = JSON.parse(userData);
  userData = credentialsUser;

  var count18 = 0;
  var count18to50 = 0;
  var count50 = 0;
  if (userData) {
    var tableData = userData.map((user) => {
      if (user.age <= 18) {
        return count18++;
      } else if (user.age > 18 && user.age <= 50) {
        return count18to50++;
      } else {
        return count50++;
      }
    });
  }
  document.getElementById("count18").innerHTML = count18;
  document.getElementById("count18to50").innerHTML = count18to50;
  document.getElementById("count50").innerHTML = count50;
}
