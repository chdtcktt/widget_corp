<?php
$title = "Edit Subject";
require_once '../includes/session.php';
include '../includes/layouts/top.php';
FindSelectedPage();
include '../includes/layouts/nav.php';

if(!$currentSubject){
    RedirectTo("managecontent.php");
}

?>


<?php 
//process post

    if(isset($_POST['submit'])){
        
        $id = $currentSubject["id"];
        $menuName = MysqlPrep($_POST["menuName"]);
        $position = (int) $_POST["position"];
        $visible = (int) $_POST["visible"];
        
        
        $query = "update subjects set "
                . "menu_name = '{$menuName}', "
                . "position = {$position}, "
                . "visible = {$visible} "
                . "where id = {$id} "
                . "limit 1";
                
                
        $result = mysqli_query($con, $query);
        
        if ($result && mysqli_affected_rows($con) == 1) {
            //success
            $_SESSION["message"] = "Subject edited.";
            RedirectTo("managecontent.php");
        } else {
            //fail
            $_SESSION["message"] = "Subject edit falied.";
        }
        
    } 
?>


<article>

    <?php echo Message();?>
    <h2>Edit Subject: <?php echo $currentSubject["menu_name"];?></h2>
        
    <form class="gen-form" action="editsubject.php?subject=<?php echo $currentSubject["id"]; ?>" method="POST">
        <div class="form-group">
            <label>Menu Name</label>
            <input type="text" name="menuName" value="<?php echo $currentSubject["menu_name"];?>" class="form-control" />
        </div>

        <div class="form-group">
            <label>Position</label>
            <select class="form-control" name="position">

                <?php
                $subjectSet = FindAllSubjects();
                $subjectCount = mysqli_num_rows($subjectSet);

                for ($count = 1; $count <= $subjectCount; $count++) {
                    echo "<option value=\"{$count}\"";
                    if($currentSubject["position"] == $count){
                        echo " selected";
                    }
                    
                    echo ">{$count}</option>";
                }
                ?>

            </select>
        </div>

        <div class="form-group">
            <label>Visible</label>
            <input type="radio" name="visible" value="0" <?php if($currentSubject["visible"] == 0){ echo "checked";}?> /> No
            &nbsp;
            <input type="radio" name="visible" value="1" <?php if($currentSubject["visible"] == 1){ echo "checked";}?>/> Yes

        </div>

        <input type="submit" name="submit" class="btn btn-group" value="Edit Subject"/>
        <a href="managecontent.php">Cancel</a>



    </form>    
</article>


<?php
include '../includes/layouts/bottom.php';
