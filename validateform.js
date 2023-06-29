function validateform() {
    let x = document.forms["myform"]["firstname"].value;
    if (x == "") {
        alert("firstname cannot be empty");
        return false;
    }

    var y = document.forms["myform"]["email"].value;
    // console.log(y);
    let atsign = y.indexOf("@");
    // console.log(atsign);
    let dot = y.lastIndexOf(".");
    if (atsign > 1 && dot > 1 && dot > atsign && dot < y.length - 1) {
        console.log("email okay");
    } else {
        alert("invalid email");
        return false;
    }

    var number = document.forms["myform"]["mobile"].value;
    // console.log(number);

    if (number.length > 10 || number.length < 10) {
        alert("invalid number");
        return false;
    }

    let dept = document.forms["myform"]["department"].value;
    if (dept == "") {
        alert("please add department");
        return false;
    }
    let desg = document.forms["myform"]["designation"].value;
    if (desg == "") {
        alert("please add designation");
        return false;
    }
}
