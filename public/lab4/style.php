<?php

header("Content-Type: text/css");
header("Cache-Control: public, max-age=86400");
header(
    "Expires: "
    . gmdate("D, d M Y H:i:s", time() + 86400)
    . " GMT"
);

?>

body {
font-family: Arial, sans-serif;
margin: 40px;
}

h1 {
font-size: 32px;
}

h2 {
margin-bottom: 30px;
}

h3 {
margin-top: 30px;
}

img {
width: 300px;
margin-top: 10px;
}
