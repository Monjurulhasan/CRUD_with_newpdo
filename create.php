<?php 
if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['age']) ) {
	$con = new PDO('mysql:host=localhost;dbname=femily', 'root', '');
	$statement = $con->prepare('insert into friends(name, address, age) values(:name, :address, :age)');
	$statement->execute([
		':name' => $_POST['name'],
		':address' => $_POST['address'],
		':age' => $_POST['age']
	]);
	header("Location: /");
	}
 ?>
 
<?php require 'header.php'; ?>
<div class="container">
	<div class="card">
		<div class="card-header">
			<h3>All friends</h3>
		</div>
		<div class="card-body">
			<form action="" method="post">
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="Type your name">
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					<input type="text" id="address" name="address" class="form-control" placeholder="Type your address">
				</div>
				<div class="form-group">
					<label for="age">Age:</label>
					<input type="int" name="age" id="age" class="form-control" placeholder="Type your age">
				</div>
				<button type="submit" class="btn btn-outline-success">Add Friends</button>
			</form>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>