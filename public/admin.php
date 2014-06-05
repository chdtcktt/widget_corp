<?php 
$title = "Administration";
require_once '../includes/functions.php';
include '../includes/layouts/top.php';
?>
<header>
<h1>Widget Corp</h1>    
</header>

<ul>
    <li><a href="manage_content.php">Manage Website Content</a></li>
    <li><a href="manage_admins.php">Manage Admin</a></li>
    <li><a href="logout.php">Logout</a></li>

</ul>


<?php 
include '../includes/layouts/bottom.php';