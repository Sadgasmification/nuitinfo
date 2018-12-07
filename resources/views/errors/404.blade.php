{{-- @extends('errors::layout') --}}
@extends('layouts.app')
@section('title', 'La page demandée n\'a pas été trouvée')

@section('content')
  <div id="content">
    <h2>La page demandée n'a pas été trouvée.<br/><a class="btn btn-primary" href="/">Retour à l'accueil</a></h2>
  </div>
@endsection
