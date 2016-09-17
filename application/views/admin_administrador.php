<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
        if($this->session->flashdata("message") != null){
          echo $this->session->flashdata("message");
        }
	?>
	<table id="tabla_usuarios">
		<thead>
			<tr>
				<th>#</th>
				<th>Usuario</th>
				<th>Nombre</th>
				<th>Privilegios</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$cont = 1;
				if(isset($usuarios)){
					foreach ($usuarios as $row) {
						echo "<tr>";
						echo "<td>".$cont."</td>";
						/*echo "<td>".$row['usuario']."</td>";
						echo "<td>".$row['nombre']." ".$row['apellido_paterno']." ".$row['apellido_materno']."</td>";
						echo "<td>".$row['privilegios']."</td>";*/
						echo "<td>".$row->usuario."</td>";
						echo "<td>".$row->nombre." ".$row->apellido_paterno." ".$row->apellido_materno."</td>";
						echo "<td>".$row->privilegios."</td>";
						$eliminar_text = "<td><form method='post' action='".base_url()."dashboard/administrador_delete_user'><input type='hidden' name='usuario' value='".$row->usuario."'><button>Eliminar</button></form></td>";
						echo $row->privilegios < 99 ? $eliminar_text : "";
						echo "</tr>";
						$cont++;
					}
				}
			?>
		</tbody>
	</table>
	<form id="form_create_user" action="<?=base_url()?>dashboard/administrador_create_user" method="post">
		Usuario:
		<input type="text" name="usuario" required>
		Password:
		<input type="password" name="password" required>
		Nombre:
		<input type="text" name="nombre" required>
		Apellido Paterno:
		<input type="text" name="ape_pat" required> 
		Apellido Materno:
		<input type="text" name="ape_mat" required>

		<select name="privilegios" form="form_create_user" >
			<option value="50" selected>Auxiliar</option>
			<option value="99">Administrador</option>
		</select>
		<input name="submit" type="submit" value="Registrar">
	</form>
</body>
</html>