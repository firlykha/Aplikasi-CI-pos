<h3>Data Operator</h3>
<?php
echo anchor('operator/post','Tambah Data')
?>
<table border="1">
	<tr><th>No</th><th>Nama Lengkap</th><th>Username</th><th>Login Terakhir</th><th colspan="2">Operasi</th></tr>
	<?php
	$no=1;
	foreach ($record->result() as $r) 
	{
		echo "<tr>
			<td>$no</td>
			<td>$r->nama_lengkap</td>
			<td>$r->username</td>
			<td>$r->last_login</td>
			<td>".anchor('operator/edit/'.$r->operator_id,'Edit')."</td>
			<td>".anchor('operator/delete/'.$r->operator_id,'Delete')."</td>
			</tr>";
		$no++;
	}          
	?>
	
</table>