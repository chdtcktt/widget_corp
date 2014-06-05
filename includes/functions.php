<?php

function ConfirmQuery($result) {
    if (!$result) {
        die("db query failed!");
    }
}


function FindAllSubjects() {
    
    //perform db query
    global $con;
    $query = "select * from subjects where visible = 1 order by position ASC";
    $result = mysqli_query($con, $query);
    ConfirmQuery($result);

    return $result;
}


function FindPagesForSubject($subjectId) {

    global $con;
    $query = "select * from pages where visible = 1 and subject_id = {$subjectId} order by position ASC";
    $pageSet = mysqli_query($con, $query);
    ConfirmQuery($pageSet);
    
    return $pageSet;
}
