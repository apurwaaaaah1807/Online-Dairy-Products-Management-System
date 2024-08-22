<?php
$con = pg_connect(
    'host=localhost port=5432 dbname=dairy user=postgres password=root'
);
pg_query('delete from contact where id=' . $_GET['id']);
header('Location: feedbacks.php');
?>
