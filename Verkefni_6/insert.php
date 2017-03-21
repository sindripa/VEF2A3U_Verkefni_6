<?php
	$imageName = $_POST['imageName'];
	$imagePath = $_POST['imagePath'];
	$jsonFileContents = file_get_contents('myndir.json');
    $json = json_decode($jsonFileContents, true);
    $json[$imageName] = $imagePath;
    $jsonEncodedContents = json_encode($json);
	file_put_contents('myndir.json', $jsonEncodedContents);
?>
<a href="index.php">Til baka</a>