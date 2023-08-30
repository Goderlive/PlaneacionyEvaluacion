<?php
require_once 'models/conection.php';
    $sql = "SELECT * FROM pdm_objetivos ";
    $stm = $con->query($sql);
    $objetivos = $stm->fetchAll(PDO::FETCH_ASSOC);
    
    function estrategias($con, $id){
        $sql = "SELECT * FROM pdm_estrategias WHERE id_objetivo = $id";
        $stm = $con->query($sql);
        return $estrategias = $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function lineas($con, $id){    
        $sql = "SELECT * FROM pdm_lineas WHERE id_estrategia = $id";
        $stm = $con->query($sql);
        return $lineas = $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $prin = array();
    
    foreach ($objetivos as $o) {
        $objetivo = array(
            "name" => $o['nombre_objetivo'],
            "id" => $o['id_objetivo'],
            "estrategias" => array()
        );
    
        $estrategias = estrategias($con, $o['id_objetivo']);
        foreach ($estrategias as $estrategia) {
            $estrategiaItem = array(
                "name" => $estrategia['nombre_estrategia'],
                "id" => $estrategia['id_estrategia'],
                "lineas" => array()
            );
    
            $lineas = lineas($con, $estrategia['id_estrategia']);
            foreach ($lineas as $linea) {
                $lineaItem = array(
                    "name" => $linea['nombre_linea'],
                    "id" => "linea-" . $linea['id_linea']
                );
                $estrategiaItem['lineas'][] = $lineaItem;
            }
    
            $objetivo['estrategias'][] = $estrategiaItem;
        }
    
        $prin[] = $objetivo;
    }
    ?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>
var subjectObject = <?php echo json_encode($prin, JSON_PRETTY_PRINT); ?>;

window.onload = function() {
  var subjectSel = document.getElementById("subject");
  var topicSel = document.getElementById("topic");
  var chapterSel = document.getElementById("chapter");

  for (var x in subjectObject) {
    console.log(x)
    subjectSel.options[subjectSel.options.length] = new Option(x, x);
  }
  subjectSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    chapterSel.length = 1;
    topicSel.length = 1;
    //display correct values
    for (var y in subjectObject[this.value]) {
      topicSel.options[topicSel.options.length] = new Option(y, y);
    }
  }
  topicSel.onchange = function() {
    //empty Chapters dropdown
    chapterSel.length = 1;
    //display correct values
    var z = subjectObject[subjectSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
    }
  }
}
</script>
</head>   
<body>

<h1>Cascading Dropdown Example</h1>

<form name="form1" id="form1" action="/action_page.php">
Subjects: <select name="subject" id="subject">
    <option value="" selected="selected">Select subject</option>
  </select>
  <br><br>
Topics: <select name="topic" id="topic">
    <option value="" selected="selected">Please select subject first</option>
  </select>
  <br><br>
Chapters: <select name="chapter" id="chapter">
    <option value="" selected="selected">Please select topic first</option>
  </select>
  <br><br>
  <input type="submit" value="Submit">  
</form>

</body>
</html>
