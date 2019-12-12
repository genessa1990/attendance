<?php if (isset($students)): ?>
	<ul>
	<?php foreach ($students as $student): ?>
		<li><?= $student['lastname'] . ' ' . $student['id'] ?></li>
	<?php endforeach ?>	
	</ul>
<?php else: ?>
<div class="container">
	<div class="jumbotron">
	<h1>No Absent Student for this day!</h1>
	<a class="btn btn-secondary" href="<?= base_url() . 'attendance/public/attendance/list' ?>">Back to list</a>
</div>
</div>

<?php endif ?>

