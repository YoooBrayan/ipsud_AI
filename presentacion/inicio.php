	<div class="container">
		<div class="row">
		<?php include 'encabezado.php';?>
		</div>
		<div class="row">
			<div class="col-8">
				<div class="card">
					<div class="card-header bg-primary text-white">Bienvenido</div>
					<div class="card-body">
						<img src="img/inicio.jpg" width="100%">
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-header bg-primary text-white">Autenticacion</div>
					<div class="card-body">
						<form action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&nos=true" method="post">
							<div class="form-group">
								<input type="email" name="correo" class="form-control" placeholder="Correo" required="required">
							</div>
							<div class="form-group">
								<input type="password" name="clave" class="form-control" placeholder="Clave" required="required">
							</div>
							<button type="submit" class="btn btn-primary">Autenticar</button>
						</form>
						<a href=<?php echo "index.php?pid=" . base64_encode("presentacion/registro.php") . "&nos=true" ?>>Registrese Gratis</a>	
					</div>
				</div>
			</div>
		</div>
	</div>