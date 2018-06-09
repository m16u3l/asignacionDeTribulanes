<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte de perfil</title>
    <link rel="stylesheet" href="" media="all" />
  </head>
  <body>
    <h2>Reporte de Fechas establecidas en cada fase de la defensa de perfiles</h3>
    @foreach($profiles as $profile)
      <h3>{{ $profile->title }}</h1>
      <li>{{ $profile->date->initiated }}</li>
      <li>{{ $profile->date->assigned }}</li>
      <li>{{ $profile->date->defended }}</li>
      <li>{{ $profile->date->finalized }}</li>
      <li>{{ $profile->date->abandoned }}</li>
    @endforeach
  </body>
</html>
