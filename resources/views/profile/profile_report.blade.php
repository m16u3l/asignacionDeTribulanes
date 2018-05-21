<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte de perfil</title>
    <link rel="stylesheet" href="css/style_report.css"/>
  </head>
  <body>	
    <h1>{{ $profile->title }}</h1>
    <div >
      @foreach($profile->students as $key => $student)
        <div>TESISTA: {{ $student->name }} {{ $student->last_name_father }} {{ $student->last_name_mother }}</div>  
        <div>CARRERA: {{ $student->career }}</div>
      @endforeach
    </div>

    <br>
    <div>
        @foreach($profile->tutors as $key => $tutor)
          <div>TUTOR: {{ $tutor->name }} {{ $tutor->last_name_father }} {{ $tutor->last_name_mother }}</div>
      @endforeach
    </div>

    <h2>TRIBUNALES:</h2>
    <div>
      @foreach($profile->courts as $key => $court)
        <div>TRIBUNAL: {{ $court->name }} {{ $court->last_name_father }} {{ $court->last_name_mother }}</div>
      @endforeach
    </div>

    <h4>Fechas establecidas en cada fase de la defensa del perfil</h3>

    <table style="width:100%">
      <tr>
        <th>Estado del Perfil</th>
        <th>Fecha</th> 
      </tr>
      <tr>
        <td>Iniciado</td>
        <td>{{ $profile->date->initiated }}</td>
      </tr>
      <tr>
        <td>Aprobado</td>
        <td>{{ $profile->date->approved }}</td>
      </tr>
      <tr>
        <td>Asigando</td>
        <td>{{ $profile->date->assigned }}</td>
      </tr>
      <tr>
        <td>Finalizado</td>
        <td>{{ $profile->date->finalized }}</td>
      </tr>
      <tr>
        <td>Defendido</td>
        <td>{{ $profile->date->defended }}</td>
      </tr>
      <tr>
        <td>Abandonado</td>
        <td>{{ $profile->date->abandoned }}</td>
      </tr>
   

    </table>
  </body>
</html>