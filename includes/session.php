<?php 

session_start();


function Message() {
    
    if (isset($_SESSION["message"])) {
        $output = "<div class=\"alert alert-info\">" . htmlentities($_SESSION["message"]) . "</div>";
        
        
        //clear message after use
        $_SESSION["message"] = null;
            
        return $output;

    }

}
