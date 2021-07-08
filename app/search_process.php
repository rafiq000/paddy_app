<div class="center">
  <a href="index.php">Home</a>    
    <?php 
        $moba = $_POST['moba'];
        echo "<h1>Record of:</h1>";
        echo $moba;
        echo"<br><br>";

     ?>
    <?php
        echo "<table style='border: solid 1px black;overflow-y:auto;border-collapse: collapse;width: 100%;height: 70px;'>";
        echo "<tr><th>Mobile No</th><th>Customer_name</th><th>Customer Address</th><th>Time of Reg.</th></tr>";

        class TableRows2 extends RecursiveIteratorIterator {
          function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
          }

          function current() {
            return "<td style='width:150px;border:1px solid black;text-align: center;'>" . parent::current(). "</td>";
          }

          function beginChildren() {
            echo "<tr>";
          }

          function endChildren() {
            echo "</tr>" . "\n";
          }
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "app";

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM `customer_list`  WHERE `mobile`='$moba'; ");
          $stmt->execute();

          // set the resulting array to associative
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          foreach(new TableRows2(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
          }
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
        ?> 
        </div>
        <br><br>
       
        <div class="center">
          <h1>All cash</h1>
        <?php
        echo "<table style='border: solid 1px black;overflow:auto;border-collapse: collapse;width: 100%;height: 70px;'>";
        echo "<tr><th>No. </th><th>Discription</th><th>Taka</th></tr>";

        class TableRows1 extends RecursiveIteratorIterator {
          function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
          }

          function current() {
            return "<td style='width:150px;border:1px solid black;text-align: center;'>" . parent::current(). "</td>";
          }

          function beginChildren() {
            echo "<tr>";
          }

          function endChildren() {
            echo "</tr>" . "\n";
          }
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "app";

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM `trans_list` WHERE `mobile`='$moba';");
          $stmt->execute();

          // set the resulting array to associative
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          foreach(new TableRows1(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
          }

        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
        ?>
        </div>