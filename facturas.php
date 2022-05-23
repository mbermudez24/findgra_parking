<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				<button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button" id="new_factura">
					<i class="fa fa-plus"></i> Crear factura
				</button>
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-condensed table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Importe</th>
									<th class="">Monto</th>
									<th class="">Cambio</th>
									<th class="text-center">Acción</th>
								</tr>
							</thead>
							<tbody>
							<?php
 					include 'db_connect.php';
 					$users = $conn->query("SELECT * FROM invoices ");
 					$i = 1;
 					while($row= $users->fetch_assoc()):
				 ?>
				 <tr>
				 	<td class="text-center">
					 <?php echo ucwords($row['id']) ?>
				 	</td>
				 	<td>
				 		<?php echo ucwords($row['amount_due']) ?>
				 	</td>
				 	
				 	<td>
				 		<?php echo $row['amound_tendered'] ?>
				 	</td>
					 <td>
				 		<?php echo $row['amount_change'] ?>
				 	</td>
				 	<td>
				 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary">Acción</button>
								  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Editar</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Eliminar</a>
								  </div>
								</div>
								</center>
				 	</td>
				 </tr>
				<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	
</style>
<script>
	$('#new_factura').click(function(){
		uni_modal("Nueva factura","manage_facturas.php")
	})
	
	$('.edit_location').click(function(){
		uni_modal("Editar Ubicación de Vehículo","manage_location.php?id="+$(this).attr('data-id'))
		
	})
	$('.delete_location').click(function(){
		_conf("¿Estás segur@ de eliminar esta ubicación?","delete_location",[$(this).attr('data-id')])
	})
	
	function delete_location($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_location',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Datos eliminados exitósamente",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>