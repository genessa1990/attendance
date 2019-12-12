
<div class="row">
  <div class="col"></div>
  <div class="col">
    <div class="card">
      <h5 class="card-header" style="background-color: #1abc9c;;">Add Student</h5>
      <div class="card-body">
          <?= \Config\Services::validation()->listErrors(); ?>
          <?php if (isset($success_message)) { ?> 
            <div class="alert alert-success"><?= $success_message ?></div>
          <?php } ?>
          <form action="add" method="POST" enctype="multipart/form-data" >
              <div class="form-group">
                <label>Student Id Number</label>
                <input required type="text" name="student_num" class="form-control">
              </div>
              <div class="form-group">
                <label>Lastname</label>
                <input required  type="text" name="lastname" class="form-control">
              </div>
              
              <div class="form-group">
                <label>Firstname</label>
                <input required type="text" name="firstname" class="form-control">
              </div>

              <div class="form-group">
                <label>Block</label>
                <select class="form-control" name="block">
                <?php if(isset($blocks)) :?>
                  <?php foreach ($blocks as $block) : ?>
                    <option value="<?= $block['block'] ?>">Block <?= $block['block'] ?></option>
                  <?php endforeach ?>
                <?php endif ?>
                </select>
              </div>
            <button type="submit" class="btn btn-primary btn-lg">Save</button>
          </form>
      </div>
    </div>
  </div>
  <div class="col"></div>
</div>
