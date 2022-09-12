<!DOCTYPE html>
<html lang="en">
<body>

<?php if($_POST){
    var_dump($_POST);
}

?>

<form action="" method="post">
<input list="browsers" name="browser" id="browser">

<datalist id="browsers">
  <option value="Edge">
  <option value="Firefox">
  <option value="Chrome">
  <option value="Opera">
  <option value="Safari">
</datalist>


<input type="submit" value="enviar">
</form>

</body>
</html>
