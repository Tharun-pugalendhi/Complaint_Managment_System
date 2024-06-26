
<?php


session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Closed Complaints</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>

<body>


<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Not Yet Process Complaints</h3>
							</div>
							<div class="module-body table">


							
								
								
<tbody>
<?php
// Execute the query
$query = mysqli_query($bd, "SELECT tblcomplaints.*, users.fullName AS name 
                            FROM tblcomplaints 
                            JOIN users ON users.id = tblcomplaints.userId 
                            WHERE tblcomplaints.status IS NULL 
                            AND tblcomplaints.subcategory = 'Electricity Department'
                            ORDER BY tblcomplaints.priority DESC");

// Check if there are any complaints
if ($query) {
    // Display table header
    //echo "<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" >";
    echo "<table cellpadding='0' cellspacing='0' border='0' class=' table table-bordered table-striped display'>";
	echo "<thead><tr><th><strong>Complaint No</strong></th><th>Complainant Name</th><th>Reg Date</th><th>Status</th><th>Action</th></tr></thead>";
    echo "<tbody>";

    // Loop through fetched complaints and display each row
    while ($row = mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>" . htmlentities($row['complaintNumber']) . "</td>";
        echo "<td>" . htmlentities($row['name']) . "</td>";
        echo "<td>" . htmlentities($row['regDate']) . "</td>";
        echo "<td><button type='button' class='btn btn-danger'>Not processed yet</button></td>";
        echo "<td><a href='complaint-details.php?cid=" . htmlentities($row['complaintNumber']) . "'>View Details</a></td>";
        echo "</tr>";
    }

    // Close table
    echo "</tbody></table>";
} else {
    // Handle case when no complaints are found
    echo "No complaints found.";
}
?>





										</tbody>
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>

<?php } ?>