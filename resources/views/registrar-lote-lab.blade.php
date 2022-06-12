<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
</head>

<body>

    <?php
    $id_historia = $_GET['id_historia'];

    if(isset($_GET['boolean'])){
        $boolean = true;
    }
    else {
        $boolean = false;
    }


    ?>

    <form action="{{ route('registrar-lote-lab') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Lote</label>
            <input hidden type="text" class="form-control" name="id_historia" value="<?php echo $id_historia ?>">
            <input hidden type="text" class="form-control" name="boolean" value="<?php echo $boolean ?>">

            <input type="text" class="form-control" name="lote">
        </div>
        <div class="mb-3">
            <label class="form-label">Laboratorios</label>
            <select name="id_laboratorio">
                <option disabled>Seleccione una opción</option>
                <?php $laboratorios = DB::table('laboratorios')->get(); ?>
                @foreach ($laboratorios as $lab)
                    <option value ="{{ $lab->id }}"> {{ $lab->nombreLaboratorio }} </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Aceptar</button>
      </form>



</body>
</html>
