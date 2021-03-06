@extends('index')
@section('content')
<form method="post" class="col-md-4">
			<br>
			<br>
				<legend>Add New User</legend>
				<?php if (isset($flash['errors'])): ?>
					<p class="text-error"><?php echo $flash['errors']; ?> </p>
				<?php endif; ?>
				<div class="form-group">
						 		<div class="form-group">
							    <label for="nombre">Add name</label>
							    <input type="text" class="form-control" name="nombre" placeholder="name">
							  </div>
							  <div class="form-group">
							    <label for="apellido">Last name</label>
							    <input type="text" class="form-control" name="apellido" placeholder="Last">
							  </div>
							  <div class="form-group">
							    <label for="email">Add email</label>
							    <input type="text" class="form-control" name="correo" placeholder="email">
							  </div>
				</div>
				<div class="form-group" style="height:20px;">
						<?php if (isset($flash['message'])): ?>
								<p class="text-success"><?php echo $flash['message'] ?></p>
						<?php endif; ?>
				</div>
				<button type="submit" class="btn btn-primary">Guardar</button>
				<a href="../list" class="btn btn-primary">Regresar</a>
			</form>
@stop