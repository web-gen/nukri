<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <?php 
    
    if (isset($_GET['project'])) {

        require_once('connect.php');

        $query = "SELECT * FROM projects WHERE id=".$_GET['project'];

        $row = $connectdb->query($query);

        $project = $row->fetch(PDO::FETCH_ASSOC);

    } 
    ?>
    
    <?php if (isset($_GET['project'])) :?>

    <form action="processor.php" method="POST" target="blank">

        <label for="title">name</label><br>
        <input type="text" id="title" name="title" value="<?php echo($project['title']); ?>"><br><br>

        <label for="about">description</label><br>
        <textarea name="about" id="about" cols="30" rows="10"><?php echo($project['about']); ?></textarea><br><br>

        <label for="location_1">location</label><br>
        <textarea name="location_1" id="location_1" cols="30" rows="10"><?php echo($project['location_1']); ?></textarea><br><br>

        <label for="team">team</label><br>
        <textarea name="team" id="team" cols="30" rows="10"><?php echo($project['team']); ?></textarea><br><br>

        <label for="location_2">location</label><br>
        <input type="text" id="location_2" name="location_2" value="<?php echo($project['location_2']); ?>"><br><br>

        <label for="area">area</label><br>
        <input type="text" id="area" name="area" value="<?php echo($project['area']); ?>"><br><br>

        <label for="budget">budget</label><br>
        <input type="text" id="budget" name="budget" value="<?php echo($project['budget']); ?>"><br><br>

        <label for="current_status">status</label><br>
        <input type="text" id="current_status" name="current_status" value="<?php echo($project['current_status']); ?>"><br><br>

        <label for="client">client</label><br>
        <input type="text" id="client" name="client" value="<?php echo($project['client']); ?>"><br><br>

        <label for="consultants">consultants</label><br>
        <input type="text" id="consultants" name="consultants" value="<?php echo($project['consultants']); ?>"><br><br>

        <input type="hidden" name="id" value="<?php echo($_GET['project']); ?>">

        <button type="submit" name="edit">edit</button>

    </form>

<?php  endif; ?>

</body>

</html>