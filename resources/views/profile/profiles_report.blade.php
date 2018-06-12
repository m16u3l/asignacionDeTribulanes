<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Reporte de perfil</title>
  <link rel="stylesheet" href="css/table_style.css" media="all" />
</head>

<body>
  <h3>REPORTE DE FECHAS ESTABLECIDAS EN CADA FASE DE LA DEFENSA DE PERFILES</h3>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th class="th">Titulo de perfil</th>
        <th class="th">Creacion</th>
        <th class="th">Asignacion</th>
        <th class="th">Defensa</th>
        <th class="th">Finalizacion</th>
        <th class="th">Abandono</th>
      </tr>
    </thead>
    <tbody>
      @foreach($profiles as $profile)
      <tr>
        <td class="td-title">
          <h5>{{ $profile->title }}</h5>
        </td>

        <td class="td">{{ $profile->date->initiated }}</td>
        <td class="td">{{ $profile->date->assigned }}</td>
        <td class="td">{{ $profile->date->defended }}</td>
        <td class="td">{{ $profile->date->finalized }}</td>
        <td class="td">{{ $profile->date->abandoned or "Abandono no registrado" }}</td>

      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>