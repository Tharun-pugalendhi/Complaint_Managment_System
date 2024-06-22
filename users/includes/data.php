<?php require 'config.php'; ?>
<table border = 1>
  <tr>
    <td>complaintNumber</td>
    <td>userId</td>
    <td>subcategory</td>
    <td>complaintType</td>
    <td>state</td>
    <td>complaintDetails</td>
    <td>complaintType</td>
  </tr>
  <?php
  $i = 1;
  $rows = mysqli_query($conn, "SELECT * FROM tb_data");
  foreach($rows as $row) :
  ?>
  <tr>
    <td> <?php echo $i++; ?> </td>
    <td> <?php echo $row["name"]; ?> </td>
    <td> <?php echo $row["age"]; ?> </td>
    <td> <?php echo $row["country"]; ?> </td>
  </tr>
  <?php endforeach; ?>
</table>