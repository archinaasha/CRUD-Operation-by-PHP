<?php

require_once ("../task1/php/component.php");
require_once ("../task1/php/operation.php");

Createdb();

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medicine Shop</title>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="style.css">




</head>
<body>
	<main>
		<div class="container text-center">
			<h1 class="py-4 bg-info text-light rounded"><i class="fas fa-pills"></i> Medicine Shop</h1>
		</div>
		<div class="d-flex justify-content-center">
			<form action="" method="post" class="w-50">
				<div class="pt-2">
					<?php inputElement("<i class='fas fa-id-badge'></i>","ID", "medicine_id",setID()); ?>
				</div>
				<div class="pt-2">
					<?php inputElement("<i class='fas fa-tablets'></i>","Medicine Name", "medi_name",""); ?>
				</div>
				<div class="row pt-2">
					<div class="col">
						<?php inputElement("<i class='fas fa-prescription-bottle-alt'></i>","Type", "type",""); ?>
					</div>
					<div class="col">
						<?php inputElement("<i class='fas fa-dollar-sign'></i>","Price", "m_price",""); ?>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
					<?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
					<?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
					<?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
				</div>
			</form>
		</div>
		<div class="d-flex table-data">
			<table class="table table-striped table-info">
				<thead class="thead-info">
					<tr>
						<th>ID</th>
						<th>Medicine Name</th>
						<th>Type</th>
						<th>Price</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody id="tbody">
					<?php


					if(isset($_POST['read'])){
						$result = getData();

						if($result){

							while ($row = mysqli_fetch_assoc($result)){ ?>

								<tr>
									<td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
									<td data-id="<?php echo $row['id']; ?>"><?php echo $row['medi_name']; ?></td>
									<td data-id="<?php echo $row['id']; ?>"><?php echo $row['type']; ?></td>
									<td data-id="<?php echo $row['id']; ?>"><?php echo '$' . $row['price']; ?></td>
									<td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
								</tr>

								<?php
							}

						}
					}


					?>
				</tbody>
			</table>
		</div>

	</main>



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<script src="../task1/php/main.js"></script>

</body>
</html>