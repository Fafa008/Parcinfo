@extends('base')

@section('content')
<div class="container mt-3">
    <h1 class="text-center">Modifier l'utilisateur</h1>

    <form method="POST" action="" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="id" class="form-label">Id</label>
        <input type="text" class="form-control" id="id" name="id" value="{{ $user->id }}" required>
        @error("id")
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        @error("name")
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        @error("email")
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>
  </div>
@endsection


