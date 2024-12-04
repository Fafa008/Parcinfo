@extends('base')

@section('content')
<form action="/mai/newMai" method="post" class="container mt-3">
    @csrf
    <div class="mb-3">
      <label for="materiel_id" class="form-label">Matériel</label>
      <select name="materiel_id" id="materiel_id" class="form-control" required>
        <option value="">Sélectionnez un matériel</option>
        @foreach($materiels as $materiel)
        <option value="{{ $materiel->id }}">{{ $materiel->nom_Mat }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <input type="text" class="form-control" id="description" name="description" required>
    </div>
    <div class="mb-3">
      <label for="start_date" class="form-label">Date de début</label>
      <input type="date" class="form-control" id="start_date" name="start_date" required>
    </div>
    <div class="mb-3">
      <label for="end_date" class="form-label">Date de fin</label>
      <input type="date" class="form-control" id="end_date" name="end_date" required>
    </div>

    <button type="submit" class="btn btn-primary">Insérer</button>
  </form>
  @endsection
