<?php
$title = "New Subject";
require_once '../includes/session.php';
include '../includes/layouts/top.php';
FindSelectedPage();
include '../includes/layouts/nav.php';
?>

<article>

    <?php echo Message();?>
    <h2>Create Subject</h2>

    <form class="gen-form" action="createsubject.php" method="POST">
        <div class="form-group">
            <label>Menu Name</label>
            <input type="text" name="menuName" value="" class="form-control" />
        </div>

        <div class="form-group">
            <label>Position</label>
            <select class="form-control" name="position">

                <?php
                $subjectSet = FindAllSubjects();
                $subjectCount = mysqli_num_rows($subjectSet);

                for ($count = 1; $count <= ($subjectCount + 1); $count++) {
                    echo "<option value=\"{$count}\">{$count}</option>";
                }
                ?>

            </select>
        </div>

        <div class="form-group">
            <label>Visible</label>
            <input type="radio" name="visible" value="0" /> No
            &nbsp;
            <input type="radio" name="visible" value="1" /> Yes

        </div>

        <input type="submit" name="submit" class="btn btn-group" value="Create Subject"/>
        <a href="managecontent.php">Cancel</a>



    </form>    
</article>


<?php
include '../includes/layouts/bottom.php';
