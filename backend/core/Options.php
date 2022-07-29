<?php


function createOptions(PDO $DB){
    $query = $DB->prepare("SELECT * FROM cms_options");

    $query->execute();

    $options = array();

    while ($row = $query->fetch()){
        $options[$row["options_name"]] = $row['options_value'];
    }

    return $options;
}


