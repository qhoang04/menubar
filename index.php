<?php
include_once("function.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dynamic navbar</title>
</head>
<style>

</style>
<body>
    <nav>
        <div class="container">
            <div class="">
                <a href="#">
                    <h2>
                        Haha
                    </h2>
                    <p>Dynamic Navbar</p>
                </a>
            </div>
            <div>
                <ul>
                    <?php echo createMenu(0, $menus); ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="padding-top: 20px; padding-bottom:40px;">
        <div class="row">
            <div class="col-12 py-4">
                <h1>Page scroll content</h1>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Praesent tincidunt dolor eget lorem blandit, auctor
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            </div>
        </div>
    </div>
</body>

</html>