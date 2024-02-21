<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Movie Website</title>
</head>
<body>

    @include('common.header', [
        'current' => 'home'
    ])

    <h1>My Movie Website</h1>

    <p>Welcome to My Movie Website</p>

    <h2>Movie of the week:</h2>

    <h3><?= $movie_of_the_week->name ?></h3>

    <h2>Person of the week:</h2>

    <h3><?= $person_of_the_week->fullname ?></h3>

</body>
</html>