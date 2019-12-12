<?php if (isset($students)): ?>
	<div class="container">
		<table class="table table-hover text-center table-dark">
		<thead>
			<tr>
				<th scope="col">Lastname</th>
				<th scope="col">Firstname</th>
			</tr>		
		</thead>
		<tbody>
		<?php foreach ($students as $student): ?>
			<tr>
				<td><?= $student['lastname'] ?></td>
				<td><?= $student['firstname'] ?></td>
			</tr>
		<?php endforeach ?>	
		</tbody>
		</table>	
	</div>
<?php endif ?>
<div class="container">
	<a class="btn btn-secondary" href="<?= base_url() . 'attendance/public/attendance/list' ?>">Back to list</a>
</div>

