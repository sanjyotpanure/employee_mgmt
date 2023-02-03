<?php

session_start();

    if (!isset($_SESSION['admin_username'])) {
        ?><script>alert("You are logged out!");</script>
        <?php
        header('location: admin_login.php');
    }
?>
<head>
    <?php include 'links.php' ?>
    <?php include 'add_employee.php' ?>
    
</head>
<body>

</body>
</html>
