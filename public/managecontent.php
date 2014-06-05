<?php 
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "widget_corp";
  
    $con = mysqli_connect($host, $user, $password, $database);
    
    if (mysqli_connect_errno()) {
        die("Database connection failed: ".
                mysqli_connect_error() . " " .
                mysqli_connect_errno()
            );
        
    }
    
    ?>

<?php 
$title = 'Manage Content';
require_once '../includes/functions.php';

//perform db query
$query = "select * from subjects where visible = 1 order by position ASC";
$result = mysqli_query($con, $query);
if (!$result) {
    die("db query failed!");
}
include '../includes/layouts/top.php';
?>

    
<h2>Manage Content</h2>    

<nav>
    <ul>
        <?php
        //user returned data
        foreach ($result as $value) {
            ?>
            <li><?php
            
            //var_dump($value);
            echo $value["menu_name"] ." (".
                    $value["id"]. ")";
            
            ?></li>
            <?php
        }
        ?>

    </ul>

</nav>

<?php
        mysqli_free_result($result);
?>
<?php
include '../includes/layouts/bottom.php';

mysqli_close($con);