<!DOCTYPE html>
<html>
    <head>
        <title>Unauthorized Error</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="/AdminUni/css/structure.css">
    </head>
    <body>

        <?php
        include('words_bg.php');
        ?>

        <div>
            <h3><?php echo $unauthorized_error_text?></h3>
            <br/>
            <a href="login.php/">
                <button class="btnLogin" style="margin-left : 50px;"><?php echo $redirect_to_login_page_text?></button>
            </a>
        </div>
    </body>
</html>
