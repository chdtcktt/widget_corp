<?php 
$title = 'Manage Content';
require_once '../includes/dbconnection.php';
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
    <ul class="list-group">
        <?php
        //user returned data
        foreach ($result as $value) {
            ?>
            <li class="list-group-item"><?php
            
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