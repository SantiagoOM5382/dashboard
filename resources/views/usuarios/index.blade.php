@extends('layouts.app')
@section('content')

<div class="container">

<table class="table table-light table-hover">

    <thead class="thead-light">

        <tr class="red">
            <th></th>
            <th>Nombre</th>
            <th>Apellidos</th>
            {{--  <th>Cédula</th>  --}}
            <th>Usuario</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha Registro</th>
            <th>Cupones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{$loop->iteration}}</td><br/>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->last_name }}</td>
                {{--  <td>{{ $usuario->document }}</td>  --}}
                <td>{{ $usuario->user }}</td>
                <td>{{ $usuario->telefono }}</td>
                <td>{{ $usuario->correo }}</td>
                <td>{{ $usuario->created_at }}</td>
                <td>
                    {{--  editar cupon  --}}
                    <div class="form-group">
                        <form method="post" action="{{ url('/usuarios/'.$usuario->id) }}" style="display:inline">
                            {{ csrf_field ()}}
                            {{method_field('PATCH')}}
                            <input type="text" class="input-number redondo form-control {{$errors->has('coupon')?'is-invalid':''}}" name="coupon" id="coupon{{$usuario->id}}" value="{{isset ($usuario->coupon)?$usuario->coupon:old('coupon')}}"> 
                            <button class="btn btn-success redondo" type="submit">asignar cupon</button>
                        </form> 
                    </div>
                </td>





                <td>

                    {{--  prueba boton para multicupones  --}}
                    {{--  <button class="btn btn-success" onclick="coupon($(this).attr('value'))" type="button" id="asignar" value="{{$usuario->id}}" >asignar cupón</button>  --}}


                    <a class="btn btn-success redondo" href="{{url('/usuarios/'.$usuario->id.'/edit')}}" >Editar</a> 
                    <form method="post" action="{{ url('/usuarios/'.$usuario->id) }}" style="display:inline">
                        {{ csrf_field ()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger redondo" type="submit" onclick="return confirm('¿Eliminar información?');">Borrar</button>
                    </form> 
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

{{$usuarios->links()}}

</div>


@endsection


@section ('js')

<!-- <script src="{{ asset('js/couponsby.js') }}"></script> -->

@endsection 