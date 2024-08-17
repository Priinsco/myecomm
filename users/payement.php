<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>payement</h1>
    <h3>Welcome <?=$_SESSION["username"];?></h3>
    <h3>Welcome <?=$_SESSION["user_email"];?></h3>
    <?php 
        // success message and error message

        
        if(isset($successQuerryMessage)){
            echo "<p class='alert text-center'>". $successQuerryMessage ."</p>";
        } else if(isset($failQuerryMessage)){
            echo "<p class='alert alert-warning text-center text-danger mb-0'>". $failQuerryMessage ."</p>";
        }
        ?>
</body>
</html>