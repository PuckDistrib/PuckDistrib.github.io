<?php
$pages_id = [
    "index" => "Home",
    "weland" => "Weland",
    "puck" => "Puck",
    //    "images" => "Images",
    "case_studies" => "Case Studies",
    "contacts" => "Contacts"
];

function active_class ($value) {
    if($GLOBALS['active_flag'] == $value)
        return ' class="active" ';
    else
        return "";
}

function dl_link($key, $text){
    $links = [
        "puck" => "puck-distrib-2016-03-23-142441.tgz",
        "freemind" => "freemind-0.9.0_study_case-2016-03-11.tgz",
        "screen" => "screen_study_case-2016-03-11.tgz"
    ];

    if(array_key_exists($key, $links))
        return '<a href="' . $links[$key] . '"/>' . $text . '</a>';
    else
        return $key . " : BROKEN LINK";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <link rel="icon" href="puck.ico">
        <title>Puck/Weland - an architecture refactoring suite</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" >
   </head>

    <body>
        <div class="container">

            <div id="content">
                <nav>
                    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <?php
                 foreach($pages_id as $pid => $ptitle){
                     echo "<li",  active_class($pid), "><a href=\"$pid.php\">$ptitle</a></li>";
                 }
             ?>
                    </ul>
                </nav>
