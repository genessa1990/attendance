<div class="row pt-5">
  <div class="col"></div>
  <div class="col">
    <div class="card">
      <h5 class="card-header" style="background-color: #1abc9c;;">Add Block</h5>
      <div class="card-body">
          <?= \Config\Services::validation()->listErrors(); ?>
          <?php if (isset($success_message)) { ?> 
            <div class="alert alert-success"><?= $success_message ?></div>
          <?php } ?>
          <form action="add_block" method="POST" enctype="multipart/form-data" >
              <div class="form-group">
                <label>Block</label>
                <input required type="text" name="block" class="form-control">
              </div>
   
            <button type="submit" class="btn btn-primary btn-lg">Save Block</button>
          </form>
      </div>
    </div>
  </div>
  <div class="col"></div>
</div>
