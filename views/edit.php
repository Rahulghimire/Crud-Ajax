<form action="" method="post" id="editUser" name="createUser">
  <input type="hidden" name="id" value="<?php echo $row['id']?>">
        <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Enter Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Full Name" name="name" value="<?php echo $row['name'] ?>" style="text-transform: capitalize;">
          <small id="nameHelp" class="form-text text-danger name"></small>
        
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="john@example.com" name="email" value="<?php echo $row['email'] ?>">
          <small id="emailHelp" class="form-text text-danger email"></small>

        </div>
        <div class="form-group">
          <label for="exampleInputPhone">Phone Number</label>
          <input type="tel" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp" placeholder="+977" name="phone" pattern="[0-9]{10}" value="<?php echo $row['pnumber'] ?>">
          <small id="emailHelp" class="form-text text-danger phone"></small>
        </div>

      <div class="form-group">
        <label for="province d-block">Province</label>
      <select class="form-select " aria-label="Default select example" name="province">
        <option disabled selected>Select Province</option>
        <option value="Province 1" <?php echo set_select('province', 'Province 1', ($row['province'] == 'Province 1')); ?>>Province 1</option>
        <option value="Province 2" <?php echo set_select('province', 'Province 2', ($row['province'] == 'Province 2')); ?>>Province 2</option>
        <option value="Province 3" <?php echo set_select('province', 'Province 3', ($row['province'] == 'Province 3')); ?>>Province 3</option>
      </select>
      <small id="emailHelp" class="form-text text-danger province"></small>

      </div>
  <div class="form-group form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male"<?php echo set_radio('gender', 'Male', $row['gender']=='Male'); ?><?php echo $row['gender']=='Male' ? 'checked' : ''; ?>>
  <label class="form-check-label" for="inlineRadio1">Male</label>
</div>
<div class="form-group form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female"<?php echo set_radio('gender', 'Male', $row['gender']=='Female'); ?><?php echo $row['gender']=='Female' ? 'checked' : ''; ?>>
  <label class="form-check-label" for="inlineRadio2">Female</label>
</div>
      <small id="emailHelp" class="form-text text-danger gender"></small>
      <div class="form-group"> 
              <label class="control-label" for="date">Date Of Birth</label>
              <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date" value="<?php echo $row['dob'] ?>" min="1935-01-01" max="<?php echo date('Y-m-d') ?>"/>
            </div>
          <small id="emailHelp" class="form-text text-danger date"></small>
      
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </div>
      </form>