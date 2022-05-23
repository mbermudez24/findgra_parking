<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM invoices where id =".$_GET['id']);
foreach($qry->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	
	<form action="" id="manage-factura">	
    <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
    <div class="form-group">
			<label for="name">Identificacion</label>
			<input type="text" name="id" id="id" class="form-control" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="name">Importe</label>
			<input type="text" name="importe" id="importe" class="form-control" value="<?php echo isset($meta['importe']) ? $meta['importe']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Monto</label>
			<input type="text" name="monto" id="monto" class="form-control" value="<?php echo isset($meta['monto']) ? $meta['monto']: '' ?>" required  autocomplete="off">
		</div>
        <div class="form-group">
			<label for="username">Cambio</label>
			<input type="text" name="cambio" id="cambio" class="form-control" value="<?php echo isset($meta['cambio']) ? $meta['cambio']: '' ?>" required  autocomplete="off">
		</div>

		

	</form>
</div>
<script>
	$('.select2').select2({
		placeholder:"Porfavor selecciona aquí",
		width:"100%"
	})
	
	$('#manage-factura').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_factura',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Datos guardados exitosamente",'success')
					setTimeout(function(){
						location.reload()
					},500)
				}else{
					$('#msg').html('<div class="alert alert-danger">Error en la factura</div>')
					end_load()
				}
			}
		})
	})
	if($('#type').val() == 1){
			$('#window-field').hide()
		}else{
			$('#window-field').show()
		}
</script>
