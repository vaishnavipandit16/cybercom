//JS Coding Challenge 2

//John's Information
var johnTeam1 = 89;
var johnTeam2 = 120;
var johnTeam3 = 103;
var avgScoreOfJohn;

//Mike's Information
var mikeTeam1 = 116;
var mikeTeam2 = 94;
var mikeTeam3 = 123;
var avgScoreOfMike;

//Mary's Information
var maryTeam1 = 97;
var maryTeam2 = 134;
var maryTeam3 = 105;
var avgScoreOfMary;

//Average Score of John
avgScoreOfJohn = (johnTeam1 + johnTeam2 + johnTeam3) / 3;
console.log(`Average score of John is : ${avgScoreOfJohn}`);

//Average score of Mike
avgScoreOfMike = (mikeTeam1 + mikeTeam2 + mikeTeam3) / 3;
console.log(`Average score of Mike is : ${avgScoreOfMike}`);

//Average Score of Mary
avgScoreOfMary = (maryTeam1 + maryTeam2 + maryTeam3) / 3;
console.log(`Average score of Mary is : ${avgScoreOfMary}`);

//Check the conditions foe who is winner
if (avgScoreOfJohn > avgScoreOfMike && avgScoreOfJohn > avgScoreOfMary) {
  console.log(`The winner is John. Score is  ${avgScoreOfJohn}`);
} else if (avgScoreOfMike > avgScoreOfJohn && avgScoreOfMike > avgScoreOfMary) {
  console.log(`The winner is Mike. Score is  ${avgScoreOfMike}`);
} else if (avgScoreOfMary > avgScoreOfJohn && avgScoreOfMary > avgScoreOfMike) {
  console.log(`The winner is Mary. Score is  ${avgScoreOfMary}`);
} else if (
  avgScoreOfJohn == avgScoreOfMike &&
  avgScoreOfJohn != avgScoreOfMary &&
  avgScoreOfJohn > avgScoreOfMary
) {
  console.log(
    `John and Mike have same scores and they are winners. Scores are ${avgScoreOfJohn} and ${avgScoreOfMike}`
  );
} else if (
  avgScoreOfJohn == avgScoreOfMike &&
  avgScoreOfJohn != avgScoreOfMary &&
  avgScoreOfJohn < avgScoreOfMary
) {
  console.log(`The winner is Mary. Score is  ${avgScoreOfMary}.`);
} else if (
  avgScoreOfJohn == avgScoreOfMary &&
  avgScoreOfJohn != avgScoreOfMike &&
  avgScoreOfJohn > avgScoreOfMike
) {
  console.log(
    `John and Mary have same scores and they are winners. Scores are ${avgScoreOfJohn} and ${avgScoreOfMary}`
  );
} else if (
  avgScoreOfJohn == avgScoreOfMary &&
  avgScoreOfJohn != avgScoreOfMike &&
  avgScoreOfJohn < avgScoreOfMike
) {
  console.log(`The winner is Mike. Score is  ${avgScoreOfMike}`);
} else if (
  avgScoreOfMike == avgScoreOfMary &&
  avgScoreOfMike != avgScoreOfJohn &&
  avgScoreOfMike > avgScoreOfJohn
) {
  console.log(
    `Mike and Mary have same scores and they are winners. Scores are ${avgScoreOfMike} and ${avgScoreOfMary}`
  );
} else if (
  avgScoreOfMike == avgScoreOfMary &&
  avgScoreOfMike != avgScoreOfJohn &&
  avgScoreOfMike < avgScoreOfJohn
) {
  console.log(`The winner is John. Score is  ${avgScoreOfJohn}`);
} else {
  console.log(
    `It's a draw.All have score ${avgScoreOfJohn} , ${avgScoreOfMike} and ${avgScoreOfMary}`
  );
}
