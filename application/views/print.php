<html>

<head>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 50;
}

th {
    text-align: left;
}
</style>
</head>
<body>
<table>
  <tr>
      <th colspan="3">SALARY SLIP</th>  
  </tr>
<?php
$i=0;
foreach($data AS $key){  ?>
  <tr> <td><?php echo $column_name[$i]; ?></td> <td><?php echo $key; ?></td> </tr>
<?php
++$i;
} ?>

</table>

</body>
</html>
