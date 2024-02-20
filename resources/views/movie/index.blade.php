<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <ul>
        <?php foreach ($movies as $movie) : ?>
            <li>
                <strong><?= $movie->name ?></strong>
                <br>
                <?= $movie->movieType->name ?>
                <br>
                <?= $movie->genres->pluck('name')->join(', ') ?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>