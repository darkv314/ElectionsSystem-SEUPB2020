<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stylesheet.css">
	<title>Menú Principal - Carreras</title>
</head>
<body>
	<?php
	include 'db_connection.php';

	$conn = OpenCon();

	//echo "Connected Successfully to Elections";

	?>
	<body style="font-family:Verdana;color:#aaaaaa;">
	  <div class="header">
	  <h1>Elecciones de Capitán 2020<br>SEUPB 2020</h1>
	</div>

	<div style="overflow:auto">
		<div class="col1">
	    <h2>Rumbo al UPB Match 2020</h2>
	    <p>El primer paso para apoyar a la camiseta y darlo todo por tu carrera</p>
	  </div>

	  <div class="main">
	    <h2>Selecciona tu Carrera/Escuela</h2>

			<form method="get" action="/vote.php">
				<table style="width:100%;" class="table">
					<?php
					$sql = "SELECT school FROM Candidates GROUP BY school";

					$result = $conn->query($sql);

					$cont = 0;

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							if ($cont == 0){
								$cont = 1;
								/*echo "<tr><th> <button type='submit' name='school' value='". $row["school"]."' class='button button1'>". $row["school"]."</button></th>";
								*/
								echo "<th><tr><button type='submit' name='school' value='". $row["school"]."' class='button button1'><image src='/images/". $row["school"].".png' width='256' height='256'><font size='6'>". $row["school"]."</font></input></th>";
							} else if ($cont == 1){
								$cont = 0;
								echo "<th><tr><button type='submit' name='school' value='". $row["school"]."' class='button button1'><image src='/images/". $row["school"].".png' width='256' height='256'><font size='6'>". $row["school"]."</font></input></th>";
							}
						}
					} else {
						echo "0 results";
					}

				CloseCon($conn);
				?>
				</table>
			</form>

	  </div>

	  <div class="col2">
	    <h2>Are you ready?</h2>
	    <p>****************************************</p>
	  </div>
	</div>

	<div class="footer">By Secretaría de Tecnología e Innovación - ISC 2020<br>
		SEUPB 2020 
	</div>

</body>
</html>
