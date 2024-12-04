@extends('base')

@section('content')
<div class="container mt-3">
    <h1 class="text-center">Modifier le Logiciel</h1>

    <form method="POST" action="" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="id" class="form-label">Id</label>
        <input type="text" class="form-control" id="id" name="id">
      </div>
      <div class="col-md-6">
        <label for="nom_logiciel" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom_logiciel" name="nom_logiciel">
      </div>
      <div class="col-md-6">
        <label for="version" class="form-label">Version</label>
        <input type="text" class="form-control" id="version" name="version">
      </div>
      <div class="col-md-6">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
      </div>
      <div class="col-md-6">
        <label for="date_achat" class="form-label">Date d'achat</label>
        <input type="date" class="form-control" id="date_achat" name="date_achat">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>
  </div>

@endsection


