<?php

if (!session_start()) {
 header("Location: unauthorized_error.php");
} 
include('/../config_database.php');

$conn = mysql_connect($localhost, $user, $pass);
mysql_select_db($db, $conn);

function validate_university($post_data) {
    include('/../words_bg.php');

    $year = $post_data['year'];
    if (empty($year) || !is_int((int)$year) || strlen(strval($year)) != 4) {
        return sprintf($message_error_text, $year_text);
    }

    $period = $post_data['period'];
    if (empty($period) || !is_int((int)$period) || strlen(strval($period)) != 1) {
        return sprintf($message_error_text, $period_text);
    }

    $full_name = $post_data['full_name'];
    if (empty($full_name) || trim($full_name) == '' || !is_string($full_name) || strlen($full_name) > 200) {
        return sprintf($message_error_text, $full_name_text);
    }

    $short_name = $post_data['short_name'];
    if (empty($short_name) || trim($short_name) == '' || !is_string($short_name) || strlen($short_name) > 50) {
        return sprintf($message_error_text, $short_name_text);
    }

    $type_art17 = $post_data['type_art17'];
    if (empty($type_art17) || strlen(strval($type_art17)) != 1) {
        return sprintf($message_error_text, $type_art17_text);
    }

    $type_art11 = $post_data['type_art11'];
    if (empty($type_art11) || strlen(strval($type_art17)) != 1) {
        return sprintf($message_error_text, $type_art11_text);
    }

    $financer = $post_data['financer'];
    if (empty($financer) || strlen(strval($type_art17)) > 2) {
        return sprintf($message_error_text, $financer_text);
    }

    $locationid = $post_data['locationid'];
    if (empty($locationid) || strlen(strval($type_art17)) > 6) {
        return sprintf($message_error_text, $locationid_text);
    }

    $postcode = $post_data['postcode'];
    if (empty($postcode) || !is_int((int)$postcode) || strlen(strval($type_art17)) > 4) {
        return sprintf($message_error_text, $postcode_text);
    }

    $address = $post_data['address'];
    if (empty($address) || trim($address) == '' || !is_string($address) || strlen($address) > 50) {
        return sprintf($message_error_text, $address_text);
    }

    $phonenumber1 = $post_data['phonenumber1'];
    if (empty($phonenumber1) || !is_int((int)$phonenumber1) || strlen(strval($phonenumber1)) > 15) {
        return sprintf($message_error_text, $phone_number1_text);
    }

    $phonenumber2 = $post_data['phonenumber2'];
    if (!empty($phonenumber2) && (!is_int((int)$phonenumber2) || strlen(strval($phonenumber2)) > 15)) {
        return sprintf($message_error_text, $phone_number2_text);
    }

    $phonenumber3 = $post_data['phonenumber3'];
    if (!empty($phonenumber3) && (!is_int((int)$phonenumber3) || strlen(strval($phonenumber3)) > 15)) {
        return sprintf($message_error_text, $phone_number3_text);
    }

    $phonenumber4 = $post_data['phonenumber4'];
    if (!empty($phonenumber4) && (!is_int((int)$phonenumber4) || strlen(strval($phonenumber4)) > 15)) {
        return sprintf($message_error_text, $phone_number4_text);
    }

    $phonenumber5 = $post_data['phonenumber5'];
    if (!empty($phonenumber5) && (!is_int((int)$phonenumber5) || strlen(strval($phonenumber5)) > 15)) {
        return sprintf($message_error_text, $phone_number5_text);
    }

    $fax = $post_data['fax'];
    if (empty($fax) || !is_numeric($fax) || strlen(strval($fax)) > 15) {
        return sprintf($message_error_text, $fax_text);
    }

    $email = $post_data['email'];
    if (empty($email) || trim($email) == '' || !is_string($email) || strlen($email) > 50 || 
            !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return sprintf($message_error_text, $email_text);
    }

    $site = $post_data['site'];
    if (empty($site) || trim($site) == '' || !is_string($site) || strlen($site) > 50) {
        return sprintf($message_error_text, $site_text);
    }

    $bulstat = $post_data['bulstat'];
    if (empty($bulstat) || trim($bulstat) == '' || !is_string($bulstat) || strlen($bulstat) != 9) {
        return sprintf($message_error_text, $bulstat_text);
    }

    $year_establish = $post_data['year_establish'];
    if (empty($year_establish) || !is_int((int)$year_establish) || strlen(strval($year_establish)) != 4) {
        return sprintf($message_error_text, $year_establish_text);
    }

    return TRUE;
}

