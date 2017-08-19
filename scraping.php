<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Scraping</title>
</head>

<body>
<?php
$htmlBN = file_get_contents('http://www.bncr.fi.cr/BNCR/Default.aspx');
$htmlBN = trim(strip_tags($htmlBN));
$htmlBN = explode(':', $htmlBN);

$htmlBN[1] = substr(preg_replace('/\s+/', '', $htmlBN[1]), 0, 6);
$htmlBN[2] = substr(preg_replace('/\s+/', '', $htmlBN[2]), 0, 6);

echo "<h1>Banco Nacional</h1>Compra $htmlBN[1] <br> Venta $htmlBN[2]";

$htmlBCR = file_get_contents('https://www.bancobcr.com/js/tipoCambio/BUS/actual_formato.asp?i=ES');

$htmlBCR = trim(strip_tags($htmlBCR));
$htmlBCR = explode('$', $htmlBCR);
$htmlBCR[1] = substr(preg_replace('/\s+/', '', $htmlBCR[1]), -6);
$ventaBCR = $htmlBCR[2];
$ventaBCR = explode('€', $ventaBCR);
$ventaBCR[0] = substr(preg_replace('/\s+/', '', $ventaBCR[0]), -6);

echo "<h1>Banco de Costa Rica</h1>Compra $htmlBCR[1] <br> Venta $ventaBCR[0]";

echo "<h1>BAC</h1>";
$htmlBac = file_get_contents('https://www.baccredomatic.com/es-cr');
//print_r($htmlBac);

?>

</body>

</html>

