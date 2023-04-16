@extends('layouts.app')
@section('content')

<div class="container">
    
    <div id="tabla" >
    

        <table id="dataguest" class="table table-light table-hover">   
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Ciudad</th>
                    <th>Nuevo</th>
                    <th>Negocio</th>
                    <th>Fecha de registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hdcashiers as $hdcashier)
                <tr>
                    <td>{{ $hdcashier->name }}</td>
                    <td>{{ $hdcashier->last_name }}</td>
                    <td>{{ $hdcashier->email }}</td>
                    <td>{{ $hdcashier->phone }}</td>
                    <td>{{ $hdcashier->city }}</td>
                    <td>{{ $hdcashier->theyre_new }}</td>
                    <td>{{ $hdcashier->business }}</td>
                    <td>{{ $hdcashier->created_at }}</td>

                    <td>



                    <form method="post" action="{{ url('/hdcashiers/'.$hdcashier->id) }}" style="display:inline">
                        {{ csrf_field ()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger redondo" type="submit" onclick="return confirm('¿Eliminar información?');">Borrar</button>
                    </form> 
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between bd-highlight mb-2">
            <div >
                {{ $hdcashiers->links() }}
            </div>
        </div>

    </div>

</div>



@endsection


@section ('js')

<!-- <script src="{{ asset('js/couponsby.js') }}"></script> -->

@endsection 