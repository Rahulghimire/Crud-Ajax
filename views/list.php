<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to HTML Form</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    <script type="text/javascript"src="<?php echo base_url().'assets/js/jquery-3.6.4.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>

    <style {csp-style-nonce}>
        html, body {
            color: rgba(33, 37, 41, 1);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 16px;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
            margin:20px;
            height:100%;
        }

       .table td, .table th {
        padding: 0.75rem;
        vertical-align: middle;
        }

        .btn:focus,
        .btn:active {
        outline: none !important;
        box-shadow: none !important;
        }

    </style>
</head>
<body>

<!-- Button trigger modal -->

<button type="button" class="btn btn-outline-success my-3" data-toggle="modal" data-target="#exampleModal" onclick="showModal()">
  Add New Record +
</button>

<!-- Modal for form-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div id="response">

      </div>

    </div>
  </div>
</div>


<!-- Delete confirmation modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation!! </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="deleteRow();">Yes</button>
      </div>

    </div>
  </div>
</div>

<!-- Insertion Confirmation Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertModalLabel">Confirmation!! </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<section class="listing">
    <div class="row">
    <div class="col">
    <div class="table-responsive-sm table-responsive-md ">
    <table class="table table-bordered table-striped" id="userModelList">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Province</th>
      <th scope="col">Gender</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>
    <?php if(!empty($rows)) {foreach($rows as $row){?>
     <tr id="row-<?php echo $row['id'] ?>">
      <th scope="row" class="nameModel"><?php echo $row['name']; ?></th>
      <td class="emailModel"><?php echo $row['email']?></td>
      <td class="numberModel"><?php echo $row['pnumber'] ?></td>
      <td class="provinceModel"><?php echo $row['province'] ?></td>
      <td class="genderModel"><?php echo $row['gender'] ?></td>
      <td class="dobModel"><?php echo $row['dob'] ?></td>
      <td>
      <button class="border-0 btn btn-outline-none py-0" onclick="showEditForm(<?php echo $row['id']?>)"> <a id="update" class="btn btn-secondary">Update</a></button>
      <button class="border-0 btn btn-outline-none py-0 my-1 my-md-1" onclick="confirmDelete(<?php echo $row['id']?>)"><a id="delete" class="btn btn-danger">Delete</a></button>  
      </td>
    </tr>
<?php }} else{ ?>
    <tr class="text-info">Records Not Found!!</tr>
    <?php } ?>
   
  </tbody>
</table>
</div>    
</div>
</div>
</section>


<script>

  //Modal and Form Creation 

  function showModal(){

    $('exampleModal').modal("show");
    $("#exampleModal #exampleModalLabel").html("User Registration Form");

    $.ajax({
      url:'<?php echo base_url().'index.php/user/showCreateForm'?>',
      type:'POST',
      data:{},
      dataType:'json',
      success:function(response){
        console.log(response);
        $('#response').html(response["html"]);
      }
    });
  }
  
//Insertion and appending

  $(document).ready(function(){
    $("body").on("submit","#createUser",function(e){
    e.preventDefault();
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var province = $('#province').val();
    var gender = $('input[name=gender]:checked').val();
    var date = $('#date').val();
    console.log(name,email,phone,province,gender,date);

      if(name!=""&&email!=""&&phone!=""&&province!=""&&gender!=""&&date!=""){

      $.ajax({
      url:'<?php echo base_url().'index.php/user/saveModel'?>',
      type:'POST',
      data:$(this).serializeArray(),
      dataType:'json',
      success:function(response){
        console.log(response);
        $('#response').html(response["html"]);

        if(response['status']==0){
          if(response["name"]!==""){
            $('.name').html(response["name"]);
          }
          if(response["email"]!==""){
            $('.email').html(response["email"]);
          }
          if(response["phone"]!==""){
            $('.phone').html(response["phone"]);
          }
          if(response["province"]!==""){
            $('.province').html(response["province"]);
          }
          if(response["gender"]!==""){
            $('.gender').html(response["gender"]);
          }
          if(response["date"]!==""){
            $('.date').html(response["date"]);
          }
        }
  
        else{
          console.log(response["row"]);
          $('#userModelList').append(response["row"]);
          $('#exampleModal').modal("hide");
          $("#insertModal").modal("show");
          $("#insertModal .modal-body").html("Record Inserted Successfully!!");
        }
      }
    });
    }
    else{
      console.log("else executed");
      alert("Enter the fields to continue");
    }
    })
  })


