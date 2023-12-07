<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prédiction Astronomique</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>Prédiction</h1>
        <h3>Vos résultats ici avant GAPS</h3>
    </header>
    <main class="prediction">
        <p>Signe Astrologique : {{ $sign }}</p>
        <p>Orientation  : {{ $sector }}</p>
    </main>
        <main class="prediction">
        <p>Prédiction :</p>
        <p>{{ $debut }} {{ $milieu }} {{ $fin }}</p>
    </main>
    <footer>
        <p>&copy; 2023 Star Reader</p>
    </footer>
</body>
</html>