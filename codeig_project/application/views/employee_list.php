<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>CI CRUD</title>
<style type="text/css">
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  //bottom: 23px;
 // width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #000;
    text-align: left;
    padding: 12px;
}

/*tr:nth-child(even) {
    background-color: #dddddd;
}*/
tr.hea_col th{background-color: lightgoldenrodyellow;}
</style>
</head>

<body>

<h2> Employee Details</h2>

<!--<a href="<?php //echo site_url('employee/create'); ?>">-->
	
<!--</a>-->
<?php

 if (!empty($this->session->flashdata('success'))){
        echo '<div class="alert alert-success" style="color:green;padding-bottom:20px;">';
        echo $this->session->flashdata('success');
        echo "</div>";
    }

    if (!empty($this->session->flashdata('errors'))){
        echo '<div class="alert alert-error" style="color:red;padding-bottom:20px;">';
        echo $this->session->flashdata('errors');
        echo "</div>";
    }


    ?>

<?php if(!empty($data)){ ?>

<div class="emp_det" style="border:2px solid #000;padding: 10px 20px 80px 10px;">
<table width="600" border="1" cellpadding="5" style="border:1px solid #000;">

<tr class="hea_col">

<th scope="col">Emp ID</th>

<th scope="col">Employee Name</th>

<th scope="col">Email</th>

<th scope="col">Phone</th>

<th scope="col">DOB</th>

<th scope="col">Action</th>

</tr>

<?php foreach ($data as $u_key){
  //print_r($u_key); 
  ?>

<tr>

<td><?php echo $u_key->Emp_id; ?></td>

<td><?php echo $u_key->Emp_name; ?></td>

<td><?php echo $u_key->Email_id; ?></td>

<td><?php echo $u_key->Phone_no; ?></td>

<td><?php echo date('d-m-Y',strtotime($u_key->Dob)); ?></td>

<!--<td><a href="<?php //echo site_url('dashboard/user_edit/'.$u_key->id); ?>">Edit</a>|<a href="<?php //echo site_url('dashboard/user_delete/'.$u_key->id); ?>">Delete</a></td>-->

<td><a href="#" onclick="show_confirm('edit',<?php echo $u_key->Emp_id; ?>)">Edit</a> / <a href="#" onclick="show_confirm('delete',<?php echo $u_key->Emp_id; ?>)">Del</a></td>

</tr>

<?php }?>

</table>

<div style="padding-top: 50px;text-align:center;">
<button class="open-button" onclick="openForm()">Save</button>
</div>
</div>
<?php } ?>

<?php if(!empty($val)) { ?>
<div class="form-popup" id="myForm" style="display: block;">
  <form action="<?php echo site_url('employee/update/'.$val['Emp_id']); ?>" class="form-container" method="post" enctype="multipart-form/data">
    <h1>Edit</h1>

    <label for="employee"><b>Employee Name</b></label>
    <input type="text" placeholder="Enter Name" name="emp_name" value="<?php echo $val['Emp_name']; ?>" required>

    <label for="email"><b>Email ID</b></label>
    <input type="text" placeholder="Enter Email" name="email" value="<?php echo $val['Email_id']; ?>" required>

    <label for="phone"><b>Phone No</b></label>
    <input type="text" placeholder="Enter Phone no" name="phone_no" value="<?php echo $val['Phone_no']; ?>" required>

    <label for="dob"><b>Date Of Birth</b></label>
    <input type="text" placeholder="Enter DOB" name="dob" id="datepicker" value="<?php echo $val['Dob']; ?>" required>

    <button type="submit" class="btn">Update</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>


<?php } else { ?>
<div class="form-popup" id="myForm">
  <form action="<?php echo site_url('employee/create'); ?>" class="form-container" method="post" enctype="multipart-form/data">
    <h1>Login</h1>

    <label for="employee"><b>Employee Name</b></label>
    <input type="text" placeholder="Enter Name" name="emp_name" required>

    <label for="email"><b>Email ID</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="phone"><b>Phone No</b></label>
    <input type="text" placeholder="Enter Phone no" name="phone_no" required>

    <label for="dob"><b>Date Of Birth</b></label>
    <input type="text" placeholder="Enter DOB" name="dob" id="datepicker" required>

    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<?php } ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

$(function(){
    $("#datepicker").datepicker();
});
</script>

<script type="text/javascript">
	function show_confirm(act,got_id){
		if(act=='edit')
			var r=confirm("Do you really want to edit?");
		else
			var r=confirm("Do you really want to delete?");
		if(r==true){
			window.location = "<?php echo base_url();?>index.php/employee/"+act+"/"+got_id;
		}

	}
	</script>
</body>

</html>
