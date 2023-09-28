<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req = $_POST;

    if (isset($req['Staff_email'], $req['object'])) {
        $EStaff_email = $req['Staff_email'];
        $conn = mysqli_connect('localhost', 'root', '', 'projects');

        if ($req['object'] == 'forgot') {
            if (isset($req['newPassword'], $req['confirmPassword']) && $req['newPassword'] == $req['confirmPassword']) {
                // Store the new password without hashing
                $newPassword = $req['newPassword'];

                $update = "UPDATE `staff_login` SET `Staff_Password` = '$newPassword' WHERE `Staff_email` = '$EStaff_email'";
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
        }
    }
}

// Redirect to the appropriate page if the POST data is missing or incorrect
header("Location: forget_password.php");
exit;
?>
