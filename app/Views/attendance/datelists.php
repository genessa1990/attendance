<div class="container">
<?php foreach ($blocks as $block): ?>
		<h3> Block <?= $block['block'] ?> </h3>
			<?php if(isset($dates)) : ?>
				<table class="table table-hover text-center" style="background-color: #1abc9c;">
				    <thead>
				    	<tr>
				    		<th scope="col">Present</th>
				    		<th scope="col">Absent</th>
				    	</tr>
				    </thead>
				    <tbody class="text-center">
					<?php foreach ($dates as $date): ?>
						<tr>
							<td><a  href="<?= base_url() . 'attendance/public/attendance/present/' . $block['block'] . '/' .  $date['date_attendance'] ?>" style="color: white;text-decoration: none;">View Present Students on <?= $date['date_attendance'] ?></a>
							</td>
								<td><a  href="<?= base_url() . 'attendance/public/attendance/absent/' . $block['block'] . '/' .  $date['date_attendance'] ?>" style="color: white;text-decoration: none;">View Absent Students on <?= $date['date_attendance'] ?></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				</table>
			<?php endif; ?>
		
<?php endforeach ?>
</div>

