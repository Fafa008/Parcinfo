@extends('base')

@section('content')
<div class="container mt-3">
    <h1 class="text-center">Matériels</h1>

    <div class="row mb-3">
      <div class="col">
        <a href="{{ route('Projet.index') }}" class="btn btn-secondary">Index</a>
      </div>
      <div class="col text-end">
        <a href="{{ route('Mat.insert') }}" class="btn btn-primary">Insérer un Matériel</a>
      </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nom</th>
          <th scope="col">Numéro de série</th>
          <th scope="col">Description</th>
          <th scope="col">Garantie</th>
          <th scope="col">Statut</th>
          <th scope="col">Département</th>
          <th scope="col">Date d'intégration</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($materiel as $mat)
        <tr>
          <td>{{ $mat->id }}</td>
          <td>{{ $mat->nom_Mat }}</td>
          <td>{{ $mat->serial_number }}</td>
          <td>{{ $mat->description }}</td>
          <td>{{ $mat->garentie }}</td>
          <td>{{ $mat->statue }}</td>
          <td>{{ $mat->departement_id }}</td>
          <td>{{ $mat->date_integration }}</td>
          <td>
            <form method="POST" action="mat/admin/{{ $mat->id }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <a href="/mat/{{ $mat->id }}/edit" class="btn btn-primary">Modifier</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


@endsection
