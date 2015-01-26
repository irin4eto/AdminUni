<!DOCTYPE HTML>
<html>
    <head>
        <title>University</title>
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
                    //if (!session_start()) {
                    //header("Location: unauthorized_error.php");
                    //}

                    $message = $message_error_insert_text;

                    if (isset($_POST['submit'])) {
                        $input_data = filter_input_array(INPUT_POST);
                        $are_validated = validate_university($input_data);
                        if ($are_validated == TRUE) {
                            if(insert_university($input_data) == TRUE) {
                              $message = $message_success_insert_text;   
                            } else {
                                $message = $message_error_insert_text;
                            }
                        } else {
                            $message = $are_validated;
                        }
                        echo '<label id="btn_message" name="btn_message" style="text-align:center: middle;">'
                        . "$message". '</label>';
                    } 

                    $code_budged_from = select_code_budged_from();
                    $code_basic_school_type = select_code_basic_school_type();
                    $school_type_znp = select_school_type_znp();
                    $location = select_locations();

                    ?>


                    <form class="box submit" name="form" method="post" action="">

                        <table>
                            <tr>
                                <td style="padding-top : 2%">
                                    <label><?php echo $year_text ?></label>
                                    <input type="text" tabindex="1" name="year" >
                                </td>
                                <td style="padding-top : 2%">
                                    <label><?php echo $period_text ?></label>
                                    <input type="text" tabindex="1" name="period" >
                                </td>
                                <td style="padding-top : 2%">
                                    <label><?php echo $full_name_text ?></label>
                                    <input type="text" tabindex="1" name="full_name" >
                                </td>
                                <td style="padding-top : 2%">
                                    <label><?php echo $short_name_text ?></label>
                                    <input type="text" tabindex="1" name="short_name" >
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
                                            <option value="<?php echo $code_budged_from['BUDGEDFROMID']; ?>">
                                                <?php echo $code_budged_from['BUDGEDFROMNAME']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <label for="location"><?php echo $locationid_text ?></label>
                                    <select name="locationid" id="locationid" style="height:35px; width: 285px">
                                        <option value=""><?php echo $choice_text ?></option>
                                        <?php foreach ($location as $location) { ?>
                                            <option value="<?php echo $location['EKATTEID']; ?>">
                                                <?php echo $location['EKATTENAME']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?php echo $postcode_text ?></label>
                                    <input type="text" tabindex="1" name="postcode" >
                                </td>

                                <td>
                                    <label><?php echo $address_text ?></label>
                                    <input type="text" tabindex="1" name="address" >
                                </td>
                                <td>
                                    <label><?php echo $phone_number1_text ?></label>
                                    <input type="text" tabindex="1" name="phonenumber1" >
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
                        <footer style="margin-top : 2%; height : 58px">
                            <input type="submit" style="margin-left : 42%; margin-top : -0.3%" 
                                   class="btnMenu" name="submit" id="submit" value="Въведи данните" tabindex="1">
                        </footer>
                    </form>
                </body>
                </html>

