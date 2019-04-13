<?php
include('../../includes/conn.php');
echo 'nam';
if(!empty($_POST['specialist'])){
	$d = $_POST['specialist'];
	echo 'nam';
	$query = "SELECT DISTINCT did,name FROM doctor WHERE specialist='".$d."' AND availability='Available'";
	$res = mysqli_query($con,$query);?>
	<?php
	while($row = mysqli_fetch_assoc($res)){
		?>
		<option value="<?php echo $row['did'];?>"><?php echo $row['name']; ?></option> 
		<?php
	}?>
	<?php
}
?>