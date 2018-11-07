<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Foto</th>
        <th>Nome completo</th>
        <th>Nome fantasia</th>
        <th>Número do candidato</th>
        <th>Endereço</th>

      </tr>
    </thead>
    <tbody>
      
      @foreach($candidates as $candidate)
      <tr>
        <td><img src="/images/{{$candidate['filename']}}" style="height: 50px; width: 50px;"></td>
        <td>{{$candidate['nomeCompleto']}}</td>
        <td>{{$candidate['nomeFantasia']}}</td>
        <td>{{$candidate['numeroCandidato']}}</td>
        <td>{{$candidate['endereco']}}</td>   
        <td><a href="{{action('CandidateController@edit', $candidate['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('CandidateController@destroy', $candidate['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>