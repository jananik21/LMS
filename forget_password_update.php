<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req = $_POST;

    if (isset($req['EmailAddress'], $req['object'])) {
        $EmailAddress = $req['EmailAddress'];
        $conn = mysqli_connect('localhost', 'root', '', 'projects');

        if ($req['object'] == 'forgot') {
            if (isset($req['newPassword'], $req['confirmPassword']) && $req['newPassword'] == $req['confirmPassword']) {
                // Store the new password without hashing
                $newPassword = $req['newPassword'];

                $update = "UPDATE `student_login` SET `Student_Password` = '$newPassword' WHERE `EmailAddress` = '$EmailAddress'";
                $result = mysqli_query($conn, $update);

                if ($result) {
                    echo 'Your new password has reset successfully, you can now login.';
                    header("Location: fp_success.html");
                    exit;
                } else {
                    $_SESSION['msg'] = 'Error updating password: ' . mysqli_error($conn);
                }
            } else {
                $_SESSION['msg'] = 'Password does not match';
            }

            header("Location: fp_success.html");
            exit;
        }
    }
}

// Redirect to the appropriate page if the POST data is missing or incorrect
header("Location: forget_password.php");
exit;
?>
