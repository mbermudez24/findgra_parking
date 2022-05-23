
<style>
	.collapse a{
		text-indent:10px;
	}

	.sidebar-decoration{
		padding-left: 20px;
	}
</style>
<nav id="sidebar" class='mx-lt-5' style='background-color: #089000' >
		
		<div class="sidebar-list">
				<?php if($_SESSION['login_type'] == 1): ?>

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Página Principal</a>
				<a  class="nav-item nav-manage_park nav-collapse" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><span class='icon-field'><i class="fa fa-map"></i></span> Parqueadero <span class="float-right"><i class="fa fa-angle-down"></i></span></a>
				<div class="collapse" id="collapseExample">
					<a href="index.php?page=manage_park" class="nav-item nav-manage_park"> Ingreso</a>	
					<a href="index.php?page=park_list" class="nav-item nav-park_list"> Lista</a>
					<a href="index.php?page=manage_reservation" class="nav-item nav-park_list"> Reserva</a>	
				</div>
				<a href="index.php?page=category" class="nav-item nav-category"><span class='icon-field'><i class="fa fa-list"></i></span> Categoría</a>	
				<a href="index.php?page=location" class="nav-item nav-location"><span class='icon-field'><i class="fa fa-map"></i></span> Área Parqueo</a>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Usuarios</a>
			
				<a href="index.php?page=reservations" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-calendar-check"></i></span> Reservaciones</a>
				<a href="index.php?page=facturas" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-receipt"></i></span> Facturas</a>

				<div class="sidebar-decoration">
					<a class="navbar-brand" href="#"><img src="./assets/img/flogo.png" width="200"></a>
					<a class="navbar-brand" href="#"><img src="./assets/img/um.png" width="200"></a>
				</div>
			<?php else: ?>
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Inicio</a>
				<a href="index.php?page=manage_reservation" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-calendar-plus"></i></span> Reserva</a>
			<?php endif; ?>
		</div>
<i class="fa-solid fa-receipt"></i>
</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
