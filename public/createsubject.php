<?php
$title = "Create Subject";
include '../includes/layouts/top.php';
FindSelectedPage();
include '../includes/layouts/nav.php';
?>

<?php 
    if(isset($_POST['submit'])){
        
        $menuName = MysqlPrep($_POST["menuName"]);
        $position = (int) $_POST["position"];
        $visible = (int) $_POST["visible"];
        
        
        $query = "INSERT INTO subjects (menu_name, position, visible) "
                . "values({$menuName} ,{$position}, {$visible})";
                
        $result = mysqli_query($con, $query);
        
        if ($result) {
            //success
            RedirectTo("managecontent.php");
        } else {
            //fail
            RedirectTo("newsubject.php");
        }
        
    } else{
        RedirectTo('newsubject.php');
    }
?>



<?php 
if(isset($con)){
    mysqli_close($con);
}


   