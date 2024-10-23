<?php

$number = 4;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   Homepage

   <ul>
    <li>1</li>
    <li>2</li>
    @if ($number === 3)
        <li>3</li>
    @else
        <li>no 3</li>
    @endif
    <li>4</li>
    <li>5</li>
   </ul>
</body>
</html>