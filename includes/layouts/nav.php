<nav>
    <ul class="list-group">
        <?php
        $subjectSet = FindAllSubjects();

        foreach ($subjectSet as $subject) {
            ?>

            <li class="list-group-item 
            <?php
            if ($currentSubject) {
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
                            if ($currentPage) {
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
    <?php
    if ($title != "New Subject") {
        echo "<a href=\"newsubject.php\">+ Add a Subject</a>";
    }
    ?>



</nav>
