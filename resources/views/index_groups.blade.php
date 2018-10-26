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
        <th>Name</th>
        <th>Sigla</th>
        <th>Número do Partido</th>
        <th>Endereço</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($groups as $group)
      <tr>
        <td>{{$group['name']}}</td>
        <td>{{$group['sigla']}}</td>
        <td>{{$group['number']}}</td>
        <td>{{$group['endereco']}}</td>
        
        <td><a href="{{action('GroupController@edit', $group['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('GroupController@destroy', $group['id'])}}" method="post">
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