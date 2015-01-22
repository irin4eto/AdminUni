<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Menu</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="/AdminUni/css/structure.css">
        <script type="text/javascript" src="/AdminUni/js/control_label.js"></script>
        <style>
            td {
                padding-left: 3.4%;
                width: 25%;
            }
        </style>
    </head>
    <body>

        <?php
        header('Content-Type: text/html; charset=utf-8');
        include('/WebServiceSOAP/server.php');
        include('config_database.php');
        include('words_bg.php');
        if (!session_start()) {
         header("Location: unauthorized_error.php");
        }
        
        $conn = mysql_connect($localhost, $user, $pass);
        mysql_select_db($db, $conn);

        echo '<script type="text/javascript" src="/AdminUni/js/control_label.js">'
                     , 'koo();'
                     , '</script>'
                     ;
        
        if (isset($_POST['submit'])) {
            $are_validated = validate_university(filter_input_array(INPUT_POST)); 
            if($are_validated) {
                insert_university(filter_input_array(INPUT_POST));
                
                echo "
            <script type=\"text/javascript\" src=\"/AdminUni/js/control_label.js\">
              enable_label(\"success\", ". "'$message_success_insert_text');
            </script>
        ";
            } else {
                //header("Location: insert_university.php");
                echo '<script type="text/javascript" src="/AdminUni/js/control_label.js">'
                     , 'enable_label(', '"success"' , ',' , '$message_error_text', ');'
                     , '</script>'
                     ;
            }
        }
        
        $code_budged_from = select_code_budged_from();
        $code_basic_school_type = select_code_basic_school_type();
        $school_type_znp = select_school_type_znp();
        
        mysql_close($conn);
        ?>


        <form class="box submit" name="form" method="post" action="">
            <label id="success" name="success" style="vertical-align: middle;"></label>
            <table>
                <tr>
                    <td style="padding-top : 5%">
                        <label><?php echo $year_text ?></label>
                        <input type="text" tabindex="1" name="year" required>
                    </td>
                    <td style="padding-top : 5%">
                        <label><?php echo $period_text ?></label>
                        <input type="text" tabindex="1" name="period" required>
                    </td>
                    <td style="padding-top : 5%">
                        <label><?php echo $full_name_text ?></label>
                        <input type="text" tabindex="1" name="full_name" required>
                    </td>
                    <td style="padding-top : 5%">
                        <label><?php echo $short_name_text ?></label>
                        <input type="text" tabindex="1" name="short_name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="type_art17"><?php echo $type_art17_text ?></label>
                        <select name="type_art17" id="type_art17" style="height:35px; width: 285px">
                            <option value=""><?php echo $choice_text ?></option>
                            <?php foreach ($code_basic_school_type as $code_basic_school_type) { ?>
                                <option value="<?php echo $code_basic_school_type['BASICSCHOOLTYPEID']; ?>">
                                    <?php echo $code_basic_school_type['SCHOOLTYPENAME']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <label for="type_art11"><?php echo $type_art11_text ?></label>
                        <select name="type_art11" id="type_art11" style="height:35px; width: 285px">
                            <option value=""><?php echo $choice_text ?></option>
                            <?php foreach ($school_type_znp as $school_type_znp) { ?>
                                <option value="<?php echo $school_type_znp['SCHOOLTYPEID']; ?>">
                                    <?php echo $school_type_znp['SCHOOLTYPENAME']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <label for="financer"><?php echo $financer_text ?></label>
                        <select name="financer" id="financer" style="height:35px; width: 285px">
                            <option value=""><?php echo $choice_text ?></option>
                            <?php foreach ($code_budged_from as $code_budged_from) { ?>
                                <option value="<?php echo $code_budged_from['BUDGEDFROMID'] ; ?>">
                                    <?php echo $code_budged_from['BUDGEDFROMNAME'] ; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <label><?php echo $locationid_text ?></label>
                        <input type="text" tabindex="1" name="locationid" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><?php echo $postcode_text ?></label>
                        <input type="text" tabindex="1" name="postcode" required>
                    </td>

                    <td>
                        <label><?php echo $address_text ?></label>
                        <input type="text" tabindex="1" name="address" required>
                    </td>
                    <td>
                        <label><?php echo $phone_number1_text ?></label>
                        <input type="text" tabindex="1" name="phonenumber1" required>
                    </td>
                    <td>
                        <label><?php echo $phone_number2_text ?></label>
                        <input type="text" tabindex="1" name="phonenumber2">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><?php echo $phone_number3_text ?></label>
                        <input type="text" tabindex="1" name="phonenumber3">
                    </td>
                    <td>
                        <label><?php echo $phone_number4_text ?></label>
                        <input type="text" tabindex="1" name="phonenumber4">
                    </td>
                    <td>
                        <label><?php echo $phone_number5_text ?></label>
                        <input type="text" tabindex="1" name="phonenumber5">
                    </td>
                    <td>
                        <label><?php echo $fax_text ?></label>
                        <input type="text" tabindex="1" name="fax">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><?php echo $email_text ?></label>
                        <input type="text" tabindex="1" name="email">
                    </td>
                    <td>
                        <label><?php echo $site_text ?></label>
                        <input type="text" tabindex="1" name="site">
                    </td>
                    <td>
                        <label><?php echo $bulstat_text ?></label>
                        <input type="text" tabindex="1" name="bulstat">
                    </td>
                    <td>
                        <label><?php echo $year_establish_text ?></label>
                        <input type="text" tabindex="1" name="year_establish">
                    </td>
                </tr>
            </table>
            <footer>
                <input type="submit" style="margin-left : 42%; margin-top : -1%" class="btnMenu" name="submit" id="submit" value="Въведи данните" tabindex="1">
            </footer>
        </form>
    </body>
</html>

