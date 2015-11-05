@extends('index')
@section('content')
		<div class="col-md-6">
			<h1>list of users</h1>
			<table class="table">
			<thead>
			<tr>
				<th>Name</th>
				<th>Last Name</th>
				<th>email</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
				<tbody>
				<?php foreach ($usuarios as $key => $value): ?>
			<tr>
				<td class="info">{{$value['nombre']}}</td>
				<td class="warning">{{$value['apellido']}}</td>
				<td class="danger">{{$value['correo']}}</td>
				<td class="active"><a href="edit/{{$value['id']}}/profile">
				<span class='glyphicon glyphicon-edit'></span></a></td>

				<td class="active"><a href="del/{{$value['id']}}/profile">
				<span class='glyphicon glyphicon-trash'></span></a></td>
			</tr>
		</tbody>
				<?php endforeach; ?>
			</table>
				<a href="new/profile" class="btn btn-primary">Add profile</a>
			</div>
		</div>
	</div>
@stop
