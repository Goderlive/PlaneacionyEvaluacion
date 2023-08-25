<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- Source: -->
<select id="source" name="source">
     <option>MANUAL</option>
     <option>ONLINE</option>
</select>

<!-- Status: -->
<select id="status" name="status">
    <option>OPEN</option>
    <option>DELIVERED</option>
</select>


<script>
    $(document).on('ready', function () {

$("#source").on('change', function () {
    var el = $(this);
    if (el.val() === "ONLINE") {
        $("#status").append("<option>SHIPPED</option>");
    } else if (el.val() === "MANUAL") {
        $("#status option:last-child").remove();
    }
});

});
</script>
    
</body>
</html>