<?php 
$title = 'Manage Content';
require_once '../includes/dbconnection.php';
require_once '../includes/functions.php';
include '../includes/layouts/top.php';
?>

    
<h2>Manage Content</h2>    

<?php
//perform db query
$query = "select * from subjects where visible = 1 order by position ASC";
$result = mysqli_query($con, $query);
ConfirmQuery($result);

?>
<nav>
    <ul class="list-group">
        <?php
        //user returned data
        foreach ($result as $subject) {
            ?>
            <li class="list-group-item"><?php
            
            echo $subject["menu_name"] ." (".
                    $subject["id"]. ")";
            
            ?>
                    <?php 
                    $query = "select * from pages where visible = 1 and subject_id = {$subject["id"]} order by position ASC";
                    $pageSet = mysqli_query($con, $query);
                    ConfirmQuery($pageSet);
                    
                    ?>
                <ul class="list-group">
                    <?php
                    foreach ($pageSet as $item) {
                    ?>
                    <li class="list-group-item">
                        <?php 
                        echo $item["menu_name"];
                        ?>

                    </li>
                    <?php }?>
                </ul>
            </li>
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