//Edit form and Updation
function showEditForm(id){
  $("#exampleModal #exampleModalLabel").html("User Update Form");
  console.log(id);
  $.ajax({
      url:'<?php echo base_url().'index.php/user/getUserModel/'?>'+id,
      type:'POST',
      data:{},
      dataType:'json',
      success:function(response){
        console.log(response);
        $('#exampleModal #response').html(response["html"]);
        $('#exampleModal').modal("show");
      }
    });
}

//Edit the user
$(document).ready(function(){
    $("body").on("submit","#editUser",function(e){
      console.log("save changes clicked")
      e.preventDefault();

      $.ajax({
      url:'<?php echo base_url().'index.php/user/updateModel'?>',
      type:'POST',
      data:$(this).serializeArray(),
      dataType:'json',
      success:function(response){
        console.log(response);
        $('#response').html(response["html"]);

        if(response['status']==0){
          if(response["name"]!==""){
            $('.name').html(response["name"]);
          }
          if(response["email"]!==""){
            $('.email').html(response["email"]);
          }
          if(response["phone"]!==""){
            $('.phone').html(response["phone"]);
          }
          if(response["province"]!==""){
            $('.province').html(response["province"]);
          }
          if(response["gender"]!==""){
            $('.gender').html(response["gender"]);
          }
          if(response["date"]!==""){
            $('.date').html(response["date"]);
          }
        }
        else{
         // $('#userModelList #response').append(response["row"]);
          $('#exampleModal').modal("hide");
          var id=response["row"]["id"];
          console.log(id);
          $("#row-"+id+" .nameModel").html(response["row"]["name"]);
          $("#row-"+id+" .emailModel").html(response["row"]["email"]);
          $("#row-"+id+" .numberModel").html(response["row"]["pnumber"]);
          $("#row-"+id+" .provinceModel").html(response["row"]["province"]);
          $("#row-"+id+" .genderModel").html(response["row"]["gender"]);
          $("#row-"+id+" .dobModel").html(response["row"]["dob"]);
          $("#insertModal").modal("show");
          $("#insertModal .modal-body").html("Records Updated Successfully");
          $("#insertModal .modal-body").modal("hide");
        }
      }
    });
    })
  })


//Deletion
// This function deletes the records from the table

function confirmDelete(id){
  $("#deleteModal").modal("show");
  $("#deleteModal .modal-body").html("Are you sure you want to delete?");
  $("#deleteModal").data("id",id);
}


function deleteRow(){
  //console.log("yes clicked");
  var id=$("#deleteModal").data("id");
  console.log(id);

  $.ajax({
      url:'<?php echo base_url().'index.php/user/deleteModel/'?>'+id,
      type:'POST',
      data:$(this).serializeArray(),
      dataType:'json',
      success:function(response){
      console.log(response);
      if(response['status']==1){
        //show successful modal $("#ajaxResponseModal .modal-body").html(response["msg"])
        $('#row-' + id).remove();
        $("#deleteModal").modal("hide");
        $("#insertModal").modal("show");
        $("#insertModal .modal-body").html(response["msg"]);
        $("insertModal").modal("hide");
        //$('#userModelList').append(response["row"]);
        //location.reload();
      }
      else{
        $("#deleteModal").modal("hide");  
        //show unsuccessful modal $("#ajaxResponseModal .modal-body").html(response["msg"])
        //$("#ajaxResponseModal").modal("show");
      }
      }
    });
}

</script>

</body>
</html>
