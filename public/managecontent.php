<?php
$title = 'Manage Content';
require_once '../includes/dbconnection.php';
require_once '../includes/functions.php';
include '../includes/layouts/top.php';
?>


<h2>Manage Content</h2>    

<?php $subjectSet = FindAllSubjects(); ?>
<nav>
    <ul class="list-group">
        <?php
        //user returned data
        foreach ($subjectSet as $subject) {
            ?>
            <li class="list-group-item"><?php
                echo $subject["menu_name"] . " (" .
                $subject["id"] . ")";
                ?>
                <?php
                $pageSet = FindPagesForSubject($subject["id"]);
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
    <?php } ?>
                </ul>
            </li>
<?php } ?>
    </ul>

</nav>


<?php
mysqli_free_result($result);
mysqli_free_result($pageSet);
include '../includes/layouts/bottom.php';

