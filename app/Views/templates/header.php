<!doctype html>
<html>
<head>
        <title>Attendance System</title>

		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <style type="text/css">
        	body {
        		margin: 0;
        		padding: 0;
        		overflow-x:hidden; 
        	}
        </style>
</head>
<body>

		<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #16a085;">
		  <a class="navbar-brand" href="<?= base_url(). 'attendance/public' ?>">Attendance</a>

		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="<?= base_url(). 'attendance/public' ?>">Dashboard <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?= base_url() . 'attendance/public/students/block' ?>">Take Attendance</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link <?= $method === 'add' ? 'active' : '' ?>" href="<?= base_url() . 'attendance/public/students/add' ?>">Add Student</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link <?= $method === 'add' ? 'active' : '' ?>" href="<?= base_url() . 'attendance/public/blocks' ?>">Blocks</a>
		      </li>
		    </ul>
		  </div>
		</nav>
		<div class="row">
			<div class="col-lg-4"></div>

			<div class="col-lg-4"><h1 style="margin:35px 0;"></h1></div>
		</div>