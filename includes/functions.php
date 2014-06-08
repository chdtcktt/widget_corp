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


function FindSubjectById($id) {
    //perform db query
    global $con;
    
    $safeSubjectId = mysqli_real_escape_string($con, $id);
    
    $query = "select * from subjects where id = {$safeSubjectId} limit 1";
    $result = mysqli_query($con, $query);
    ConfirmQuery($result);
    
    if($subject = mysqli_fetch_assoc($result)){
        return $subject;
    } else {
        return null;
    }
    return $result;
}

function FindPageById($id) {
    global $con;
    
    $safePageId = mysqli_real_escape_string($con, $id);
    
    $query = "select * from pages where id = {$safePageId} limit 1";
    $result = mysqli_query($con, $query);
    ConfirmQuery($result);
    
    if($page = mysqli_fetch_assoc($result)){
        return $page;
    } else {
        return null;
    }
    return $result;
}
