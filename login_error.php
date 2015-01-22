<!DOCTYPE html>
<html>
    <head>
        <title>Login Error</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="/AdminUni/css/structure.css">
        <link rel="stylesheet" type="text/css" href="words_bg.php">
    </head>
    <body>
        
        <?php
        include('words_bg.php');
        
        if (!session_start()) {
            header("Location: unauthorized_error.php");
        }
        ?>
        
        <div>
            <h3><?php echo $login_error_text?></h3>
            <br/>
            <a href="login.php/">
                <button class="btnLogin" style="margin-left : 100px;">Назад</button>
            </a>
        </div>
    </body>
</html>
