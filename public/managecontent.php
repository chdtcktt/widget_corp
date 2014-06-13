<?php
$title = 'Manage Content';
require_once '../includes/session.php';
include '../includes/layouts/top.php';
FindSelectedPage();
include '../includes/layouts/nav.php';
?>

<article>
        <?php echo Message();?>
    <?php if ($currentSubject) { ?>
        <h2>Manage Subject</h2>
        Menu Name: <?php echo $currentSubject["menu_name"]; ?>    
        <br/>
        Position: <?php echo $currentSubject["position"]; ?>
        <br/>
        Visible: <?php echo $currentSubject["visible"] == 1 ? 'yes' : 'no'; ?>
        <br/>
        <a href="editsubject.php?subject=<?php echo htmlentities($currentSubject["id"]); ?>">Edit Subject</a>

    <?php } ?>
        

    <?php if ($currentPage) { ?>
        <h2>Manage Page</h2>
        Page Name: <?php echo htmlentities($currentPage["menu_name"]); ?>
        <br/>
        Position: <?php echo $currentPage["position"]; ?>
        <br/>
        Visible: <?php echo $currentPage["visible"] == 1 ? 'yes' : 'no'; ?>
        <br/>
        Content: 
        <br/>
        <div class="well">
                <?php echo htmlentities($currentPage["content"]);?>
            
        </div>
    <?php } ?>

</article>
<?php
mysqli_free_result($subjectSet);
mysqli_free_result($pageSet);
include '../includes/layouts/bottom.php';

