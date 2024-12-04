@extends('base')

@section('content')
    <h1 class="text-center">Modifier le Materiel</h1>

    <form method="POST" action="">
      @csrf
      <div class="mb-3">
        <label for="id" class="form-label">Id</label>
        <input type="id" class="form-control" id="id" name="id">
      </div>
      <div class="mb-3">
        <label for="user" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom_Mat" name="nom_Mat">
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">Numeros de serie</label>
        <input type="text" class="form-control" id="serial_number" name="serial_number">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
      </div>
      <div class="mb-3">
        <label for="garentie" class="form-label">Garentie</label>
        <input type="text" class="form-control" id="garentie" name="garentie">
      </div>
      <div class="mb-3">
        <label for="statue" class="form-label">Statue</label>
        <input type="text" class="form-control" id="statue" name="statue">
      </div>
      <div class="mb-3">
        <label for="departement_id" class="form-label">Département</label>
        <select name="departement_id" id="departement_id" class="form-control" required>
          <option value="">Sélectionnez un département</option>
          @foreach($departements as $departement)
          <option value="{{ $departement->id }}">{{ $departement->nom_dep }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="date_integration" class="form-label">Date d'integration</label>
        <input type="Date" class="form-control" id="date_integration" name="date_integration">
      </div>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

@endsection
