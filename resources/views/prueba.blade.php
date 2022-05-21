<head>
  
</head>
<style>
  table {
    table-layout: fixed;
    width: 65%;
    border-collapse: collapse;
    border: 3px solid rgb(126, 203, 223);
    margin-left: 15%;
}
thead th:nth-child(1) {
  width: 30%;
}

thead th:nth-child(2) {
  width: 20%;
}

thead th:nth-child(3) {
  width: 15%;
}

thead th:nth-child(4) {
  width: 35%;
}

th, td {
  padding: 20px;
}

html {
  font-family: 'helvetica neue', helvetica, arial, sans-serif;
}

thead th, tfoot th {
  font-family: 'Rock Salt', cursive;
}

th {
  letter-spacing: 2px;
}

td {
  letter-spacing: 1px;
}

tbody td {
  text-align: center;
}

tfoot th {
  text-align: right;
}
thead, tfoot {
  background: url(leopardskin.jpg);
  color: white;
  text-shadow: 1px 1px 1px black;
}

thead th, tfoot th, tfoot td {
  background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.5));
  border: 3px solid rgb(135, 235, 230);
}
tbody tr:nth-child(odd) {
  background-color: #e1cddc;
}

tbody tr:nth-child(even) {
  background-color: #a9e7f0;
}

tbody tr {
  background-image: url(noise.png);
}

table {
  background-color: #bb9db3;
}
caption {
  font-family: 'Rock Salt', cursive;
  padding: 20px;
  font-style: italic;
  caption-side: bottom;
  color: #666;
  text-align: right;
  letter-spacing: 1px;
}
  </style>
<body>   
  <h2>Certificado de Vacunacion</h2>
<table>
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
        <?php $date = date_create($historiaclinica->fecha) 
        ?>
       <td><?php echo date_format($date,"d/m/Y") ?></td>
        
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
    </body>