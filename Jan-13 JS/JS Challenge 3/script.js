var bill1 = 124;
var bill2 = 48;
var bill3 = 268;

tenPerValue = 10 / 100;
fifteenPerValue = 15 / 100;
twentyPerValue = 20 / 100;

var tips = [];
var finalPaids = [];

function tipCalculator(bill) {
  var tip, billFinalPaid;
  if (bill < 50) {
    tip = twentyPerValue * bill;
  } else if (bill >= 50 && bill <= 200) {
    tip = fifteenPerValue * bill;
  } else {
    tip = fifteenPerValue * bill;
  }
  billFinalPaid = bill + tip;
  tips.push(tip);
  finalPaids.push(billFinalPaid);
}

tipCalculator(bill1);
tipCalculator(bill2);
tipCalculator(bill3);

for (var i = 0; i < tips.length; i++) {
  console.log("Tip " + (i + 1) + ": " + tips[i]);
  console.log("Final Bill " + (i + 1) + ": " + finalPaids[i]);
}
