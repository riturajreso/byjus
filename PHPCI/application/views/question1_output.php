<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<th>College Name</th>
		<th>Link</th>
		<?php
	foreach ($link as $key => $value) {
		echo '<tr>';
		echo '<td>'.$value['c_name'].'</td>';
		echo '<td>'.$value['c_url'].'</td>';
		echo '</tr>';
	}
?>
	</table>
	<div align="center">
		<form method="post" action="<?php echo base_url(); ?>question1/action">
			<input type="submit" name="export" value="Export">
		</form>
	</div>
</body>
</html>
