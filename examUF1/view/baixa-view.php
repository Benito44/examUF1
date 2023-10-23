<!-- ex6 -->
<!DOCTYPE html>
<!-- Benito Martinez Florido -->
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../Estils/estils.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <form method="$_POST" action="../controller/donar-baixa.php">
        Estas segur que et vols donar de baixa? Els teus articles no seran borrats<br>
        <input type="text" id="baixa"  size="100" maxlength="100" placeholder = "Per donar-te de baixa escriu:Si">
    <input type="submit" value="Borrar" onclick="baixa()">
    <span class="error">
		<?php if(!isset($error)){
		$error;
	        }else{echo $error;}?>
	</span>     
</form>
        <a href="index.php">Torna al index</a>
    </body>
</html>

