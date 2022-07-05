<?php
    include_once "db_empresa.php";
    $con=mysqli_connect($db_host,$db_user,$db_pass,$db_database);
    $query="SELECT nombre,precioVenta,categoria from productos where id=".$_GET['id'].";";
    $res=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($res);
    if($row){
?>
<style>
    table{
        width: 100%;
        border: 1px;
    }
    td,th{
        width: 33%;
        border: 1px solid #000;
    }
    thead{
        font-weight: bold;
        text-align: center;
    }
</style>
    <table cellspacing="0">
        <thead>
            <tr>
                <th colspan="3" >Productos</th>
            </tr>
            <tr>
                <th>Nombre</th>
                <th>Precio de venta</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['precioVenta'] ?></td>
                <td><?php echo $row['categoria'] ?></td>
            </tr>
        </tbody>
    </table>
<?php
    }else{
        echo "No hay datos";
    }
?>

<?php

use Dompdf\Dompdf;

include_once "dompdf/autoload.inc.php";
$pdf=new Dompdf();
$html=file_get_contents("http://localhost/php/producto.php?id=2");
$pdf->loadHtml($html);
$pdf->setPaper("A7","landingpage");
$pdf->render();
$pdf->stream();