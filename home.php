<style type="text/css">
.verti{
	width: 1px;
	background-color: black;
	height: 22%;
	float:right;
	
}
.verti1{
	border-left: thin solid #ff0000;

}
.divider1 {

  height: 5px;
  overflow: hidden;
  background-color: #e0e0e0;
}</style>

<!DOCTYPE html>
<html>
<head>
	<title>HOME PAGE</title>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"> -->
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
</head>
<body background="pic/woodbk.jpg">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<?php
session_start();

?>

<div class="row">
  <center><h1 class="z-depth-0 col s11 offset-l1" style="font-family: Brush Script MT;font-size: 150px; color: rgb(0,0,0); text-shadow: 2px 2px 8px #FFFFFF;" >Paradise Cuisine</h1></center>
</div>

<?php
  if(isset($_GET['msg']))
        {
          echo "<div class='row '><div class='col s3 offset-s4 card-panel yellow z-depth-2 '><center><h5>".$_GET['msg']."</h5></center></div></div>";
        }
?>

<!--<div class="center-align">
	<h1>Paradise Cuisine</h1>
</div> -->
<div class="row">
<div class="col s1"></div>
<div class="col s4">
<div class="card medium z-depth-5">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="pic/food1.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Menu<i class="material-icons right">...</i></span>
      <p><a href="menu1.php"><b>Click Here To See Menu</b></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Info<i class="material-icons right">close</i></span>
      <p>To see Menu And Food Items click the link </p>
    </div>
  </div>
  </div>
  <div class="col s1"></div>
  <div class="col s4">
<div class="card medium z-depth-5">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="pic/table.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Book Table<i class="material-icons right">...</i></span>
      <p><a href="usertable/tablebook.php"><b>Click Here To Book Table</b></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Info<i class="material-icons right">close</i></span>
      <p>To Book a Table in our restaurent for party,bussiness meetings or any personal event ,click the Link </p>
    </div>
  </div>
  </div>
  </div>
  <div class="row">
<div class="col s1"></div>
<div class="col s4">
<div class="card medium z-depth-5">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="pic/gallary.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Gallery<i class="material-icons right">...</i></span>
      <p><a href="gallary.php"><b>Click Here To View Gallary</b></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Info<i class="material-icons right">close</i></span>
      <p>To see pictures of the restaurant click on link </p>
    </div>
  </div>
  </div>
  <div class="col s1"></div>
  <div class="col s4">
<div class="card medium z-depth-5">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="pic/piccontact.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Contact Us<i class="material-icons right">...</i></span>
      <p><a href="contact/contact.php"><b>Click Here To Contact Us</b></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Info<i class="material-icons right">close</i></span>
      <p>To Reach Us Or Contact Us,To Give FeedBack  Or To See Our Address,click the Link </p>
    </div>
  </div>
  
  </div>
  </div>


          <?php

          try{
                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
    
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $stmt2 = $dbhandler->prepare("SELECT * FROM userreview where apply=1"); 
            $stmt2->execute();
            $result = $stmt2->setFetchMode(PDO::FETCH_ASSOC); 
    
          if($result)
           { 
                echo "<center><h3 class='z-depth-3' style='font-family : Comic Sans'>REVIEWS</h3></center>";
             echo  "<div class='row'><div class='col s12 '><div class='slider' >
    <ul class='slides'>";
             // echo "<br>";
                foreach($stmt2->fetchAll() as $row)
                  {

                   echo "<li><img src='pic/review1.jpg'> <div class='caption center-align'>";

                  echo "<h3>".$row['name']."</h3>";
                  echo "<h5 class='light grey-text text-lighten-3'>".$row['comments']."</h5><br>";
                  echo "<h5 class='light grey-text text-lighten-3'>Rating For Services:".$row['ratingser']."</h5>";
                  echo "<h5 class='light grey-text text-lighten-3'>Rating for Food:".$row['ratingfood']."</h5>";

                  echo "</div>
                        </li>";  
                 //   echo "<div class='row'><div class='col s5'>";
                   // echo "<br>";
                  //  echo $row['name'] ."<br>";
                  //  echo $row['comments']."<br>";
                  //  echo "</div></div>";
                  }
                  echo "</ul></div></div></div>";
           }
         }
         catch(PDOException $e) {
}
          ?>

      <script type="text/javascript">$(document).ready(function(){
      $('.slider').slider();
    });</script>
        

<br><br><br>
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
                	<li><a class="grey-text text-lighten-3" href="home.php">Home</a></li>
                  <li><a class="grey-text text-lighten-3" href="contact/contact.php">Contact Us</a></li>
                  
                  <li><a class="grey-text text-lighten-3" href="menu1.php">Menu</a></li>
                 
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