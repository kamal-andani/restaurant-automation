
<style>

.rating {
    float:left;
}

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
.rating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0,0,0,0);
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:200%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '★ ';
}

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
}

h1
{
	
	color:black;
	font-family:verdana;
}
div {
    pedding:15px;
    margin: auto;
  }


div.transbox {
  margin: 30px;
  background-color: white;
  
  opacity: 0.8;
  filter: alpha(opacity=60); /* For IE8 and earlier */
}
div.transbox axz {
  margin: 5%;
  font-weight: bold;
  color:black;
}
#page-wrap { 
  background: url(spoon.jpg) no-repeat fixed;
  width: 500px; margin: 40px auto;
}
</style>
<html>
<title> Contact Us </title>
	<head>

<link rel="stylesheet" type="text/css" href="../css/materialize.css">

</head>

<body background="../pic/contact4.jpg" style="background-size:cover;">




	<div class="row">
	<center><h1  style="font-family: Brush Script MT;font-size: 100px; color: rgb(0,0,0);" >Paradise Cuisine</h1></center>
</div>
		<div class="right-align" style="margin-right:10px; ">
 			<h4>Call us: 1800 3800 3800</h4> 
		</div>
			<div class="row">
				
				<div class="col s3">
					<div class="divider"></div>
					<div class="section">
					
						<h5>Contact Details </h5>
						<p>Call Center</p>
						1800 3800 3800
						<p>Timings: 11:00 am - 10:00 pm </p>
					</div>
					<div class="divider"></div>
					<div class="section">
							<h5>Our Address</h5>
							<p>Paradise Cuisine<br>
							1st Floor, Alpha One Mall<br>Vastrapur,<br>Ahmedabad-380012.</p>
					</div>	
					<div class="divider"></div>
					<div class="section">
						<p>	<b>Email:</b> &nbsp; paradise_cuisine@gmail.com</p>
					</div>
          <div class="divider"></div>
          <div class="section">
            <p> <h4><b><a href="../home.php">Back To Home</a></b></h4></p>
          </div>

					
					
				</div>
			
				<form class="col s9" action="contactverify.php" method="POST">
					
					
					<h5 class="center-align"><b>Give us Feedback</b></h5>
			<?php		if(isset($_GET['msg']))
						{
							echo "<br><h5>" .$_GET['msg']."</h5><br>";
						}
			?>
					<div class="row">
					 Name:
          				<div class="input-field inline">
      				      		<input placeholder="Enter your name here" id="uname" name="uname" type="text" class="validate">
        				       
					</div>  <br>Email:
       					   <div class="input-field inline">
            					<input placeholder="Enter valid email" name="email" id="email" type="email" class="validate">
					            <label for="email" data-error="wrong" data-success="right"></label>
					</div>
					<br>Comments:
					<div class="input-field">
       					   <textarea placeholder="Express your Views/thoughts here" name="textarea1"  id="textarea1" class="materialize-textarea"></textarea>
    					      <label for="textarea1"></label>
    				        </div>
					</div>
					<div class="row">
					Give us ratings:(FOR our Services)&nbsp;
          </div>
				<div class="row">
<fieldset class="rating" >
    <input type="radio" id="star5" name="rating" value="5"  /><label for="star5" title="Excellent">5 stars</label>
    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
      <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="average">3 stars</label>
    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="bad">2 stars</label>   
   
    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="verybad">1 star</label>
    
 
</fieldset>
</div>
<div class="row">
					
    <legend>Give us rating:(For our Food)</legend>
   


<fieldset class="rating" >
    <input type="radio" id="star15" name="rating1" value="5"  /><label for="star15" title="Excellent!!!">5 stars</label> 
    <input type="radio" id="star14" name="rating1" value="4" /><label for="star14" title="Pretty good">4 stars</label>
    <input type="radio" id="star13" name="rating1" value="3" /><label for="star13" title="average">3 stars</label>
<input type="radio" id="star12" name="rating1" value="2" /><label for="star12" title="bad">2 stars</label>   
    <input type="radio" id="star11" name="rating1" value="1" /><label for="star11" title="verybad">1 star</label>
    
    
    
 	
</fieldset>
  </div>
  <div class="row">
				<button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right"></i>
  </button>
			</div>

			</form>

	
	<div class="row">
		
    <style>
       #map {
        height: 400px;
        width: 80%;
       }
    </style>
<div class="col s1"></div>
<div class="col s11">
    <h3>Reach us </h3>
</div>
</div>

    <div id="map"></div>
    <script>
      function initMap() {
        var myloc = {lat: 23.039965, lng:72.530938};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: myloc
        });
        var marker = new google.maps.Marker({
          position: myloc,
          map: map
        });
      }
    </script>
    <div class="z-depth-5">
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL24o4mvs-QYWueqA1MSKmFOWHST1SgC0&callback=initMap">
    </script>
  </div>

   <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">PARADISE CUISINE</h5>
                <p class="grey-text text-lighten-4">By :Kamal Andani<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bansi Kasundra<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Deep Patel</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Site Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="../home.php">Home</a></li>
                  <li><a class="grey-text text-lighten-3" href="contact.php">Contact Us</a></li>
                  
                  <li><a class="grey-text text-lighten-3" href="../menu1.php">Menu</a></li>
                 
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright  THIS IS US
           
            </div>
          </div>
        </footer>

  
</body>
</html>
	