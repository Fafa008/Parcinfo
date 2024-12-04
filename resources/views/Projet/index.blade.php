@extends('base')

@section('content')

<h1>ParcInfo</h1>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    @auth
    <span class="navbar-text">{{ Illuminate\Support\Facades\Auth::user()->name }}</span>
    <form action="{{ route('auth.logout') }}" method="post">
        @method("delete")
        @csrf
        <button class="btn btn-danger">Se déconnecter</button>
    </form>
    @endauth
    @guest
    <a href="{{ route('auth.login') }}" class="btn btn-primary">Se connecter</a>
    @endguest
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="{{ route('admin') }}" class="list-group-item list-group-item-action">Utilisateurs</a>
          <a href="{{ route('Departement') }}" class="list-group-item list-group-item-action">Départements</a>
          <a href="{{ route('Materiels') }}" class="list-group-item list-group-item-action">Matériels</a>
          <a href="{{ route('Maintenance') }}" class="list-group-item list-group-item-action">Maintenances</a>
          <a href="{{ route('Logiciel') }}" class="list-group-item list-group-item-action">Logiciels</a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nom du Departement</th>
                    <th>Nombres des matériels</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                  <tr>
                    <td>{{ $item['departement']->nom_dep }}</td>
                    <td>{{ $item['count'] }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Numero de serie</th>
                    <th>Garentie</th>
                    <th>Statue</th>
                    <th>Departement</th>
                    <th>Date d'integration</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($materiel as $mat)
                  <tr>
                    <td>{{ $mat->nom_Mat }}</td>
                    <td>{{ $mat->serial_number }}</td>
                    <td>{{ $mat->garentie }}</td>
                    <td>{{ $mat->statue }}</td>
                    <td>{{ $mat->departement_id }}</td>
                    <td>{{ $mat->date_integration }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection


