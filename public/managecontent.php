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

<?php include '../includes/layouts/nav.php'; ?>
<article>
    <h2>Manage Content</h2>
    <?php if ($selectedSubjectId) { ?>
        <?php $currentSubject = FindSubjectById($selectedSubjectId); ?>
        Menu Name: <?php echo $currentSubject["menu_name"]; ?>
    <?php } ?>
</article>
<?php
mysqli_free_result($subjectSet);
mysqli_free_result($pageSet);
include '../includes/layouts/bottom.php';

