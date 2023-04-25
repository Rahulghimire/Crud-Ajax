<tr id="row-<?php echo $row['id'] ?>">
      <th scope="row" class="nameModel"><?php echo $row['name'] ?></th>
      <td class="emailModel"><?php echo $row['email']?></td>
      <td class="numberModel"><?php echo $row['pnumber'] ?></td>
      <td class="provinceModel"><?php echo $row['province'] ?></td>
      <td class="genderModel"><?php echo $row['gender'] ?></td>
      <td class="dobModel"><?php echo $row['dob'] ?></td>
      <td>
      <button class="border-0 btn btn-outline-none py-0" onclick="showEditForm(<?php echo $row['id']?>)"> <a id="update" class="btn btn-secondary">Update</a></button>
      <button class="border-0 btn btn-outline-none py-0 my-1 my-md-1" onclick="confirmDelete(<?php echo $row['id']?>)"><a href="#" id="delete" class="btn btn-danger">Delete</a></button>  
      </td>
    </tr>