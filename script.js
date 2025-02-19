document.getElementById("loginForm").addEventListener("submit", async function(event) {
    event.preventDefault();
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let response = await fetch("login.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ username, password })
    });
    let data = await response.json();
    if (data.success) {
        window.location.href = `dashboard.php?user=${username}`;
    } else {
        document.getElementById("error-message").textContent = "Invalid credentials";
    }
});