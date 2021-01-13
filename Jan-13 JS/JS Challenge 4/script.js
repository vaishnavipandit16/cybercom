var john = {
  fullName: "John Steve",
  height: 168,
  mass: 60,
  calBMI: function () {
    this.BMI = this.mass / (this.height * this.height);
    return this.BMI;
  },
};

var mark = {
  fullName: "Mark Steve",
  height: 170,
  mass: 65,
  calBMI: function () {
    this.BMI = this.mass / (this.height * this.height);
    return this.BMI;
  },
};

john.calBMI();
mark.calBMI();

console.log(john);
console.log(mark);

if (john.BMI > mark.BMI) {
  console.log(john.fullName + " " + john.BMI);
} else if (mark.BMI > john.BMI) {
  console.log(mark.fullName + " " + mark.BMI);
} else {
  console.log(john.fullName + " " + john.BMI);
  console.log(mark.fullName + " " + mark.BMI);
}
