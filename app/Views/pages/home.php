<div class="container">
	<div class="jumbotron my-4" style="background-color: #95afc0;color:white;">
		<h1 class="display-3">What do you feel like doing?</h1>
		<p class="lead">Manage your students attendance..</p>
		<br>
		<br>
		<a  href="<?= base_url() . 'attendance/public/students/block' ?>" class="btn btn-success btn-lg">Take Attendance</a>

		<a href="<?= base_url() . 'attendance/public/attendance/list' ?>" class="btn btn-info btn-lg">View Attendance</a>

		<a href="<?= base_url() . 'attendance/public/students/add' ?>" class="btn btn-secondary btn-lg">Add Student</a>

		<a href="<?= base_url() . 'attendance/public/blocks' ?>" class="btn btn-primary btn-lg">View Blocks</a>
	</div>
</div>