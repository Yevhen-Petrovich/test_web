<?php
require "media\php\db.php";
unset($_SESSION['logged_user']);
$status = $_SESSION['logged_user'];
if ($status == '')
    {echo '<script>window.location.href = "index.php";</script>';}
else {echo "Error";}
?>