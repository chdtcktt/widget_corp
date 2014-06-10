<?php
$title = 'Manage Content';
include '../includes/layouts/top.php';
FindSelectedPage();
include '../includes/layouts/nav.php';
?>

<article>

    <?php if ($currentSubject) { ?>
        <h2>Manage Content</h2>
        Menu Name: <?php echo $currentSubject["menu_name"]; ?>
    <?php } ?>

    <?php if ($currentPage) { ?>
        <h2>Manage Page</h2>
        Page Name: <?php echo $currentPage["menu_name"]; ?>
    <?php } ?>

</article>
<?php
mysqli_free_result($subjectSet);
mysqli_free_result($pageSet);
include '../includes/layouts/bottom.php';

