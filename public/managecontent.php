<?php
$title = 'Manage Content';
require_once '../includes/dbconnection.php';
require_once '../includes/functions.php';
include '../includes/layouts/top.php';
?>


<?php
if (isset($_GET["subject"])) {
    $selectedSubjectId = $_GET["subject"];
    $selectedPageId = null;
} elseif (isset($_GET["page"])) {
    $selectedPageId = $_GET["page"];
    $selectedSubjectId = null;
} else {
    $selectedSubjectId = null;
    $selectedPageId = null;
}
?>

<h2>Manage Content</h2>    

<nav>
    <ul class="list-group">
        <?php
//user returned data
        $subjectSet = FindAllSubjects();

        foreach ($subjectSet as $subject) {
            ?>

            <li class="list-group-item 
            <?php
            if ($subject["id"] == $selectedSubjectId) {
                echo "selected";
            }
            ?>">             



                <a href="managecontent.php?subject=<?php echo urlencode($subject["id"]) ?>">
                <?php echo $subject["menu_name"] ?>
                </a>

                <?php
                $pageSet = FindPagesForSubject($subject["id"]);
                ?>
                <ul class="list-group">
                    <?php
                    foreach ($pageSet as $item) {
                        ?>
                    
                    
                        <li class="list-group-item
                            <?php
                            if ($item["id"] == $selectedPageId) {
                                echo "selected";
                            }
                            ?>">
                            
                            
                            
                            <a href="managecontent.php?page=<?php echo urlencode($item["id"]); ?>">
        <?php
        echo $item["menu_name"];
        ?>
                            </a>       


                        </li>
    <?php } ?>
                </ul>
            </li>
<?php } ?>
    </ul>

</nav>


<?php
mysqli_free_result($subjectSet);
mysqli_free_result($pageSet);
include '../includes/layouts/bottom.php';

