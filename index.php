<?php
require_once("imagen.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<style>
		#cargaexterna{text-align:center;}
	</style>
</head>
<body>

<?php
$imagen=new imag();



$con=$imagen->val_enlase();

?>
<form action="" id="form">
<select id="pais" name="pais">
	<?php
		for($i=0;$i<count($con);$i++){
			?>
			<option id="<?php echo $con[$i]['code'];?>"><?php echo $con[$i]["name"];?></option>
			<?php
		}

	?>
</select>
</form>
<div id="cargaexterna"></div>

<?php


#print_r($mapa->paises($con));

?>

</body>

<script type="text/javascript">


	$("#pais").find("option").click(function(){
		var data=$("#form").serialize();
		var ids= $(this).attr('id');
		$("#cargaexterna").html('<img src="cargar.gif" class="img">');
		console.log(ids);
		  $.post( "mapa.php",{code:ids,name:data},function( datas ){
    $("#cargaexterna").html(datas);
  });
	});

</script>
</html>
