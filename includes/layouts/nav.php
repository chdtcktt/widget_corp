<nav>
    <ul class="list-group">
        <?php
        $subjectSet = FindAllSubjects();

        foreach ($subjectSet as $subject) {
            ?>

            <li class="list-group-item 
            <?php
            if ($currentSubject == $subject) {
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
                    foreach ($pageSet as $page) {
                        ?>


                        <li class="list-group-item
                            <?php
                            if ($currentPage == $page) {
                                echo "selected";
                            }
                            ?>">



                            <a href="managecontent.php?page=<?php echo urlencode($page["id"]); ?>">
                                <?php
                                echo $page["menu_name"];
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
