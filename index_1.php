<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'], $_SESSION['Role'] )) {
	header('Location: login.html');
	exit();
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Google Map</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDWCovltbcCEWyjbR5vvuby1IKkuNM9HIg&sensor=false"></script>
<script type="text/javascript">
$(document).ready(function() {

	var mapCenter = new google.maps.LatLng(35.862499, 10.195556); 
	var map;
	
	map_initialize(); 
	

	function map_initialize()
	{
			var googleMapOptions = 
			{ 
				center: mapCenter, 
				zoom: 8, 
				maxZoom: 18,
				minZoom: 4,
				zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL 
			},
				scaleControl: true, 
				mapTypeId: google.maps.MapTypeId.ROADMAP 
			};
		
		   	map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);			
			
			//Load Markers from the XML File, Check (map_process.php)
			$.get("map_process.php", function (data) {
				$(data).find("marker").each(function () {
					  var name 		= $(this).attr('name');
					  var address 	= '<p>'+ $(this).attr('address') +'</p>';
					  var type 		= $(this).attr('type');
					  var point 	= new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
					  create_marker(point, name, address, false, false, false, "http://localhost/data_markers/icons/pin_blue.png");
				});
			});	
			
			//Right Click to Drop a New Marker
			google.maps.event.addListener(map, 'rightclick', function(event) {
				
				var EditForm = '<p><div class="marker-edit">'+
				'<form action="ajax-save.php" method="POST" name="SaveMarker" id="SaveMarker">'+
				'<label for="pName"><span>Place Name :</span><input type="text" name="pName" class="save-name" placeholder="Enter Title" maxlength="40" /></label>'+
				'<label for="pDesc"><span>Description :</span><textarea name="pDesc" class="save-desc" placeholder="Enter Address" maxlength="150"></textarea></label>'+
				'<label for="pType"><span>Type :</span> <select name="pType" class="save-type"><option value="restaurant">Rastaurant</option><option value="Coffee">Coffee</option>'+
				'<option value="house">House</option><option value="hotel">Hotel</option></select></label>'+
				'</form>'+
				'</div></p><button name="save-marker" class="save-marker">Save Marker Details</button>';

				
				create_marker(event.latLng, 'New Marker', EditForm, true, true, true, "http://localhost/data_markers/icons/pin_blue.png");
			});
										
	}
	
	//Marker Function 
	function create_marker(MapPos, MapTitle, MapDesc,  InfoOpenDefault, DragAble, Removable, iconPath)
	{	  	  		  
		
		//new marker
		var marker = new google.maps.Marker({
			position: MapPos,
			map: map,
			draggable:DragAble,
			animation: google.maps.Animation.DROP,
			title:"Hello World!",
			icon: iconPath
		});
		
		
		var contentString = $('<div class="marker-info-win">'+
		'<div class="marker-inner-win"><span class="info-content">'+
		'<h1 class="marker-heading">'+MapTitle+'</h1>'+
		MapDesc+ 
		'</span><button name="remove-marker" class="remove-marker" title="Remove Marker">Remove Marker</button>'+
		'</div></div>');	

		
		//Create an infoWindow
		var infowindow = new google.maps.InfoWindow();
	
		infowindow.setContent(contentString[0]);

	
		var removeBtn 	= contentString.find('button.remove-marker')[0];
		var saveBtn 	= contentString.find('button.save-marker')[0];

		
		google.maps.event.addDomListener(removeBtn, "click", function(event) {
			remove_marker(marker);
		});
		
		if(typeof saveBtn !== 'undefined') 
		{
		
			google.maps.event.addDomListener(saveBtn, "click", function(event) {
				var mReplace = contentString.find('span.info-content');
				var mName = contentString.find('input.save-name')[0].value;
				var mDesc  = contentString.find('textarea.save-desc')[0].value;
				var mType = contentString.find('select.save-type')[0].value; 
				
				if(mName =='' || mDesc =='')
				{
					alert("Please enter Name and Description!");
				}else{
					save_marker(marker, mName, mDesc, mType, mReplace); 
				}
			});
		}
		
		//add click listner to save marker button		 
		google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker); 
	    });
		  
		if(InfoOpenDefault) 
		{
		  infowindow.open(map,marker);
		}
	}
	
	// Remove Marker Function
	function remove_marker(Marker)
	{
		
		
		if(Marker.getDraggable()) 
		{
			Marker.setMap(null); 
		}
		else
		{
			//Remove saved marker 
			var mLatLang = Marker.getPosition().toUrlValue(); 
			var myData = {del : 'true', latlang : mLatLang}; 
			$.ajax({
			  type: "POST",
			  url: "map_process.php",
			  data: myData,
			  success:function(data){
					Marker.setMap(null); 
					alert(data);
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert(thrownError); 
				}
			});
		}

	}
	
	// Save Marker 
	function save_marker(Marker, mName, mAddress, mType, replaceWin)
	{
		
		var mLatLang = Marker.getPosition().toUrlValue(); 
		var myData = {name : mName, address : mAddress, latlang : mLatLang, type : mType }; 
		console.log(replaceWin);		
		$.ajax({
		  type: "POST",
		  url: "map_process.php",
		  data: myData,
		  success:function(data){
				replaceWin.html(data); 
				Marker.setDraggable(false); 
				Marker.setIcon('http://localhost/data_markers/icons/pin_green.png'); 
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); 
            }
		});
	}

});


















</script>

<style type="text/css">
h1.heading{padding:0px;margin: 0px 0px 10px 0px;text-align:center;font: 18px Georgia, "Times New Roman", Times, serif;}

/* width and height of google map */
#google_map {width: 100%; height: 820px;margin-top:0px;margin-left:auto;margin-right:auto;}

/* Marker Edit form */
.marker-edit label{display:block;margin-bottom: 5px;}
.marker-edit label span {width: 100px;float: left;}
.marker-edit label input, .marker-edit label select{height: 24px;}
.marker-edit label textarea{height: 60px;}
.marker-edit label input, .marker-edit label select, .marker-edit label textarea {width: 60%;margin:0px;padding-left: 5px;border: 1px solid #DDD;border-radius: 3px;}

/* Marker Info Window */
h1.marker-heading{color: #585858;margin: 0px;padding: 0px;font: 18px "Trebuchet MS", Arial;border-bottom: 1px dotted #D8D8D8;}
div.marker-info-win {max-width: 300px;margin-right: -20px;}
div.marker-info-win p{padding: 0px;margin: 10px 0px 10px 0;}
div.marker-inner-win{padding: 5px;}
button.save-marker, button.remove-marker{border: none;background: rgba(0, 0, 0, 0);color: #00F;padding: 0px;text-decoration: underline;margin-right: 10px;cursor: pointer;

</style>
</head>
<body>  
<div style="float: right; margin: 10px 50px 0px 0px;">
<h1 class="heading" > <b> <a href="logout.php">Logout</a></b></h1></div>
<img src="icons/1_kLk2H7qaThoE3afAd2Glmw.png" style="float: left; margin: -19px -250px 0px 0px;" width="280" height="70">
<div style="text-align: center">
<h1 class="heading" > <b> My Google Map App</b></h1>
<div align="center">Right Click to Drop a New Marker</div>
</div>
<div id="google_map"></div>
</body>
</html>