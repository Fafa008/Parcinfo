@extends('base')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <h1 class="navbar-brand">Maintenance</h1>
      <a href="{{ route('Projet.index') }}" class="btn btn-secondary">Index</a>
      <a href="{{ route('Mai.insert') }}" class="btn btn-primary">Inserer une Maintenance</a>
    </div>
  </nav>

  <div class="container mt-3">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>materiel_id</th>
          <th>description</th>
          <th>start_date</th>
          <th>end_date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($maintenance as $mai)
        <tr>
          <td>{{ $mai->id }}</td>
          <td>{{ $mai->materiel_id }}</td>
          <td>{{ $mai->description }}</td>
          <td>{{ $mai->start_date }}</td>
          <td>{{ $mai->end_date }}</td>
          <td>
            <form method="POST" action="mai/admin/{{ $mai->id }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <a href="/mai/{{$mai->id  }}/edit" class="btn btn-primary">Modifier</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
