document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting

    var username = document.getElementsByName("username")[0].value;
    var password = document.getElementsByName("password")[0].value;

    // Simple validation example (checking for empty fields and minimum password length)
    if (username.trim() === "" || password.trim() === "") {
        alert("Please enter both username and password.");
        return; // Stop further execution
    }

    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return; // Stop further execution
    }

    // If validation passes, submit the form
    this.submit();
});

document.addEventListener("DOMContentLoaded", function() {
    const signInButton = document.querySelector("#signUp button:first-of-type");
    const signUpButton = document.querySelector("#signIn button:last-of-type");
    const signInForm = document.getElementById("signIn");
    const signUpForm = document.getElementById("signUp");

    signInButton.addEventListener("click", function(event) {
        event.preventDefault();
        signInForm.classList.add("active");
        signUpForm.classList.remove("active");
    });

    signUpButton.addEventListener("click", function(event) {
        event.preventDefault();
        signInForm.classList.remove("active");
        signUpForm.classList.add("active");
    });
});

function topFunction() {
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}