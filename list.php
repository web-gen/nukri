<?php

require_once('connect.php');

$query = 'SELECT * FROM projects';

$list = $connectdb->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>

td {
    padding: 10px;
    border: 1px solid coral;
}

</style>

<body>

    <form action="projects.html">

        <button type="submit">ADD PROJECT</button>

    </form>

    <table>

        <?php

        while ($row = $list->fetch()) {
    
            echo '<tr>';
    
            for ($i=1; $i<=10; $i++) {

                echo '<td>'.$row[$i].'</td>';
    
            }
        
            echo '<td>
                    <a href="edit.php?project='.$row[0].'">edit</a>
                  </td>
                  <td>
                    <form action="processor.php" method="POST">
                        <button type="submit" name="delete" value="'.$row[0].'">delete</button>
                    </form>
                  </td>
                </tr>';

        }

        ?>
    </table>

</body>

</html>