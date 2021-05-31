<!-- 
 $conn = new mysqli("localhost", "ariefbsc_dfour", "bismillah76", "ariefbsc_dfoursite");
 $conn = new mysqli("localhost", "root", "", "dfoursite");
 -->
<?php
	$conn = new mysqli("localhost", "root", "", "dfoursite");
	if ($conn->connect_errno) {
		echo "Failed to connect to MySQL: " .$conn->connect_error;
	}
?>			