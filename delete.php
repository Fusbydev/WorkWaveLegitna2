<?php
include_once "connection.php";
$idDelete = $_GET['delete'];
$username = $_GET['username']; 
mysqli_query($conn, "DELETE FROM pending_services WHERE id='$idDelete'");
?>   
<script type="text/javascript">window.location="table.php?username=<?php echo $username; ?>";</script>
