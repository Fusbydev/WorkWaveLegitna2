<?php
include_once "connection.php";
    $acceptId = $_GET['accept'];
    $username = $_GET['username'];
    $sql = "UPDATE pending_services set status = 'accepted' WHERE id = '$acceptId'";
    mysqli_query($conn, $sql);
?>
<script type="text/javascript">window.location="listing.php?username=<?php echo $username; ?>";</script>