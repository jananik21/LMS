<?php
// Start the session
session_start();

// Check if the user is logged in (you can adjust this condition as per your authentication logic)
if (isset($_SESSION['EmailAddress'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Destroy the session
    session_destroy();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout and Disable Back Arrow</title>
    <script>
        function logout() {
           
            window.history.pushState({}, '', ''); // This clears the browsing history
            window.onpopstate = function () {
                history.go(1); // This prevents going back in history
            };

            // Redirect to the index page after logout confirmation
            window.location.href = 'index.html';
        }
    </script>
</head>
<body>
    <h3>Are you sure you want to logout?</h3>
    
    <!-- Include a logout button or link that calls the JavaScript function -->
    <button onclick="logout()">Logout</button>
</body>
</html>