function insert_university($post_data) {
    global $conn;
    
    $sql = "INSERT INTO UNIVERSITY(`YEAR`, `PERIOD`, `FULLNAME`, `SHORTNAME`, 
                                   `TYPEART17`, `TYPEART11`, `FINANCER`, `LOCATIONID`,
                                   `POSTCODE`, `ADDRESS`, `PHONENUMBER1`, `PHONENUMBER2`,
                                   `PHONENUMBER3`, `PHONENUMBER4`, `PHONENUMBER5`, `FAX`, 
                                   `EMAIL`, `SITE`, `BULSTATNUMBER`, `YEARESTABLISH`)
              VALUES ('".$post_data['year']."', '".$post_data['period']."', '".$post_data['full_name']."', '"
                        .$post_data['short_name']."', '".$post_data['type_art17']."', '".$post_data['type_art11']."', '" 
                        .$post_data['financer']."', '".$post_data['locationid']."', '".$post_data['postcode']."', '"
                        .$post_data['address']."', '".$post_data['phonenumber1']."', '".$post_data['phonenumber2']."', '"
                        .$post_data['phonenumber3']."', '".$post_data['phonenumber4']."', '".$post_data['phonenumber5']."', '"
                        .$post_data['fax']."', '".$post_data['email']."', '".$post_data['site']."', '"
                        .$post_data['bulstat']."', '".$post_data['year_establish']."')";
    mysql_query($sql, $conn);
    if(!mysql_errno()) {
        mysql_query("COMMIT");
        return TRUE;
    } else {
        //echo(mysql_error());
        return FALSE;
    }
    mysql_close($conn);
}

function select_code_budged_from() {
    $sql = "SELECT BUDGEDFROMID, BUDGEDFROMNAME FROM CODEBUDGEDFROM";
    $sql_result = mysql_query($sql) or die(mysql_error());
    $result = array();
    while ($row = mysql_fetch_array($sql_result)) {
        array_push($result, array('BUDGEDFROMID' =>  $row['BUDGEDFROMID'], 
            'BUDGEDFROMNAME' => $row['BUDGEDFROMNAME']));
    }
    return $result;
}

function select_code_basic_school_type() {
    $sql = "SELECT BASICSCHOOLTYPEID, SCHOOLTYPENAME FROM CODEBASICSCHOOLTYPE";
    $sql_result = mysql_query($sql) or die(mysql_error());
    $result = array();
    while ($row = mysql_fetch_array($sql_result)) {
        array_push($result, array('BASICSCHOOLTYPEID' =>  $row['BASICSCHOOLTYPEID'], 
            'SCHOOLTYPENAME' => $row['SCHOOLTYPENAME']));
    }
    return $result;
}

function select_school_type_znp() {
    $sql = "SELECT SCHOOLTYPEID, SCHOOLTYPENAME FROM CODESCHOOLTYPEZNP";
    $sql_result = mysql_query($sql) or die(mysql_error());
    $result = array();
    while ($row = mysql_fetch_array($sql_result)) {
        array_push($result, array('SCHOOLTYPEID' =>  $row['SCHOOLTYPEID'], 
            'SCHOOLTYPENAME' => $row['SCHOOLTYPENAME']));
    }
    return $result;
    
}

function select_locations() {
    $sql = "SELECT EKATTEID, EKATTENAME FROM TEKATTE";
    $sql_result = mysql_query($sql) or die(mysql_error());
    $result = array();
    while ($row = mysql_fetch_array($sql_result)) {
        array_push($result, array('EKATTEID' =>  $row['EKATTEID'], 
            'EKATTENAME' => $row['EKATTENAME']));
    }
    return $result;
    
}

function close_conn() {
    global $conn;
    mysql_close($conn);
}

$server = new SoapServer(null, array(
      'uri' => "urn://www.herong.home/res",
      'soap_version' => SOAP_1_2));
$server->addFunction("validate_university");
$server->addFunction("insert_university");
$server->addFunction("select_code_budged_from");
$server->addFunction("select_code_basic_school_type");
$server->addFunction("select_school_type_znp");
#$server->handle();

?>
