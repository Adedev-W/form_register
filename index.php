<?php
session_start(); 
include_once "db/cc.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran TK Harvard</title>
    <link rel="stylesheet" href="css/style_home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <?php include_once "navbar.php"; ?>
    <section class="home">
    	<div class="hero shadow">
	    	<img src="IMG_2485.JPG" class="img-fluid" alt="..." style="filter: brightness(70%);">
		    <div class="hero_content text-start">
			    <h2 class="ff">SELAMAT DATANG DI WEBSITE <span class="fw-bold"><span class="text-danger">TK HARVARD</span></h2>
			    <p class="text-white-50">Sekolah TK dengan siswa lulusan berkualitas tinggi mampu bersaing didunia kerja</p>
			    <a class="btn fw-bold btn-primary" href="register.php" role="button">Join Us</a>
			</div>
    	</div>
    	<div class="about mt-5">
    	    <h1 class="text-start ms-2 fw-bold border-bottom border-black ff">KONTAK</h1>
	    	<div class="ps-1 pe-1 d-flex flex-column">
		        <a class="link-underline link-underline-opacity-0" href="https://api.whatsapp.com/send?phone=6289525500004&text=Hai Admin!" role="button">
				    <h1 class="fw-bold ps-1 text-black-50"><i class="bi bi-whatsapp text-success fs-1 me-1"></i>Whatsapp</h1>
			    </a>
			    <a class="link-underline link-underline-opacity-0" href="https://api.whatsapp.com/send?phone=6289525500004&text=Hai Admin!" role="button">
					<h1 class="fw-bold ps-1 text-black-50"><i class="bi bi-envelope fs-1 text-danger me-1"></i>Email</h1>
				</a>
		    </div>
    	</div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>