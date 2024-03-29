<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.google.com/specimen/Playfair+Display">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
    <!-- my css file-->
<!-- <link rel="stylesheet" type="text/css" href="videochat2.css"> -->
  <script src='https://meet.jit.si/external_api.js'></script>
  <style>body{
	background-image: url('https://thumbs.dreamstime.com/b/doctor-man-stethoscope-hospital-84232406.jpg');
	background-repeat: no-repeat;
	background-size: 100% 100%;
	font-family: 'Playfair Display';
}

/* div.transbox {
  margin: 30px;
  background-color: black;
  border: 1px solid rgba(214, 169, 245,0.6);
  opacity: 0.6;
  height: 20%;
  text-align: center;

} */

.btn:hover {
	background-color: teal;
	color:white;
	/* border: 2px solid rgba(214, 169, 245,0.8); */
}

.btn{
	color: #853eb5; 
	background-color: white;
	font-size:25px;
	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}</style>
</head>
<body>
<div class="thebody text-center">
<nav class="navbar navbar-dark" style="background-color:shd; box-shadow: 2px 4px rgba(226, 203, 242,0.5)">
  <span class="navbar-brand" style="font-size: 40px; color:black"> Bringing healthcare to your doorstep <br>Video Couceling and Easy Accessing of Medical Records Webpage </span>
</nav>

<div class="container align-items-center " style="margin-top: 15%;">
<div class="transbox text-center"><br><br>
<button id="start" class="btn btn-light btn-lg" type="button"><span style="color:black"><b>Start a New Meeting</b></span></button>
</div>
</div>



<div id="jitsi-container" class="container align-items-center">
</div>

</div>







<script>
var button = document.querySelector('#start');
var container = document.querySelector('#jitsi-container');
var api = null;

button.addEventListener('click', () => {
    var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var stringLength = 30;

    function pickRandom() {
    return possible[Math.floor(Math.random() * possible.length)];
    }

var randomString = Array.apply(null, Array(stringLength)).map(pickRandom).join('');

    var domain = "meet.jit.si";
    var options = {
        "roomName": randomString,
        "parentNode": container,
        "width": 600,
        "height": 600,
    };
    api = new JitsiMeetExternalAPI(domain, options);
});

</script>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>