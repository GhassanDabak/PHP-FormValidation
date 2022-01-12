const form = document.getElementById("form");
const username = document.getElementById("username");
const email = document.getElementById("register");
const password = document.getElementById("password");
const password2 = document.getElementById("re-password");
const usernamePattern = /^[A-Za-z]{3,13}$/;
const emailRegex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

const smallEmail = document.querySelector("#emailMessage");
const smallUsername = document.querySelector("#usernameMessage");
const smallPassword = document.querySelector("#passwordMessage");
const smallRepassword = document.querySelector("#repasswordMessage");

let emailState = false;
let usernameState = false;
let passwordState = false;
let repasswordState = false;

email.addEventListener("keyup", emailTracker);
function emailTracker() {
  let emailValue = email.value;
  if (emailValue.match(emailRegex)) {
    smallEmail.style.visibility = "hidden";
    emailState = true;
  } else {
    smallEmail.style.visibility = "visible";
    smallEmail.style.color = "red";
    smallEmail.innerHTML = "Invalid email";
  }
}

username.addEventListener("keyup", usernameTracker);
function usernameTracker() {
  let usernameValue = username.value;
  if (usernameValue.match(usernamePattern)) {
    smallUsername.style.visibility = "hidden";
    usernameState = true;
  } else {
    smallUsername.style.visibility = "visible";
    smallUsername.style.color = "red";
    smallUsername.innerHTML = "Invalid username or its too short";
  }
}

password.addEventListener("keyup", passwordTracker);
function passwordTracker() {
  if (password.value.length >= 8) {
    smallPassword.style.visibility = "hidden";
    passwordState = true;
  } else {
    smallPassword.style.visibility = "visible";
    smallPassword.style.color = "red";
    smallPassword.innerHTML = "Password must be 8 or more";
  }
}

password2.addEventListener("keyup", password2Tracker);
function password2Tracker() {
  let password2Value = password2.value;
  if (password2Value !== password.value) {
    smallRepassword.style.visibility = "visible";
    smallRepassword.innerHTML = "Password doesn't match";
    smallRepassword.style.color = "red";
  } else {
    smallRepassword.style.visibility = "hidden";
    repasswordState = true;
  }
}

let submit = document.querySelector("#sub-btn");
submit.addEventListener("click", (e) => {
  if (!emailState) {
    e.preventDefault();
    smallEmail.style.visibility = "visible";
    smallEmail.innerHTML = "Cannot be empty";
    smallEmail.style.color = "red";    
  }
  if (!usernameState) {
    e.preventDefault();
    smallUsername.style.visibility = "visible";
    smallUsername.innerHTML = "Cannot be empty";
    smallUsername.style.color = "red";
  }
  if (!passwordState) {
    e.preventDefault();
    smallPassword.style.visibility = "visible";
    smallPassword.innerHTML = "Cannot be empty";
    smallPassword.style.color = "red";
  }
  if (!repasswordState) {
    e.preventDefault();
    smallRepassword.style.visibility = "visible";
    smallRepassword.innerHTML = "Cannot be empty";
    smallRepassword.style.color = "red";
  }
});
