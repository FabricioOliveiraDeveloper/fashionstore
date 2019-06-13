<?php

	function DBConnect(){
		$sql = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die(mysqli_error());
	
		return $sql;
	}
	
	function DBClose($sql){	
		@mysqli_close($sql) or die (mysqli_error($sql));
	}
?>