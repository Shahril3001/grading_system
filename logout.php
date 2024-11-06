<html>
<head>
<title>Log Out</title>
</head>
<body>

<?php
session_unset();
session_destroy();
header("location:index.php");
exit();
?>
</body>
</html>