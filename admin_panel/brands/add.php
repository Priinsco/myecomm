<?php 
     require_once __DIR__ . '/../../database.php';
     require("addBrandActions.php");

?>
<h3 class="text-dark mt-2 text-center">Ajouter des marques pour vos produits</h3>
<?php 
if(isset($successQuerryMessage)){
    echo "<div class='container text-light text-center bg-success'>". $successQuerryMessage ."</p></div>";
}else if(isset($failQuerryMessage)){
    echo "<div class='container text-light text-center bg-danger'>". $failQuerryMessage ."</p></div>";
}
?>
<form action="" method="post" class="mb-2 ">
    <div class="input-group my-5">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receip"></i></span>
        <input type="text" class="form-control" placeholder="Ajouter des marques" aria-label="brand_name" name="brand_name" aria-describedby="basic-addon1">
        <button type="submit" class="btn btn c-orange" name="ajouter"> Ajouter</button>
    </div>
</form>