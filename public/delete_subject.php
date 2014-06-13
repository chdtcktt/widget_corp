<?php
$title = 'Manage Content';
require_once '../includes/session.php';
include '../includes/layouts/top.php';
FindSelectedPage();
include '../includes/layouts/nav.php';
?>


<?php 
$currentSubject = FindSubjectById($_GET["subject"]);

if(!$currentSubject){
    RedirectTo("managecontent.php");
}
$id = $currentSubject["id"];
$query = "delete from subjects where id = {$id} limit 1";
$result = mysqli_query($con, $query);

  if ($result && mysqli_affected_rows($con) == 1) {
            //success
            $_SESSION["message"] = "Subject deleted.";
            RedirectTo("managecontent.php");
        } else {
            //fail
            $_SESSION["message"] = "Subject delete failed.";
            RedirectTo("managecontent.php?subject={$id}");
        }

?>

<?php
mysqli_free_result($subjectSet);
mysqli_free_result($pageSet);
include '../includes/layouts/bottom.php';