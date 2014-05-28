
var currentLati=0.0;
var currentLogi=0.0;

//google map initialize temp just for test
function googlemap_initialize_temp() {
	var mapOptions = {
	  center: new google.maps.LatLng(-27.4095235, 153.00130919999998),
	  zoom: 12,
	  mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);


	var marker = new google.maps.Marker({
	position: map.getCenter(),
	icon: {
		strokeColor: '#f04c5c',
		path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
		scale: 2
	},
	draggable: true,
	map: map
	});
}

// search location on map
function searchPostionInMap(position) {
	var map = googlemap_createMapByPosition("search-map-canvas",position.coords.latitude, position.coords.longitude);
	googlemap_setMaker(position.coords.latitude, position.coords.longitude, map);
	$(".searching-text").css("display", "none");
}

function setCurrentPostion(position) {
	alert(123);
	currentLati = position.coords.latitude;
	currentLogi = position.coords.longitude;
}

// search current location on map
function searchCurrentPosition() {

	 if (navigator.geolocation){
		$(".searching-text").html("Searching your location...");
		navigator.geolocation.getCurrentPosition(searchPostionInMap);
	} else {
		alert("Please open your location service");
	}
}


// create google map in map canvas
function googlemap_createMap(mapCanvasID) {
	var mapOptions = {
	  center: new google.maps.LatLng(-27.4095235, 153.00130919999998),
	  zoom: 10,
	  mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById(mapCanvasID),mapOptions);
	return map;
}

// create google map in map canvas, use Latitude, Longitude as the center
function googlemap_createMapByPosition(mapCanvasID, Latitude, Longitude) {
	var mapOptions = {
	  center: new google.maps.LatLng(Latitude, Longitude),
	  zoom: 10,
	  mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById(mapCanvasID),mapOptions);
	return map;
}

// click maker in map will on the html to show the place detail
// function clickMakerOpenDetail(marker) {
// 	window.open("./content.php?id="+marker.id,"_self");
// }

// set a Maker on map, base on Latitude and Longitude
function googlemap_setMaker(Latitude, Longitude, map, item_id) {
	var myLatlng = new google.maps.LatLng(Latitude, Longitude);
	var image = 'image/Map-Marker2.png';
	var marker = new google.maps.Marker({
		position: myLatlng,
		// icon: {
		// 	strokeColor: '#f04c5c',
		// 	path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
		// 	scale: 4
		// },
		icon: image,
		draggable: true,
		map: map,
		id: item_id
	});

	google.maps.event.addListener(marker, 'click', function(){window.open("./content.php?"+marker.id,"_self");});
}

function googlemap_setMakerAndArea(Latitude, Longitude, map, radius) {
	var myLatlng = new google.maps.LatLng(Latitude, Longitude);
	var marker = new google.maps.Marker({
	position: myLatlng,
	icon: {
		strokeColor: '#428bca',
		path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
		scale: 4
	},
	draggable: true,
	map: map
	});

	var sunCircle = {
        strokeColor: "#428bca",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#428bca",
        fillOpacity: 0.35,
        map: map,
        center: myLatlng,
        radius: radius // in meters
    };
    cityCircle = new google.maps.Circle(sunCircle)
    cityCircle.bindTo('center', marker, 'position');
	//google.maps.event.addListener(marker, 'click', clickMakerOpenDetail('asd'));
}

//change the current menu color
function setCurrentMenu() {
	var text = $('title').text();
	if(text == 'Brisbane Life' || text == 'Content') {
		$('#menu-home').addClass('current');
	}
	
	if(text == 'Search') {
		$('#menu-search').addClass('current');
	}
	
	if(text == 'SignUp') {
		$('#menu-signup').addClass('current');
	}

	if(text == 'About us') {
		$('#menu-aboutus').addClass('current');
	}
}

//simulate login
function login() {
	var email = $('#input-email').val();
	if(email=="") {
		$('#login').html('welcome Tony');
	} else {
		$('#login').html('welcome ' + email);
	}
}

