<?php
	//$result = 0;
	if (isset($_POST['v2'])) {
		
		$client = new SoapClient('http://localhost:10002/calculadora?wsdl');
		$options = array('location' => 'http://localhost:10002/calculadora');


		$arguments = array($_POST['v1'], $_POST['v2']);
		if (isset($_POST['somar'])) {
			$function = 'Somar';

		}

		elseif (isset($_POST['substrair'])) {
			$function = 'Substrair';
		}

		elseif (isset($_POST['multiplicar'])) {
			$function = 'Multiplicar';
		}

		elseif (isset($_POST['dividir'])) {
			$function = 'Dividir';
		}
		$result = $client->__soapCall($function, $arguments, $options);
		print_r($result);
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Calculadora SOAP</title>
</head>
<body>
	<form name="form1" method="post" action="index.php">
		<label for="v1">Valor 1</label>
		<input type="text" name="v1" id="v1" required>
		<label for="v2">Valor 2</label>
		<input type="text" name="v2" id="v2" required>
		<input type="submit" name="somar" value="somar">
		<input type="submit" name="substrair" value="substrair">
		<input type="submit" name="multiplicar" value="multiplicar">
		<input type="submit" name="dividir" value="dividir">

	</form>
</body>
</html>