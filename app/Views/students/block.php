<div class="row">
<?php if(isset($success_message)): ?>
  <div class="col-lg-12" style="text-align: center;">
    <div class="alert alert-success">
      <?= $success_message ?>
    </div>
  </div>  
<?php endif; ?>

<?php if(isset($students)): ?>
	<div class="col-lg-1"></div>
    <div class="col-lg-10">
    <div class="row">
    	<div class="col-lg-4">
			    <div class="form-group">
			    	<label>Date Today</label>
			    	<input type="text" name="" class="form-control" value="<?= $today ?>" disabled style="text-align: center;">
			    </div>
    	</div>
    	<div class="col-lg-4">
    		
    	</div>
    	<div class="col-lg-4" style="text-align: right;">
    		<div class="dropdown">
				  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				   	Blocks   
				  </a>

				  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
				   <!--  <a class="dropdown-item" href="#">Action</a>
				    <a class="dropdown-item" href="#">Another action</a>
				    <a class="dropdown-item" href="#">Something else here</a> -->

				    <?php if(isset($blocks)) :?>
				    	<?php foreach ($blocks as $block) : ?>
				    		<a href="<?= base_url() . 'attendance/public/students/block/' . $block['block'] ?>" class="dropdown-item">Block <?= $block["block"] ?></a>
				    	<?php endforeach ?>
				   	<?php endif ?>
				  </div>
				</div>
    	</div>
    </div>
   <table class="table table-hover text-center" style="background-color: #1abc9c;">
    <thead>
    	<tr>
    		<th scope="col">Student Number</th>
    		<th scope="col">Lastname</th>
    		<th scope="col">Firstname</th>
    		<th scope="col">Block</th>
    		<th scope="col">Take Attendance</th>
    	</tr>
    </thead>
    <tbody class="text-center">
  	<?php foreach ($students as $student):?>
    		<tr>
    			<td><?= $student['student_num'] ?></td>
    			<td><?= $student['lastname'] ?></td>
    			<td><?= $student['firstname'] ?></td>
    			<td><?= $student['block'] ?></td>

    			<?php if(isset($attendees)) :?>
						<?php if(!in_array($student['id'], $attendees)): ?>
			    			<td><a href="<?= base_url(). 'attendance/public/'; ?>attendance/take_attendance/<?= $student['id'] ?>" class="btn btn-success">Present</a>
			    				<a href="<?= base_url(). 'attendance/public/'; ?>attendance/take_absence/<?= $student['id'] ?>" class="btn btn-danger">Absent</a>
			    			</td>
			    		<?php else: ?>
			    			<td></td>
						<?php endif; ?>
				<?php else: ?>
			    			<td><a href="<?= base_url(). 'attendance/public/'; ?>attendance/take_attendance/<?= $student['id'] ?>" class="btn btn-success">Present</a>
			    				<a href="<?= base_url(). 'attendance/public/'; ?>attendance/take_absence/<?= $student['id'] ?>" class="btn btn-danger">Absent</a>
			    			</td>
    			<?php endif ?>

    		</tr>
 	 <?php endforeach;?>
 	 </tbody>
  	</table>
    </div>
  <?php endif; ?>
</div>

