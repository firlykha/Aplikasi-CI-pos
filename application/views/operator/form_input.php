<h3>Tambah Data Kategori</h3>
<?php
echo form_open('operator/post');
?>
<table border="1">
	<tr><td>Nama Lengkap</td>
		<td><input type="text" name="nama" placeholder="nama lengkap">
		</td></tr>
	<tr><td>Username</td>
		<td><input type="text" name="username" placeholder="username">
		</td></tr>
	<tr><td>Password</td>
		<td><input type="password" name="password" placeholder="password">
		</td></tr>
	<tr><td colspan="2"><button type="submit" name="submit">Simpan</button></td></tr>
</table>
</form>