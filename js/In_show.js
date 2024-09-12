let date = new Date();
let expireddate = new Date(date);
expireddate.setMonth(expireddate.getMonth() + 1);

document.getElementById("IN_01").addEventListener("click", function () {
  let paymnetLink = document.getElementById("payment_slip_01").value;

  if (paymnetLink == "") {
    alert("Please enter the paymnet slip link");
  } else {
    let In_Id = document.getElementById("In_Id_1").textContent;
    let In_cost = document.getElementById("Price_1").textContent;

    let formdata = new FormData();
    formdata.append("In_Id", In_Id);
    formdata.append("In_cost", In_cost);
    formdata.append("date", date.toISOString());
    formdata.append("expireddate", expireddate.toISOString());
    formdata.append("paymnetLink", paymnetLink);

    fetch("PHP/updated_I.php", {
      method: "POST",
      body: formdata,
    })
      .then(function (response) {
        return response.text();
      })
      .then(function (data) {
        if (data.includes("Email sent successfully.")) {
          alert("Plan added successfully" + data);
        } else {
          alert("Plan not added " + data);
        }
      })
      .catch(function (error) {
        console.error("Error:", error);
      });
  }
});
document.getElementById("IN_02").addEventListener("click", function () {
  let paymnetLink = document.getElementById("payment_slip_02").value;

  if (paymnetLink == "") {
    alert("Please enter the paymnet slip link");
  } else {
    let In_Id = document.getElementById("In_Id_1").textContent;
    let In_cost = document.getElementById("Price_1").textContent;

    let formdata = new FormData();
    formdata.append("In_Id", In_Id);
    formdata.append("In_cost", In_cost);
    formdata.append("date", date.toISOString());
    formdata.append("expireddate", expireddate.toISOString());
    formdata.append("paymnetLink", paymnetLink);

    fetch("PHP/updated_I.php", {
      method: "POST",
      body: formdata,
    })
      .then(function (response) {
        return response.text();
      })
      .then(function (data) {
        if (data.includes("Email sent successfully.")) {
          alert("Plan added successfully" + data);
        } else {
          alert("Plan not added " + data);
        }
      })
      .catch(function (error) {
        console.error("Error:", error);
      });
  }
});
document.getElementById("IN_03").addEventListener("click", function () {
  let paymnetLink = document.getElementById("payment_slip_03").value;

  if (paymnetLink == "") {
    alert("Please enter the paymnet slip link");
  } else {
    let In_Id = document.getElementById("In_Id_1").textContent;
    let In_cost = document.getElementById("Price_1").textContent;

    let formdata = new FormData();
    formdata.append("In_Id", In_Id);
    formdata.append("In_cost", In_cost);
    formdata.append("date", date.toISOString());
    formdata.append("expireddate", expireddate.toISOString());
    formdata.append("paymnetLink", paymnetLink);

    fetch("PHP/updated_I.php", {
      method: "POST",
      body: formdata,
    })
      .then(function (response) {
        return response.text();
      })
      .then(function (data) {
        if (data.includes("Email sent successfully.")) {
          alert("Plan added successfully" + data);
        } else {
          alert("Plan not added " + data);
        }
      })
      .catch(function (error) {
        console.error("Error:", error);
      });
  }
});
