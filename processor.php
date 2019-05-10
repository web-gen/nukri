<?php

require_once('connect.php');

if (isset($_POST['add'])) {


    if ($_POST['title'] == '') {

        echo 'project name is required';

    } else {
    
        $i=0;

        foreach ($_POST as $project) {

            $input[$i] = $project;
        
            $i++;
    
        }

        $query = "INSERT INTO projects (title, about, location_1, team, location_2, area, budget, current_status, client, consultants) 
            VALUES ('$input[0]', '$input[1]', '$input[2]', '$input[3]', '$input[4]', '$input[5]', '$input[6]', '$input[7]', '$input[8]', '$input[9]')";
    
        $connectdb->exec($query);

        $path = $input[0];

        mkdir($path);

        if ($_FILES['image']['size'] > 0) {
            
            copy($_FILES['image']['tmp_name'], $path.'/'.$_FILES['image']['name']);
        
        }

        header("location: list.php");

    }

}

if (isset($_POST['edit'])) {

    if ($_POST['title'] == '') {

        echo 'project name is required';

    } else {

        $i=0;

        foreach ($_POST as $project) {

            $input[$i] = $project;
        
            $i++;
    
        }

        $query = "UPDATE projects SET title = '$input[0]', about = '$input[1]', location_1 = '$input[2]', team = '$input[3]', location_2 = '$input[4]', area = '$input[5]', budget  = '$input[6]',
        current_status = '$input[7]', client = '$input[8]', consultants = '$input[9]' WHERE id = $input[10]";

        $connectdb->exec($query);

        header("location: edit.php?project=$input[10]");

    }

}

if (isset($_POST['delete'])) {

    $query = 'DELETE FROM projects WHERE id='.$_POST['delete'];

    $connectdb->exec($query);

    header("location: list.php");

}

?>