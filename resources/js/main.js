$('#traffic_erreur').hide();
$('#meteo_erreur').hide();
$("#meteo_button").click(function(){
	$.ajax({
		url: '/meteo',
		method: 'GET',
		data: {'lat':  $('#meteo\\[lat\\]').val(), 'lon':  $('#meteo\\[lon\\]').val(), 'name':  $('#meteo\\[name\\]').val()},
		success: function(response){
			var result = JSON.parse(response);
			console.log(result);
			if(result.weather)
			{
				$('#meteo_erreur').hide(200);
				$('#meteo_erreur').html("");
				if (result.weather[0].icon) {
					$('#meteo_name').html(result.name + ' : <img src="http://openweathermap.org/img/w/'+result.weather[0].icon+'.png" title="'+result.weather[0].main+'">');
				}
				else {
					$('#meteo_name').html(result.name + ' : ' + result.weather[0].main);
				}
				$('#meteo_lat').html('Latitude : ' + result.coord.lat + '');
				$('#meteo_lon').html('Longitude : ' + result.coord.lon + '');
				$('#meteo_humidity').html('Humidité : ' + result.main.humidity + '%');
				$('#meteo_temp').html('Température : ' + (result.main.temp-273.15).toFixed(2) + ' °C');
				$('#meteo_psi').html('Pression : ' + result.main.pressure + ' psi');
			}
			else {
				$('#meteo_erreur').show(200);
				$('#meteo_name').html("");
				$('#meteo_lat').html("");
				$('#meteo_lon').html("");
				$('#meteo_humidity').html("");
				$('#meteo_temp').html("");
				$('#meteo_psi').html("");
				if ($('#meteo\\[name\\]').val()) {
					$('#meteo_erreur').html("Plusieurs villes portent ce nom ou cette ville n'est pas présente dans la base de données. <p>Essayez plutôt Londres</p>");
				}
				else {
					$('#meteo_erreur').html("Ces coordonnées ne sont pas présentes dans notre base de données. <p>Essayez plutôt :<br>Lat : 55.75639 / Lon : 37.628334</p>");
				}
			}
			// $('#meteo_weather').html(result.weather[0].main);

			// $('.result_meteo').html(response);
		}
	});
});

$("#traffic_button").click(function(){
	$.ajax({
		url: '/traffic',
		method: 'GET',
		data: {'lat':  $('#traffic\\[lat\\]').val(), 'lon':  $('#traffic\\[lon\\]').val()},
		success: function(response){
			$('.event_list').html('');
			var result = JSON.parse(response);
			if (result != "Error") {
				$('#traffic_erreur').hide(200);
				result = result.TRAFFICITEMS;
				$('#traffic_name').html("Nombre d'événements signalés : " + result.TRAFFICITEM.length);
				result = result.TRAFFICITEM.slice(0,5);
				$.each( result, function( key, value ) {
					$('.event_list').append('<li>Du '+value.STARTTIME +' au ' + value.ENDTIME + ' : ' + value.TRAFFICITEMDESCRIPTION[0].content + '</li>')
				});
				$('.event_list').append('<li>...</li>')
			}
			else {
				$('#traffic_erreur').show(200);
				$('#traffic_erreur').html("Ces coordonnées ne sont pas présentes dans notre base de données. <p>Essayez plutôt :<br>Lat : 0 / Lon : 0</p>");
				$('#traffic_name').html("");
			}
			// $('.result_traffic').html(response);
		}
	});
});
