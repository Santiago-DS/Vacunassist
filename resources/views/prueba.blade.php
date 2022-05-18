<head>
   
</head>

<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Fecha de vacunación</th>
      </tr>        
    </thead>
    <tbody>
    <?php 
        $id_usuario=auth()->id();
        $historiasclinica = DB::table('historiaclinica')->distinct()->join('vacunas', 'vacunas.id', '=', 'historiaclinica.id_vacuna')->where('id_paciente', $id_usuario)->get();     
    ?>
    @foreach ($historiasclinica as $historiaclinica)
      <tr>
        <th scope="row">{{ $historiaclinica->nombreVacuna }}</th>
        <td>{{ $historiaclinica->fecha }}</td>
      </tr>
    @endforeach
    </tbody>
    
    <?php 
        $date = new DateTime();
        $result = $date->format('d/m/Y');
    ?>

  </table> 

  
  <p>Certificado Para: <?php echo auth()->user()->name . " " . auth()->user()->apellido ?><p>
    <p>Fecha de Emisión: <?php echo $result ?><p>