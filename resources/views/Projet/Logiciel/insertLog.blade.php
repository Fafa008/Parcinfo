@extends('base')

@section('content')
<div class="container mt-3">
    <h1 class="text-center">Insérer un Logiciel</h1>

    <form action="/log/newLog" method="post" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="nom_logiciel" class="form-label">Nom du logiciel</label>
        <input type="text" class="form-control" id="nom_logiciel" name="nom_logiciel" required>
      </div>
      <div class="col-md-6">
        <label for="version" class="form-label">Version</label>
        <input type="text" class="form-control" id="version" name="version" required>
      </div>
      <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
      </div>
      <div class="col-md-6">
        <label for="date_achat" class="form-label">Date d'achat</label>
        <input type="date" class="form-control" id="date_achat" name="date_achat" required>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Insérer</button>
      </div>
    </form>
  </div>

@endsection
