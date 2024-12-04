@extends('base')

@section('content')

<div class="container mt-3">
    <h1 class="text-center">Départements</h1>

    <div class="row mb-3">
      <div class="col">
        <a href="{{ route('Projet.index') }}" class="btn btn-secondary">Index</a>
      </div>
      <div class="col text-end">
        <a href="{{ route('Dep.insert') }}" class="btn btn-primary">Insérer un Département</a>
      </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nom du Département</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($departement as $dep)
        <tr>
          <td>{{ $dep->id }}</td>
          <td>{{ $dep->nom_dep }}</td>
          <td>
            <form method="POST" action="dep/admin/{{ $dep->id }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <a href="/dep/{{ $dep->id }}/edit" class="btn btn-primary">Modifier</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <h2 class="mt-5">Matériels par Département</h2>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nom du Département</th>
          <th scope="col">Nom du Matériel</th>
          <th scope="col">Description du Matériel</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($departements as $departement)
        <tr>
          <td>{{ $departement->nom_dep }}</td>
          <td>{{ $departement->nom_Mat }}</td>
          <td>{{ $departement->description }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

    @endsection
