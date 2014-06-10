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

<article>

    <?php echo Message();?>
    <h2>Edit Subject: <?php echo $currentSubject["menu_name"];?></h2>

    <form class="gen-form" action="createsubject.php" method="POST">
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
