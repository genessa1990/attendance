<div class="row">
<?php if(isset($success_message)): ?>
  <div class="col-lg-12" style="text-align: center;">
    <div class="alert alert-success">
      <?= $success_message ?>
    </div>
  </div>  
<?php endif; ?>
</div>
<div class="container">
	<?php if(isset($blocks)) : ?>
	<table class="table table-hover text-center" style="background-color: #1abc9c;">
    <thead>
    	<tr>
    		<th scope="col">Block Name</th>
    		<th scope="col">Delete Block</th>
    		<th scope="col">Take attendance</th>
    	</tr>
    </thead>
    <tbody class="text-center">
	<?php foreach ($blocks as $block): ?>
		<tr>
			<td>Block <?= $block['block'] ?></td>
			<td><a  href="<?= base_url() . 'attendance/public/blocks/remove_block/' . $block['id'] ?>" type="button" class="btn btn-danger">Remove Block <?= $block['block'] ?></a></td>
			<td><a class="btn btn-success" href="<?= base_url() . 'attendance/public/students/block/' . $block['block'] ?>" class="dropdown-item">Take Attendance for Block <?= $block["block"] ?></a></td>
		</tr>
	<?php endforeach ?>
	</tbody>
	</table>
<?php endif ?>

<a href="<?= base_url() . 'attendance/public/blocks/add_block' ?>" class="btn btn-primary">Add New Block</a>
</div>
