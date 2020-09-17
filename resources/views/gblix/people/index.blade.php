@extends('gblix.master.layout')

@section('content')

    <div class="container">
        <h1>Listagem de Personagens</h1>

        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-secondary" href="{{ route('gblix.people.type','json')}}" target="_blank"> JSON</a>
            <a class="btn btn-secondary" href="{{ route('gblix.people.type','csv')}}"> CSV</a>

        </div>

        <table class="table table-bordered show-delay" id="people">
            <thead>
            <tr>

                <th scope="col">Nome</th>
                <th scope="col">Idade</th>
                <th scope="col">Titulo do Filme</th>
                <th scope="col">Ano de lançamento</th>
                <th scope="col">Pontuação Rotten Tomato</th>
            </tr>
            </thead>
            <tbody>
            @foreach($people as $value)
                @foreach($value->film as $film)

            <tr>

                <td>{{$value->name}}</td>
                <td>{{$value->age}}</td>
                <td>{{$film->title}}</td>
                <td>{{$film->release_date}}</td>
                <td>{{$film->rt_score}}</td>
            </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>

    </div>

    <script type="text/javascript">

        $(document).ready( function () {
            $('#people').DataTable();
        } );

    </script>

@endsection


