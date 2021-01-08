//JS Coding Challenge 1

//Mark's Information
var heightOfMark = 5;
var massOfMark = 50;
var BMIOfMark;

//John's Information
var heightOfJohn = 6;
var massOfJohn = 60;
var BMIOfJohn;

var isMarkHasHigherBMI;

//BMI of Mark
BMIOfMark = massOfMark / (heightOfMark * heightOfMark);
console.log(`BMI of Mark ${BMIOfMark}`);

//BMI of John
BMIOfJohn = massOfJohn / (heightOfJohn * heightOfJohn);
console.log(`BMI of John ${BMIOfJohn}`);

//Check whether BMI of Mark is greater than John?
isMarkHasHigherBMI = BMIOfMark > BMIOfJohn;
console.log(`Is Mark's BMI higher than John's? ${isMarkHasHigherBMI}`);
