<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>App</title>
</head>
<body>
		<div>
			<a href="index.php">Home</a>
			<a href="cashin.php">Cash In</a>
			<a href="customer.php">Customer</a>
			<a href="buy.php">Buy</a>
			<a href="view.php">All record</a>
			<a href="search.php">Search</a>
		</div>
		<br>
		<h2>Last transaction</h2>
		<?php 
			require_once 'config/connect.php';
						echo "<table style='border: solid 1px black;overflow-x:auto;border-collapse: collapse;width: 100%;height: 70px;'>";
			        	echo "<tr><th>Serial no </th><th> Time </th><th>Mobile no </th><th>Description</th><th>Price(kg) </th><th>Wight (kg) </th><th>Paid Amount</th></tr>";

			        class TableRows extends RecursiveIteratorIterator {
			          function __construct($it) {
			            parent::__construct($it, self::LEAVES_ONLY);
			          }

			          function current() {
			            return "<td style='width:auto;border:1px solid black;text-align: center'>" . parent::current(). "</td>";
			          }

			          function beginChildren() {
			            echo "<tr>";
			          }

			          function endChildren() {
			            echo "</tr>" . "\n";
			          }
			        }

			        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			          $stmt = $conn->prepare("SELECT * FROM `trans_list` ORDER BY no DESC LIMIT 1");
			          $stmt->execute();

			          // set the resulting array to associative
			          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			          foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
			            echo $v;
			          }
			        $conn = null;
			        echo "</table>";
		 ?>
		          <div class="center">
          <?php
          //geeting total amount tobe paid: 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "app";

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT SUM(`amount`) as total FROM trans_list ");
          $stmt->execute();

          // set the resulting array to associative
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $sum_of_paid = $row['total'];


          }catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;

          //getting total cashin:

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "app";

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT SUM(`amount`) as total FROM cash_in_list ");
          $stmt->execute();

          // set the resulting array to associative
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $totalCash = $row['total'];


          }catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;

        $remin = $totalCash-$sum_of_paid;

        echo "Total Cash In:  ";
        echo $totalCash;
        echo " Taka";
        echo "<br>";
        echo "Total Paid Amount :  ";
        echo $sum_of_paid;
        echo " Taka";
        echo "<br>";
        echo "Total Paid Amount :  ";
        echo $remin;
        echo " Taka";


          ?>

</body>
</html>