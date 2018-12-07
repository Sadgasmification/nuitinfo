@extends('layouts.app')

@section('content')
  <div id="content">
    <div class="tab-content" id="tabs-content">
      <div class="tab-pane fade in show active" id="mission" role="tabpanel" aria-labelledby="mission-tab">
        <h2>Informations générales</h2>
        <hr>
        <div class="sub_content">
          <h3 class="title">404-not-found</h3>
          <div class="card-columns">
            <div class="card">
              <div class="card-body">
                Pietrzak Aurélien
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                Deschamps Ghislain
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                Hollertt Marceau
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                Jablonski Adrien
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                Jourdain Nicolas
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                Vanderkelen Aymeric
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade in" id="organism" role="tabpanel" aria-labelledby="organism-tab">
        <h2>Météo</h2>
        <hr>
        <div class="sub_content row">
          <div class="col-sm-3">
          <form id="meteo_form" method="GET" action="" accept-charset="UTF-8" class="needs-validation" novalidate>
            <div class="form-group">
              Latitude : <input class="form-control" name="meteo[lat]" type="text" id="meteo[lat]" placeholder="Latitude">
              Lontitude : <input class="form-control" name="meteo[lon]" type="text" id="meteo[lon]" placeholder="Longitude">
            </div>
            <br>
            <span><strong>OU</strong></span>
            <div class="form-group">
              Nom de ville : <input class="form-control" name="meteo[name]" type="text" id="meteo[name]" placeholder="Nom de ville">
            </div>
            <div class="btn btn-info form-control" id="meteo_button">Rechercher</div>
          </form>
          </div>
          <div class="col-sm-9 result_meteo">
            <h3 id="meteo_erreur" class="alert alert-danger"></h3>
            <h3 id="meteo_name"></h3>
            <h4 id="meteo_lat"></h4>
            <h4 id="meteo_lon"></h4>
            <h4 id="meteo_humidity"></h4>
            <h4 id="meteo_psi"></h4>
            <h4 id="meteo_temp"></h4>
            <p id="meteo_weather"></p>
          </div>
        </div>
      </div>

      <div class="tab-pane fade in" id="infos" role="tabpanel" aria-labelledby="infos-tab">
        <h2>Circulation</h2>
        <hr>
        <div class="sub_content row">
          <div class="col-sm-3">
            <form id="traffic_form" method="GET" action="" accept-charset="UTF-8">
              <div class="form-group">
                Latitude : <input class="form-control" name="traffic[lat]" type="text" id="traffic[lat]" placeholder="Latitude">
                Longitude : <input class="form-control" name="traffic[lon]" type="text" id="traffic[lon]" placeholder="Longitude">
              </div>
              <div class="btn btn-info form-control" id="traffic_button">Rechercher</div>
            </form>
          </div>
          <div class="col-sm-9 result_traffic">
            <h3 id="traffic_erreur" class="alert alert-danger"></h3>
            <h3 id="traffic_name"></h3>
            <ul class="event_list">

            </ul>
            {{-- <h4 id="meteo_lat"></h4> --}}
            {{-- <h4 id="meteo_lon"></h4> --}}
            {{-- <p id="meteo_weather"></p> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
