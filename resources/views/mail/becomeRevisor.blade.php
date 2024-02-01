<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div>
        <h2>Un utente ha richiesto di lavorare con noi</h2>
        <h3>Ecco i suoi dati: </h3>
        <p>Nome: {{$user->name}}</p>
        <p>Email: {{$user->email}}</p>
        <p>Se vuoi renderlo revisore clicca qui:</p>
        <a href="{{route('makeRevisor', compact('user'))}}">Rendi revisore</a>
    </div>
</body>
</html>