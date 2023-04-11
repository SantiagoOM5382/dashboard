@extends('layouts.app')
@section('content')

<div class="container">


<form action=" {{ url ('/usuarios/'.$usuario->id)}} " method="post" enctype="multipart/form-data">

{{ csrf_field ()}}
{{ method_field('PATCH') }}

@include('usuarios.form',['Modo'=>'editar'])


<a class="btn btn-primary" href="{{ url('usuarios')}}">Regresar</a>

</form>

</div> 
<script>
    $(document).ready(function (){
      $('.input-number').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
      });
    });
</script>
@endsection 