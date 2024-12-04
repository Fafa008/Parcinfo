@extends('base')

@section('content')

<div class="container mt-3">
    <h1 class="text-center">Nouvel Utilisateur</h1>

    <form action="/new" method="post" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="col-12">
        <label for="mdp" class="form-label">Password</label>
        <input type="password" class="form-control" id="mdp" name="password" required>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Insérer</button>
      </div>
    </form>
  </div>

@endsection
