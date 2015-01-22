<!DOCTYPE html>
<html>
    <head>
        <title>Menu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="/AdminUni/css/structure.css">
        <style>
            td {
                width: 50%;
            }
        </style>
    </head>
    <body>


        <?php
        include('words_bg.php');
        
        if (!session_start()) {
            header("Location: unauthorized_error.php");
        } 

        ?>
        <div class="box menu">
            <footer>
                <h2 style="text-align : center"><?php echo $btn_choice_option?></h2>
            </footer>
            <table>
                <tr>
                    <td width="50%">      
                        <a href="insert_university.php/">
                            <button class="btnMenu" style="margin-left : 5%; margin-top : 8%"><?php echo $btn_insert_university_text?></button>
                        </a>
                    </td>
                    <td>
                        <a href="insert_afilliale.php/">
                            <button class="btnMenu" style="margin-left : 20%; margin-top: 8%"><?php echo $btn_insert_affiliale_text?></button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td width="50%">
                        <a href="insert_basic_unit.php/">
                            <button class="btnMenu" style="margin-left : 5%; margin-top : 14%"><?php echo $btn_insert_basic_unit_text?></button>
                        </a>
                    </td>
                    <td>
                        <a href="insert_prof_area.php/">
                            <button class="btnMenu" style="margin-left : 20%; margin-top : 14%"><?php echo $btn_insert_prof_area_text?></button>
                        </a>
                    </td>
                </tr>
                <tr><td width="50%">
                        <a href="insert_speciality.php/">
                            <button class="btnMenu" style="margin-left : 5%; margin-top : 14%"><?php echo $btn_insert_speciality_text?></button>
                        </a>
                    </td>
                    <td>
                        <a href="insert_student.php/">
                            <button class="btnMenu" style="margin-left : 20%; margin-top : 14%"><?php echo $btn_insert_student_text?></button>
                        </a>
                    </td>
                </tr>
                <tr><td width="50%">
                        <a href="insert_status_student.php/">
                            <button class="btnMenu" style="margin-left : 5%; margin-top : 14%"><?php echo $btn_insert_status_student_text?></button>
                        </a>
                    </td>
                    <td>
                        <a href="load_file.php/">
                            <button class="btnMenu" style="margin-left : 20%; margin-top : 14%"><?php echo $btn_load_file_text?></button>
                        </a>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
    </body>
</html>