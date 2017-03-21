<?php
    //Ná í API
    $apiURL = "http://apis.is/petrol";
    $apiJsonContents = file_get_contents($apiURL);
    $apiTotal = json_decode($apiJsonContents, true);
    $api = $apiTotal['results'];

    //Ná í JSON
    $jsonFileContents = file_get_contents('myndir.json');
    $json = json_decode($jsonFileContents, true);
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Verkefni 6</title>
        <style>body{margin:0 auto;width:800px;}ul{list-style-type:none;}</style>
    </head>
    <body>

        <h1>JSON</h1>

        <table border="1">
        <tr>
            <th>Image name</th>
            <th>Image</th>
            </tr>
            <?php 
                foreach ($json as $key => $value) {
                    echo "<tr><th>", $key , "</th><td><img src='", $value , "' width='420px' height='420px'></td></tr>";          
                }
             ?>
        </table>

        <div style="border: 3px solid black; padding: 2px; margin: 2px; width: 500px;">
        <form action="insert.php" method="post">

        <label>Image name: </label>
        <input type="text" name="imageName" required><br>
        
        <label>Image: </label>
        <input type="text" name="imagePath" required placeholder="URL"><br>

        <input type="submit">

        </form>
        </div>

        <h1>API</h1>

        <table border="1">
            <tr>
                <th>Company</th>
                <th>Name</th>
                <th>95. Okt</th>
                <th>Diesel</th>
            </tr>
                <?php
                    $i = 0;
                    foreach ($api as $key) {
                        echo("<tr><th>". $key['company'] ."</th><th>". $key['name'] ."</th><th>". $key['bensin95'] ."</th><th>". $key['diesel'] ."</th></tr>");
                        $i++;
                    }
                    
                ?>
        </table>
    </body>
</html>