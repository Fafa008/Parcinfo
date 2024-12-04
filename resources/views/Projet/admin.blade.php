@extends('base')

@section('content')


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <h1 class="navbar-brand">Utilisateur</h1>
      <a href="{{ route('user.insert') }}" class="btn btn-primary">Inserer un utilisateur</a>
      <a href="{{ route('Projet.index') }}" class="btn btn-secondary">Index</a>
      <div class="navbar-nav ms-auto">
        @auth
        <span class="nav-item navbar-text">{{ Illuminate\Support\Facades\Auth::user()->name }}</span>
        @endauth
        @guest
        <a href="{{ route('auth.login') }}" class="nav-item nav-link">Se connecter</a>
        @endguest
      </div>
    </div>
  </nav>

  <div class="container mt-3">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->password }}</td>
          <td>
            <form method="POST" action="/Admin/{{ $user->id }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
          </td>
          <td>
            <a href="/user/{{ $user->id }}/edit" class="btn btn-primary">Modifier</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
