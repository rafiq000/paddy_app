<?php
		
		$dis = $_POST['taka_detail'];
        $amount = $_POST['taka'];

		require_once 'config/connect.php';
		$sql = "INSERT INTO `cash_in_list` (`discription`, `amount`, `time`) VALUES ('$dis', '$amount', now());";
		// set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // use exec() because no results are returned
        $conn->exec($sql);
        $conn = null;
        echo "<script>location.href='index.php'</script>";

	 ?>