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
                    <th>Fecha de registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guests as $guest)
                <tr>
                    <td>{{ $guest->name }}</td>
                    <td>{{ $guest->last_name }}</td>
                    <td>{{ $guest->email }}</td>
                    <td>{{ $guest->phone }}</td>
                    <td>{{ $guest->city }}</td>
                    <td>{{ $guest->theyre_new }}</td>
                    <td>{{ $guest->created_at }}</td>

                    <td>



                    <form method="post" action="{{ url('/guests/'.$guest->id) }}" style="display:inline">
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
                {{ $guests->links() }}
            </div>
        </div>

    </div>

</div>



@endsection


@section ('js')

<!-- <script src="{{ asset('js/couponsby.js') }}"></script> -->

@endsection 