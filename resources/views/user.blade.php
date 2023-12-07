<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de user</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>Données du compte</h1>
    </header>
    <main>
        <div class='selection'>
            @if(isset($error))
                <p style="color: red;">{{ $error }}</p>
            @endif
            <form action="{{ route('createUser') }}" method="post">
                @csrf
                <label for="name">Username:</label>
                <input type="text" name="name" required>
                <label for="sign">Signe astrologique:</label>
                <select name="sign" id="sign" required>
                    <option value="Bélier">Bélier</option>
                    <option value="Taureau">Taureau</option>
                    <option value="Gémeaux">Gémeaux</option>
                    <option value="Cancer">Cancer</option>
                    <option value="Lion">Lion</option>
                    <option value="Vierge">Vierge</option>
                    <option value="Balance">Balance</option>
                    <option value="Scorpion">Scorpion</option>
                    <option value="Sagittaire">Sagittaire</option>
                    <option value="Capricorne">Capricorne</option>
                    <option value="Verseau">Verseau</option>
                    <option value="Poisson">Poisson</option>
                </select>
                <label for="sector">Filière:</label>
                <select name="sector" id="sector" required>
                    <option value="Embarqué">Embarqué</option>
                    <option value="Ingénierie des données">Ingénierie des données</option>
                    <option value="Logiciel">Logiciel</option>
                    <option value="Réseaux">Réseaux</option>
                    <option value="Sécurité">Sécurité</option>
                </select>
                <button type="submit">Valider les données</button>
            </form>
        </div>
    </main>
</body>
