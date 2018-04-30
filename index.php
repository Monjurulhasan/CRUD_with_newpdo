<?php 
	$con = new PDO('mysql:host=localhost;dbname=femily', 'root', '');
	$statement = $con->prepare('select * from friends order by id desc');
	$statement->execute();
	$friends = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>


<div class="container">
	<table class="table table-bordered">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Address</th>
			<th>Age</th>
			<th>Action</th>
		</tr>
		<?php foreach ($friends as $friend) : ?>
			<tr>
				<td><?php echo $friend->id; ?></td>
				<td><?php echo $friend->name; ?></td>
				<td><?php echo $friend->address; ?></td>
				<td><?php echo $friend->age; ?></td>
				<td>
					<a class="btn btn-sm btn-outline-danger" href="update.php?id=<?php echo $friend->id ?>">Edit</a> |
					<a class="btn btn-sm btn-outline-danger" href="delete.php?id=<?php echo $friend->id ?>">Delete</a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
</div>
<?php require 'footer.php'; ?>