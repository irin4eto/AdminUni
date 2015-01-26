
function disable_label(labelid) {
    document.getElementById(labelid).style.display = 'none';
    document.getElementById(labelid).style.display = 'block';
}
;

function koo() {
    alert("vfd");
}
;

function enable_label(labelid, post_data) {
    '<?php include("/AdminUni/WebServiceSOAP/server.php");?>';
    '<?php include("/AdminUni/words_bg.php");?>';

    var is_validated = '<? php validate_university({0})?>'.format(post_data);
    var label = document.getElementById(labelid);
    if (is_validated) {
        label.innerHTML = '<?php echo $message_success_insert_text; ?>';
    } else {
        label.innerHTML = '<?php echo $message_error_text; ?>';
    }

    //document.getElementById("btn_message").style.display= "visibility";
    //document.getElementById("btn_message").innerHTML = message;
}
;



