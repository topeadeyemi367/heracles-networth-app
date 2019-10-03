function formValidation() {
  
  // e.preventDefault();
  // e.submit();
  // return false;
  // "use strict";
  var name = document.getElementById('fullname');
  // document.forms["SignupForm"]["name"];
  // var lastname = document.getElementById('lastname');
  // document.forms["SignupForm"]["lastname"];
  var email = document.getElementById('email');
  // document.forms["SignupForm"]["email"];
  var phone = document.getElementById('mobile');
  // document.forms["SignupForm"]["mobile"];
  var password = document.getElementById('password');
  // document.forms["SignupForm"]["password"];
  var cpassword = document.getElementById('Cpassword');
  // document.forms["SignupForm"]["Cpassword"];

  var nameLen = name.value.length;
  // var lastnameLen = lastname.value.length;
  var emailLen = email.value.length;
  var phoneLen = phone.value.length;
  var passwordLen = password.value.length;
  var cpasswordLen = cpassword.value.length;
  var atposition = email.value.indexOf('@');
  var dotposition = email.value.lastIndexOf('.');

  //name value
  var nameVal = removeSpace(name.value);
  
  //remove empty spaces in input name
  function removeSpace(name){
    return name.split(' ').join('');
  }

  //regex
  var letters = /^[A-Za-z]+$/;
  var numbers = /^[0-9]+$/;
  // var mailFormat =;
  // ;

  if (nameLen < 5) {
    alert("Fullname should be at least 5 characters long");
    name.focus();
    return false;
  }

  // else if (lastnameLen < 3) {
  //   alert("Lastname should be at least 3 characters long");
  //   lastname.focus();
  //   return false;
  // }
  else if (!nameVal.match(letters)) {
    alert("Fullname should be alphabet characters only");
    name.focus();
    return false;
  }
  //  if (!lastname.value.match(letters)) {
  //   alert("Username should be alphabet characters only");
  //   lastname.focus();
  //   return false;
  // }
  else if (emailLen == 0 || atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= emailLen) {
    alert("Please enter a valid email address");
    email.focus();
    return false;
  }
  else if (phoneLen !== 11 || !phone.value.match(numbers)) {
    alert("Please enter a valid phone numer, 11 digits only eg 09012345678");
    phone.focus();
    return false;
  }
  else if (passwordLen < 5) {
    alert("Password should be at least 5 charcaters long");
    password.focus();
    return false;
  }
  else if (cpasswordLen == 0 || cpassword.value !== password.value) {
    alert("Your password does not match");
    cpassword.focus();
    return false;
  }
else{
  // document.getElementById('submit_form').onsubmit();
  return true;
}
}