function isValidUserName(userName) {
	//alert(userName);
	if(userName!="" || userName.length != 0) {
		return true;
	}
	return false;
};

function onBlurUserName() {
	$('#signup-input-username').on('blur', function() {
		validateUserName();
	});
}

function validateUserName() {
	var inpValue = $('#signup-input-username').val();
	if(!isValidUserName(inpValue)) {
		$('.error-username-message').css('display','inline');
		return false;
	} else {
		$('.error-username-message').css('display','none');
		return true;
	}
}

//validate email
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    return pattern.test(emailAddress);
};

//validate email when finish input
function onBlurValidateEmail() {
	$('#signup-input-email').on('blur', function() {
		validateEmail();
	});
}

//validate email
function validateEmail() {
	var inpValue = $('#signup-input-email').val();
	if(!isValidEmailAddress(inpValue)) {
		$('.error-email-message').css('display','inline');
		return false;
	} else {
		$('.error-email-message').css('display','none');
		return true;
	}
}

//validate password and re-input password
function onBlueValidatePassword() {
	$('#signup-password').on('blur', function(){
		validatePassword();
	});

	$('#signup-repassword').on('blur', function(){
		validateRePassword();
	});
}

//validate password
function validatePassword() {
	var inpValue = $('#signup-password').val();
	if(inpValue == "" || inpValue.length == 0) {
		$('.error-password-message').css('display','inline');
		return false;
	} else {
		$('.error-password-message').css('display','none');
		return true;
	}
}

//validate re-input password
function validateRePassword() {
	var inpValue = $('#signup-repassword').val();
	var originPass = $('#signup-password').val();
	if(inpValue == "" || inpValue.length == 0 || inpValue != originPass) {
		$('.error-repassword-message').css('display','inline');
		return false;
	} else {
		$('.error-repassword-message').css('display','none');
		return true;
	}
}

//validate email and password
function onBlurValidate() {
	onBlurValidateEmail();
	onBlueValidatePassword();
	onBlurUserName();
}

//signup validate
function validateSignup() {
	if(validateUserName() && validateEmail() && validatePassword() && validateRePassword()) {
		return true;
	} else {
		return false;
	}
}

function setSearchForm(searchName, searchRate, searchLocal) {
	//alert(searchLocal);
	if(searchName != "") {
		$(".search-input-box").val(searchName);
	}
	if(searchRate != "") {
		$(".search-select-box").val(searchRate);
	}
	if(searchLocal != "" && searchLocal == '1') {
		//$("#search-local").attr("checked",true);
		$("#search-local").prop('checked', true);
	} else {
		$("#search-local").prop('checked', false);
	}

}

// init function, init before whole page loaded
function init() {
	onBlurValidate();
}

// init function, init after whole page loaded
function init_afterAllLoaded() {
	setCurrentMenu();
}

//init functions, before html all loaded
$(function(){
	init();
});

//init functions, after html all loaded
$(window).load(function() { 
	init_afterAllLoaded();
});

function search_form_submit() {
	var url = "search.php?";
	var searchName = $(".search-input-box").val();
	var searchRate = $(".search-select-box").val();
	var searchLocal = $("#search-local").val();

	url += 'search-name=' + searchName + '&search-rate=' + searchRate ;
	if($('#search-local').is(':checked')) {
		searchLocal = 1;
		//alert('check');

		if (navigator.geolocation) {
			var location_timeout = setTimeout("geolocFail()", 10000);
			navigator.geolocation.getCurrentPosition(function(position) {
			    clearTimeout(location_timeout);
			    var lat = position.coords.latitude;
			    var lng = position.coords.longitude;
			   // alert(lat);
			    url += '&lati=' + lat + '&logi=' + lng;
			    url += '&searchLocal=' + searchLocal;
				location.href=url;
				}, function(error) {
				    clearTimeout(location_timeout);
				    //geolocFail();
				    alert("Can not search your location!");
				});
			} else {
				//geolocFail();
				alert("Can not search your location!");
			}
	} else {
		searchLocal = 0;
		url += '&searchLocal=' + searchLocal;
		location.href=url;
	}

}