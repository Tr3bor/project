function validateForm() {
    let email = document.forms["registerForm"]["email"].value;
    let password = document.forms["registerForm"]["password"].value;
    if (email == "") {
        alert("Email must be filled out.");
        return false;
    }
    if (password == "") {
        alert("Password must be filled out.");
        return false;
    }
} 