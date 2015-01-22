<!DOCTYPE HTML>
<html>
    <head>
        <title>Login Form</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="/AdminUni/css/reset.css">
        <link rel="stylesheet" type="text/css" href="/AdminUni/css/structure.css">
    </head>

    <body>


        <?php
        include('config_database.php');
        include('words_bg.php');
        
        $conn = mysql_connect($localhost, $user, $pass);
        mysql_select_db($db, $conn);
        $tbl_name = "USERS"; // Table name

        if (isset($_POST['submit'])) {
// username and password sent from form 
            $member_username = $_POST['member_username'];
            $password = $_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
            $member_username = stripslashes($member_username);
            $password = stripslashes($password);
            $member_username = mysql_real_escape_string($member_username);
            $password = mysql_real_escape_string($password);
            $sql = "SELECT * FROM $tbl_name WHERE USERNAME='$member_username' AND PASSWORD='$password'";
            $result = mysql_query($sql);
            mysql_close($conn);
// If result matched $myusername and $mypassword, table row must be 1 row
            if (mysql_num_rows($result)!=0) {
                // Register $myusername, $mypassword and redirect to file "login_success.php"
                $_SESSION['member_username'] = $_POST['member_username'];
                $_SESSION['password'] = $_POST['password'];
                session_start();
                header("Location: menu.php");
                exit;
            } else {
                header("Location: login_error.php");
                exit;
            }
        }
        ?>

        <form class="box login" name="form" method="post" action="">
            <fieldset class="boxBody">
                <label><?php echo $password_text?></label>
                <input type="text" tabindex="1" name="member_username" required>
                <label><?php echo $password_text?></label>
                <input type="password" tabindex="2" name="password" required>
            </fieldset>
            <footer>
                <input type="submit" class="btnLogin" name="submit" id="submit" value="Login" tabindex="1">
            </footer>
        </form>

    </body>
</html>
