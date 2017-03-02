function getCurentFileName(){
    var href = document.location.href;
	return href.substr(href.lastIndexOf('/') + 1);
}

$(document).ready(function () {
	if(getCurentFileName() == '' || getCurentFileName() == 'index.php'){
		var gettedData, i;
		var heart_rate = $('#hr');
		var temp = $('#temp');
		var saturation = $('#saturation');
		var humidity = $('#humidity');
		var battery = $('#battery');
		var latitude = $('#latitude');
		var longitude = $('#longitude');
		var numResults = 10;
		var mapProp, gettedID;

		var average = {
			'heart_rate': 0,
			'temp': 0,
			'saturation': 0,
			'humidity': 0,
			'battery': 0
		};

		function getID(){
			$.get('../engine/getOneSession.php?name=ID', function(data) {
				return data;
			});
		}

		function getData(){
			$.getJSON('../d.php?id='+ getID() +'&t=' + numResults, function(data) {
				gettedData = data;

				for (i = 0; i < gettedData.length; i++) {
					average.heart_rate += parseInt(gettedData[i].heart_rate);
					average.temp += parseInt(gettedData[i].temp);
					average.saturation += parseInt(gettedData[i].saturation);
					average.humidity += parseInt(gettedData[i].humidity);
					average.battery += parseFloat(gettedData[i].voltage);

					if (i == gettedData.length - 1){
						latitude.html('<span>Zem. délka: </span>' + gettedData[i].latitude + '°');
						longitude.html('<span>Zem. šířka: </span>' + gettedData[i].longitude + '°');
						mapProp = {
							center: new google.maps.LatLng(gettedData[i].latitude, gettedData[i].longitude),
							zoom: 18,
							mapTypeId: google.maps.MapTypeId.HYBRID,
							scrollwheel: false
						};
						new google.maps.Map(document.getElementById("googleMap"), mapProp);
					}
				}

				heart_rate.html(average.heart_rate / numResults + ' tepů/min');
				temp.html(average.temp / numResults + '°');
				saturation.html(average.saturation / numResults + '%');
				humidity.html(average.humidity / numResults + '%');
				battery.html((Math.round(average.battery / numResults * 1) / 1) + '%');

				average = {
					'heart_rate': 0,
					'temp': 0,
					'saturation': 0,
					'humidity': 0,
					'battery': 0
				};
			});
		}
		getData();

		window.setInterval(getData, 900 * 1000);
 	}
});