<form action="#" method="post" id="createUser" name="createUser">
        <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Enter Name</label>
          <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Full Name" name="name" value="<?php echo set_value('name'); ?>" style="text-transform: capitalize;">
          <small id="nameHelp" class="form-text text-danger name"></small>
          
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="john@example.com" name="email" value="<?php echo set_value('email'); ?>">
          <small id="emailHelp" class="form-text text-danger email"></small>
        </div>

        <div class="form-group">
          <label for="exampleInputPhone">Phone Number</label>
          <input type="tel" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="+977" name="phone" pattern="[0-9]{10}" value="<?php echo set_value('phone'); ?>">
          <small id="emailHelp" class="form-text text-danger phone"></small>
        </div>

      <div class="form-group">
        <label for="province d-block">Province</label>
      <select class="form-select " aria-label="Default select example" name="province" id="province">
        <option disabled selected>Select Province</option>
        <option value="Province 1">Province 1</option>
        <option value="Province 2">Province 2</option>
        <option value="Province 3">Province 3</option>
      </select>
      <small id="emailHelp" class="form-text text-danger province"></small>

      </div>
        <div class="form-group form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
        <label class="form-check-label" for="inlineRadio1">Male</label>
      </div>
      <div class="form-group form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
        <label class="form-check-label" for="inlineRadio2">Female</label>
      </div>
      <small id="emailHelp" class="form-text text-danger gender"></small>

      <div class="form-group"> 
              <label class="control-label" for="date">Date Of Birth</label>
              <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date" value="<?php echo set_value('date') ?>" min="1935-01-01" max="<?php echo date('Y-m-d') ?>"/>
            </div>
          <small id="emailHelp" class="form-text text-danger date"></small>
      
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </div>
      </form>