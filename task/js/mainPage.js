var userNameDisplay = document.getElementById("userNameDisplay");
if (userNameDisplay) {
    userNameDisplay.textContent = sessionStorage.getItem("userName");
}
if (typeof(Storage) !== "undefined") {
    // Set data in session storage
    var userName = 
    sessionStorage.setItem("userName", userName);

    // Get and display data from session storage
    var storedName = sessionStorage.getItem("userName");
    console.log("User Name:", storedName);
} else {
    console.log("Session storage is not supported.");
}