<?php
		
		$moba = $_POST['moba'];
        $dis = $_POST['dis'];
        $price1 = $_POST['price'];
        $ty = $_POST['select'];
        $price2 = $price1/$ty;
        $wight = $_POST['wight'];
        $amount = $price2*$wight;

		require_once 'config/connect.php';

		$sql = "INSERT INTO `trans_list` (`date`, `mobile`, `s_description`, `price`, `wight`, `amount`) VALUES ( now(), '$moba', '$dis', '$price2', '$wight ', '$amount') ;";
		// set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // use exec() because no results are returned
        $conn->exec($sql);
        $conn = null;
        echo "<script>location.href='index.php'</script>";
	 ?>