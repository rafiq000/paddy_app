<?php 
		$servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "app";
        
        $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 ?>