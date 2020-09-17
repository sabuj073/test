<!doctype html>
<html>
<head>
<title>Loan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Responsive Pure CSS Dropdown Menu Demo</title>
<link href="http://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
<style>
* {
  text-decoration: none;
  list-style: none;
  margin: 0px;
  padding: 0px;
  outline: none;
}


section {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  display: table;
  position: relative;
}

h1 {
  margin:150px auto;
  display: table;
  font-size: 26px;
  padding: 40px 0px;
  text-align: center;
}

h1 span { font-weight: 500; }

header {
  width: 100%;
  display: table;
  background-color: black;
  margin-bottom: 50px;
}

#logo {
  float: left;
  font-size: 24px;
  text-transform: uppercase;
  color: white;
  font-weight: 600;
  padding: 20px 0px;
}

nav {
  width: auto;
  float: right;
}

nav ul {
  display: table;
  float: right;
}

nav ul li { float: left; }

nav ul li:last-child { padding-right: 0px; }

nav ul li a {
  color: white;
  font-size: 18px;
  display: inline-block;
  transition: all 0.5s ease 0s;
}

nav ul li a:hover {
  background-color: black;
  color: white;
  transition: all 0.5s ease 0s;
}

nav ul li a:hover i {
  color: white;
  transition: all 0.5s ease 0s;
}
nav ul li a:visited i {
  color: white;
  transition: all 0.5s ease 0s;
}

nav ul li a i {
  padding-right: 10px;
  color: white;
  transition: all 0.5s ease 0s;
}

.toggle-menu ul {
  display: table;
  width: 25px;
}

.toggle-menu ul li {
  width: 100%;
  height: 3px;
  background-color: white;
  margin-bottom: 4px;
}

.toggle-menu ul li:last-child { margin-bottom: 0px; }

input[type=checkbox], label { display: none; }
 @media only screen and (max-width: 1440px) {

section { max-width: 95%; }
}
 @media only screen and (max-width: 980px) {

header { padding: 20px 0px; }

#logo { padding: 0px; }

input[type=checkbox] {
  position: absolute;
  top: -9999px;
  left: -9999px;
  background: none;
}
input[type=checkbox]:fous {
background:none;
}

label {
  float: right;
  padding: 8px 0px;
  display: inline-block;
  cursor: pointer;
}

input[type=checkbox]:checked ~ nav { display: block; }

nav {
  display: none;
  position: absolute;
  right: 0px;
  top: 53px;
  background-color: #002e5b;
  padding: 0px;
  z-index: 99;
}

nav ul { width: auto; }

nav ul li {
  float: none;
  padding: 0px;
  width: 100%;
  display: table;
}

nav ul li a {
  color: white;
  font-size: 15px;
  padding: 10px 20px;
  display: block;
  border-bottom: 1px solid rgba(225,225,225,0.1);
}

nav ul li a i {
  color: white;
  padding-right: 13px;
}
}
 @media only screen and (max-width: 568px) {

h1 { padding: 25px 0px; }

h1 span { display: block; }
}
 @media only screen and (max-width: 480px) {

section { max-width: 90%; }
}
 @media only screen and (max-width: 360px) {

h1 { font-size: 20px; }

label { padding: 5px 0px; }

#logo { font-size: 20px; }

nav { top: 47px; }
}
 @media only screen and (max-width: 320px) {

h1 { padding: 20px 0px; }
}
</style>
</head>

<body>
<header>
  <section>
  <a href="index.php" id="logo"><img src="image/logo.png" style="width: 50px;">Loan</a>
  <label for="toggle-1" class="toggle-menu">
  <ul>
    <li></li>
    <li></li>
    <li></li>
  </ul>
  </label>
  <input type="checkbox" id="toggle-1">
  <nav>
    <ul>
      <!-- <li><a href="#logo"><i class="fa fa-home"></i>Home</a></li>
      <li><a href="#about"><i class="fa fa-user"></i>About</a></li>
      <li><a href="#portfolio"><i class="fa fa-thumb-tack"></i>Portfolio</a></li>
      <li><a href="#services"><i class="fa fa-gears"></i>Services</a></li>
      <li><a href="#gallery"><i class="fa fa-picture-o"></i>Gallery</a></li> -->
      <li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
    </ul>
  </nav>
</header>
</section>
</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

</script>
</html>
