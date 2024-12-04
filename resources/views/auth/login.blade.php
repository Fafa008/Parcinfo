@extends('base')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Se connecter</div>
          <div class="card-body">
            <form action="{{ route('auth.login') }}" method="post" class="row g-3">
              @csrf
              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="col-12">
                <label for="mdp" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="mdp" name="password" required>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Se connecter</button>
              </div>
            </form>
            <div class="col-12 mt-3">
              <p class="text-center">Vous n'avez pas de compte ? <a href="{{ route('user.insert') }}">Créer un compte</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection
