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
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <title>Premier pas avec react et webpack</title>
</head>
<body>
    <!-- https://fr.reactjs.org/tutorial/tutorial.html -->
    <!-- https://codepen.io/gaearon/pen/oWWQNa -->
    <div id="errors"></div>
    <div id="root"></div>
    <script>
        window.addEventListener('mousedown', function(e) {
            document.body.classList.add('mouse-navigation');
            document.body.classList.remove('kbd-navigation');
        });

        window.addEventListener('keydown', function(e) {
            if (e.keyCode === 9) {
                document.body.classList.add('kbd-navigation');
                document.body.classList.remove('mouse-navigation');
            }
        });

        window.addEventListener('click', function(e) {
            if (e.target.tagName === 'A' && e.target.getAttribute('href') === '#') {
                e.preventDefault();
            }
        });

        window.onerror = function(message, source, line, col, error) {
            var text = error ? error.stack || error : message + ' (at ' + source + ':' + line + ':' + col + ')';
            errors.textContent += text + '\n';
            errors.style.display = '';
        };
        console.error = (function(old) {
            return function error() {
                errors.textContent += Array.prototype.slice.call(arguments).join(' ') + '\n';
                errors.style.display = '';
                old.apply(this, arguments);
            }
        })(console.error);
    </script>
    <a href="index.html" class="changeMode">PROD</a>
    <script src="<?php echo asset("main.js"); ?>"></script>
</body>
</html>