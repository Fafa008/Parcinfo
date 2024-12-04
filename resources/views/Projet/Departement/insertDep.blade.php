@extends('base')

@section('content')
<div class="container mt-3">
    <h1 class="text-center">Insérer un Département</h1>

    <form action="/dep/newDep" method="post" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="nom_dep" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom_dep" name="nom_dep">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Insérer</button>
      </div>
    </form>
  </div>

    @endsection
