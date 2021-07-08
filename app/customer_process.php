<?php
		
		$moba = $_POST['moba'];
        $name = $_POST['name'];
        $addr = $_POST['addr'];

		require_once 'config/connect.php';

		$sql = "INSERT INTO `customer_list` (`mobile`, `name`, `address`, `time`) VALUES ('$moba', '$name', '$addr', now());";
		// set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // use exec() because no results are returned
        $conn->exec($sql);
        $conn = null;
        echo "<script>location.href='index.php'</script>";

	 ?>