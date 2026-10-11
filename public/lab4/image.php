<?php

header("Content-Type: image/svg+xml");
header("Cache-Control: public, max-age=86400");
header(
    "Expires: "
    . gmdate("D, d M Y H:i:s", time() + 86400)
    . " GMT"
);

?>

<svg
    xmlns="http://www.w3.org/2000/svg"
    width="300"
    height="150"
    viewBox="0 0 300 150"
>

    <rect
        width="300"
        height="150"
        fill="lightgray"
    />

    <text
        x="150"
        y="75"
        text-anchor="middle"
        dominant-baseline="middle"
        font-size="22"
    >
        Cached image
    </text>

</svg>
