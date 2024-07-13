<?php
include ("connect.php");
$nis = (isset($_POST['nis'])) ? htmlentities($_POST['nis']) : "";

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM biodata WHERE nis='$nis'");
    if (!$query) {
        $message = '<script>alert("data tidak terhapus")</script>';
    } else {
        $message = '<script>alert("data terhapus"); window.location="../biodata"</script>';
    }
    echo $message;
}
?>