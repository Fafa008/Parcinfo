@extends('base')

@section('content')


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <h1 class="navbar-brand">Logiciel</h1>
      <a href="{{ route('Projet.index') }}" class="btn btn-secondary">Index</a>
      <a href="{{ route('Log.insert') }}" class="btn btn-primary">Inserer un logiciel</a>
    </div>
  </nav>

  <div class="container mt-3">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>Nom</th>
          <th>Version</th>
          <th>Description</th>
          <th>Date d'achat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($logiciel as $log)
        <tr>
          <td>{{ $log->id }}</td>
          <td>{{ $log->nom_logiciel }}</td>
          <td>{{ $log->version }}</td>
          <td>{{ $log->description }}</td>
          <td>{{ $log->date_achat }}</td>
          <td>
            <form method="POST" action="log/admin/{{  $log->id}}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <a href="/log/{{$log->id }}/edit" class="btn btn-primary">Modifier</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
