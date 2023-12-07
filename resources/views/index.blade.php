<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur d'Horoscope</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>Horoscope astronomique</h1>
        <h2>Où l'Ingénierie rencontre l'astrologie</h2>
    </header>
    <main>
        <div class="user">
            @if(session('name'))
                <div class="alert alert-success">
                    <p>Bon retour, {{ session('name') }} !</p>
                    <form action="{{ route('updateUser') }}" method="post">
                        @csrf
                        <label for="newName">Nouveau username :</label>
                        <input type="text" name="newName" required>
                        <label for="sign">Votre signe astrologique :</label>
                        <select name="sign" id="signSession" required>
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
                        <label for="sector">Votre filière à la HEIG :</label>
                        <select name="sector" id="sectorSession" required>
                            <option value="Embarqué">Embarqué</option>
                            <option value="Ingénierie des données">Ingénierie des données</option>
                            <option value="Logiciel">Logiciel</option>
                            <option value="Réseaux">Réseaux</option>
                            <option value="Sécurité">Sécurité</option>
                        </select>
                        <button type="submit">Mettre à jour les données</button>
                    </form>
                    <form action="{{ route('deconnection') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary" id='deconnection'>Se déconnecter</button>
                    </form>
                    <form action="{{ route('delUser') }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary" id='delUser'>Supprimer le compte</button>
                    </form>
                </div>
            @else
            <h3>Connectez-vous</h3>
            <form action="{{ route('connectUser') }}" method="post">
                @csrf
                <label for="name">Username:</label>
                <input type="text" name="name" id="name" required>
                <button type="submit" class="btn btn-primary" id='connection'>Se connecter</button>
            </form>
            <form action="{{ route('user') }}" method="get">
                @csrf
                <button type="submit" class="btn btn-primary">Créer Utilisateur</button>
            </form>
            @endif
        </div>
        <div class='selection'>
            <h3 style="text-align: center;">Entrer vos données personnelles</h3>
            <form action="{{ route('generate_horoscope') }}" method="post">
                @csrf
                <label for="sign">Votre signe astrologique :</label>
                <select name="sign" id="sign" required>
                    <option value="Bélier" @if(session()->get('sign') == 'Bélier') selected @endif>Bélier</option>
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
                <label for="sector">Votre filière à la HEIG :</label>
                <select name="sector" id="sector" required>
                    <option value="Embarqué">Embarqué</option>
                    <option value="Ingénierie des données">Ingénierie des données</option>
                    <option value="Logiciel">Logiciel</option>
                    <option value="Réseaux">Réseaux</option>
                    <option value="Sécurité">Sécurité</option>
                </select>
                <button type="submit">Générer l'Horoscope</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Star Reader</p>
    </footer>
</body>
</html>


<script>
    function updateUserInfo() {
        var username = "nom_utilisateur";
        var sector = $('#sector').val();
        var name = $('#name').val();

        $.ajax({
            type: 'PUT',
            url: '/users/' + username,
            data: {
                sector: sector,
                name: name
            },
            success: function(response) {
                alert(response.message);
            },
            error: function(error) {
                alert('Erreur lors de la mise à jour : ' + error.responseJSON.error);
            }
        });
    }

    var message = '{{ session('message') }}';
    if (message) {
        alert(message);
    }

    
    var name = '{{ session('name') }}';
    var sign = '{{ session('sign') }}';
    var sector = '{{ session('sector') }}';

    if(name) {
        document.getElementById('sign').value = sign;
        document.getElementById('sector').value = sector;
        document.getElementById('signSession').value = sign;
        document.getElementById('sectorSession').value = sector;

        document.getElementById('sign').disabled = true;
        document.getElementById('sector').disabled = true;
        document.getElementById('name').disabled = true;
        document.getElementById('connection').disabled = true;

    }
</script>