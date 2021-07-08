<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Costomer</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
		<div class="center">
			<a href="index.php" class="button">Home</a>
			<form action="trans_process.php" method="post">
				Mobile No:<input type="text" name="moba"  placeholder="Enter Costomer Mobile No!">
				Goods Name:<input type="text" name="dis"  placeholder="Enetre Paddy name here!">
				Price:<input type="number" name="price" placeholder="Enter Price Per MON">
				Select price type:<select name="select" placeholder="Select An option">>
					<option value="37.5">1.In Bangla 37.5kg = 1 mon</option>
					<option value="40">1.In Kg = 40 kg = 1mon</option>
				</select>
				Wight:<input type="number" name="wight" placeholder="Enter Wight In KG">
											<br>
											<br>
				<input type="submit" name="submit" value="Submit" class="button">
				<input type="reset" class="button">
			</form>
			
		</div>
		
</body>
</html>