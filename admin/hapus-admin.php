<?php
// include database connection file
include_once("koneksi.php");

// Get id from URL to delete that user
$id_user = $_GET['id_user'];

// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM admin WHERE id_user=$id_user");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:user-admin.php");
?>