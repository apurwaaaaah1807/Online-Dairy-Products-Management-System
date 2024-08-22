<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header('Location: index.php');
    return;
}

$con = pg_connect(
    'host=localhost port=5432 dbname=dairy user=postgres password=root'
);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $uom = $_POST['uom'];
    $price = $_POST['price'];
    $disc = $_POST['disc'];
    $category = $_POST['category'];
    $units = $_POST['units'];

    pg_query(
        $con,
        "insert into products(prod_desc, prod_uom, prod_price, prod_disc, prod_units, category) values('$name', '$uom', $price, $disc, $units, '$category')"
    );

    $target_file = $id . '.jpg';
    move_uploaded_file(
        $_FILES['imgurl']['tmp_name'],
        'products/' . $target_file
    );
}

$result = pg_query($con, 'select last_value from products_prod_id_seq');
$row = pg_fetch_row($result);
$id = $row[0] + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }

	td,th{
		padding: 10px;
	}
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
  	<?php include_once 'side-bar.php'; ?>
  <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Welcome <b><u><?= $_SESSION['name'] ?></u></b></p>
      </div>
      <div class="row" style="padding: 5px;">

<form method='post' enctype="multipart/form-data">
<table align='center' width="50%">
<tr>
	<td><b>ID:</b></td>
	<td><input type='text' name='id' value="<?= $id ?>" readOnly></td>
</tr>
<tr>
	<td><b>Name:</b></td>
	<td><input type='text' name='name' required></td>
</tr>
<tr>
	<td><b>Unit of Measure:</b></td>
	<td><input type='text' name='uom' required></td>
</tr>
<tr>
	<td><b>Price:</b></td>
	<td><input type='number' name='price' min=10 max=3500 required></td>
</tr>
<tr>
	<td><b>Discount(%):</b></td>
	<td><input type='number' name='disc' min=5 max=10 required></td>
</tr>
<tr>
	<td><b>Category:</b></td>
	<td>
    <select name="category" required>
      <option value="">Select Category</option>
      <option value="Milk">Milk</option>
      <option value="Paneer">Paneer</option>
      <option value="Lassi">Lassi</option>
      <option value="Butter">Butter</option>
      <option value="Chass">Chass</option>
      <option value="Cheese">Cheese</option>
      <option value="Dhai">Dhai</option>
    </select>
  </td>
</tr>
<tr>
	<td><b>Units:</b></td>
	<td><input type='number' name='units' min=0 max=1000 required></td>
</tr>
<tr>
	<td><b>Photo:</b></td>
	<td><input type='file' name='imgurl' required></td>
</tr>
<tr>
	<td align='center'><input type='submit' value='ADD' class='btn btn-warning' name="submit"></td>
	<td align='center'><input type='reset' value='CLEAR' class='btn btn-warning'></td>
</tr>
</table>
</form>
<br>

        <?php $rs = pg_query(
            $con,
            'select * from products order by prod_id'
        ); ?>

        <h3>Products List</h3>

        <table id="tableID" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>UOM</th>
                <th>Price(Rs.)</th>
                <th>Discount(%)</th>
                <th>Units</th>
                <th>Category</th>
                <th></th>
		        <th></th>
            </tr>
        </thead>
        <tbody>
    <?php while ($row = pg_fetch_assoc($rs)) { ?>
            <tr>
                <td><?= $row['prod_id'] ?></td>
                <td><img src='products/<?= $row['prod_id'] ?>.jpg' alt=""></td>
                <td><?= $row['prod_desc'] ?></td>
                <td><?= $row['prod_uom'] ?></td>
                <td><?= $row['prod_price'] ?></td>
                <td><?= $row['prod_disc'] ?></td>
                <td><?= $row['prod_units'] ?></td>
                <td><?= $row['category'] ?></td>
                <td><a href="delete-product.php?id=<?= $row[
                    'prod_id'
                ] ?>" class="btn btn-warning" onclick="return confirm('Delete?')">Delete</a></td>
		        <td><a href="update-product.php?id=<?= $row[
              'prod_id'
          ] ?>" class="btn btn-warning">Update</a></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
    
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function() {
		$('#tableID').DataTable({ });
	});
</script>

</body>
</html>
