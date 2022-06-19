<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="background: white;">
<head>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
</head>

<style>


    *,*:after,*:before{
  box-sizing: border-box;
}

html{
  box-sizing: inherit;
  background: linear-gradient(to left, #E8FFF9 , #eef2f3);
}
body{
  margin: 2% auto;
  font-family: Verdana;
}
.select-css {
  display: block;
  font-size: 16px;
  font-family: 'Verdana', sans-serif;
  font-weight: 400;
  color: #444;
  line-height: 1.3;
  padding: .4em 1.4em .3em .8em;
  width: 400px;
  max-width: 100%;
  box-sizing: border-box;
  border: 1px solid #aaa;
  box-shadow: 0 1px 0 1px rgba(0,0,0,.03);
  border-radius: .3em;
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  background-color: #fff;
  background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
    linear-gradient(to bottom, #ffffff 0%,#f7f7f7 100%);
  background-repeat: no-repeat, repeat;
  background-position: right .7em top 50%, 0 0;
  background-size: .65em auto, 100%;

cursor: pointer;
}


.contenedor{
    background: #f5f0f0;
    padding: 20px;
    width: 30%;
    border-radius: 30px;
    margin: auto;
    margin-top: 10%;
}

.inputs{
    padding: 15px;
}

.form-label {
    font-size: 120%;

}



.b{
    padding: 20px;
    margin-left: 35%;
}

        </style>

<body>


    <div class="contenedor">
    <form action="{{ route('eliminar-Vacuna-Administrativo') }}" method="POST" class="formulario">
        @csrf
        <div class="inputs">
            <label class="form-label">Ingrese nombre de la nueva vacuna que desea eliminar:</label><br><br>
            <input type="text" class="form-control control" class="estilos" name="nombreVacuna">
            @error('nombreVacuna')<small style="color: red" class="error">*{{ $message }}</small>@enderror
        </div>
        <div class="b">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
    </form>
    </div>

</body>

@include('partials.menu-scripts')

<script>

    $('.formulario').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: '¿Esta seguro de eliminar esta vacuna?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })
    });

</script>

</html>
