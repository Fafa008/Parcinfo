@extends('base')

@section('content')
<div class="container mt-3">
    <h1 class="text-center">Nouveau Matériel</h1>

    <form action="/mat/newMat" method="post" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="nom_Mat" required>
      </div>
      <div class="col-md-6">
        <label for="serial_number" class="form-label">Numéro de série</label>
        <input type="text" class="form-control" id="serial_number" name="serial_number" required>
      </div>
      <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
      </div>
      <div class="col-md-6">
        <label for="garentie" class="form-label">Garantie</label>
        <input type="text" class="form-control" id="garentie" name="garentie">
      </div>
      <div class="col-md-6">
        <label for="statue" class="form-label">Statut</label>
        <input type="text" class="form-control" id="statue" name="statue">
      </div>
      <div class="col-12">
        <label for="departement_id" class="form-label">Département</label>
        <select name="departement_id" id="departement_id" class="form-select" required>
          <option value="">Sélectionnez un département</option>
          @foreach($departements as $departement)
          <option value="{{ $departement->id }}">{{ $departement->nom_dep }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-12">
        <label for="date_integration" class="form-label">Date d'intégration</label>
        <input type="date" class="form-control" id="date_integration" name="date_integration">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Insérer</button>
      </div>
    </form>
  </div>

@endsection
