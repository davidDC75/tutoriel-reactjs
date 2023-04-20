<?php
function asset($asset_name)
{
    $manifest = file_get_contents("./dist/dev/manifest.json");
    $manifest = json_decode($manifest, true); //decode json string to php associative array
    if (!isset($manifest[$asset_name])) return $asset_name; //if manifest.json doesn't contain $asset_name then return $asset_name itself
    return $manifest[$asset_name];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier pas avec react et webpack</title>
</head>
<body>
    <!-- https://jsramblings.com/creating-a-react-app-with-webpack/ -->
    <div id="root"></div>
    <a href="index.html" class="changeMode">PROD</a>
    <script src="<?php echo asset("main.js"); ?>"></script>
</body>
</html>