<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>contact</title>
	<link rel="stylesheet" href="css/home.css">
</head>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $messageErr = "";
$name = $email = $subject = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<body>
	<div id="bodyinside">
	<header>
		<div id="logo"><a href="#home"><img src="img/logo.png" alt="My logo"></a></div>
	</header>
	<nav>
		<ul>
			<li><a href="home.html">home</a></li>
			<li><a href="about.html">about us</a></li>
			<li><a href="contact.php">contact</a></li>
		</ul>
	</nav>
	<aside>
		<ul>
			<li>Menu</li>
			<li><a href="#home">home</a></li>
			<li><a href="#about us">about us</a></li>
			<li><a href="#contact">contact</a></li>
		</ul>
	</aside>
	<div id="banner"><a href="#test"><img src="img/banner.png" alt="banner"></a></div>
	<section>
		<div id="map"></div>
		<script>
	      function initMap() {
	        var mapDiv = document.getElementById('map');
	        var map = new google.maps.Map(mapDiv, {
	          center: {lat: 44.540, lng: -78.546},
	          zoom: 8
	        });
	      }
	    </script>
	    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
	        async defer></script>
	</section>
	<article>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<p>Your Name(require)<br><span id="input"><input type="text" name="name"></span>
			<span class="error">* <?php echo $nameErr;?></span></p>
			<p>Your Email (required)<br><span id="input"><input type="text" name = "email"></span>
			<span class="error">* <?php echo $emailErr;?></span></p>
			<p>Subject<br><span id="input"><input type="text" name = "subject"></span></p>
			<p>Your message<br><span id="input"><textarea name="message" id="message" cols="30" rows="10"></textarea></span>
			<span class="error">* <?php echo $messageErr;?></span></p>
			<input type="submit" value="submit" style="color:white;background-color:black">
		</form>
		<h1>Your input</h1>
		<?php echo $name;?>
	</article>
	<footer>
		Copyright © my first website
	</footer>	
	</div>
</body>
</html>