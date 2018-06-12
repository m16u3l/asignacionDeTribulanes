<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Correo</title>
</head>
<body>
  <p>Se aprobo la asignasion de tribunales del siguiente perfil</p>
  <h4>Titulo:</h4> 
  <p> {{$profile->title}}</p>
  @foreach($profile->students as $student)
    <div class="row">
      <div class="col-lg-6">
        <label class="h6 d-inline">Tesista:  {{$student->name}}
                                    {{$student->last_name_father}}
                                    {{$student->last_name_mother}}
        </label>
    </div>
    @endforeach
    <h4>Tutores:</h4>
    @foreach($profile->tutors as $tutor)
    <p class="mb-0 d-inline"> {{$tutor->name}}
                              {{$tutor->last_name_father}}
                              {{$tutor->last_name_mother}}
    </p>
    @endforeach
    <h4>Tribunales:</h4>
    @foreach($profile->courts as $courts)
    <p class="mb-0 d-inline"> {{$courts->name}}
                              {{$courts->last_name_father}}
                              {{$courts->last_name_mother}}
    </p>
    @endforeach
    <h4>Fecha de asignacion:</h4>
    <p class="card-text mb-2">{{$profile->date->assigned}}</p>
</body>
</html>