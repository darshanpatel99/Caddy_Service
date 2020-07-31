<?php
    if (!isset($_SESSION['SignIn'])) {
    	$display_type='';
        include('view_startpage.php');
        exit();
    }
?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
	
	.bg-primary {
		background-color: #003E51;
	}
	
	.bg-info{
		background-color: #5ac4be !important;
	}
	
	/* .bg-success{
		background-color: #007bff !important;
	} */
	
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>

<body>



    <div class='container-fluid'>
        <!-- Header -->
        <div class='row'>
            <div class='col-md-12 bg-primary'>
                <h1 style='text-align:center; padding-top: 10px;'>Caddy Service</h1>
                <h2 style='text-align:center'>Delivery & Moving Made Easy</h2>
                <h3 style='text-align:center; padding-bottom: 10px;'>- User: <?php echo $_SESSION['username']; ?> -</h3>
            </div>
        </div>
        <div class='row'>
            <!-- Navigation -->
            <div class='col-md-2 bg-info'>
                <br>
                <button class='btn btn-primary' id='post-question' data-toggle="modal" data-target="#modal-post-delivery">Request Delivery</button><br>
                <br>
                <button class='btn btn-primary' id='list-delivery'>List My Deliveries</button><br>
                <br>
				<button class='btn btn-primary' id='apply-delivery'>Apply For Deliveries</button><br>
                <br>				
                <button class='btn btn-primary' id='sign-out'>Sign Out</button><br>
                <br>
				<button class='btn btn-primary' id='unsubscribe'>Unsubscribe</button><br>
                <br>
				<button class='btn btn-primary' id='change-profile' data-toggle="modal" data-target="#modal-change-profile">Change profile</button><br>
                <br>
            </div>
            
            <!-- Result -->
            <div class='col-md-10 bg-success' id='result-pane'>
                <h2 style='text-align:center; padding-top: 10px;'>Post or apply for delivery!</h2>
            </div>
        </div>
    </div>

	<footer class="container-fluid">
	  <p style='text-align:center; padding-top: 10px;'>Hope you are enjoying our service!</p>
	</footer>

    <!-- SignOut form -->
    
    <form method='post' action='controller.php' id='form-sign-out' style='display:none'>
        <input type='hidden' name='page' value='MainPage'>
        <input type='hidden' name='command' value='SignOut'>
    </form>
    
    <!-- Post a Delivery -->
    
    <div class="modal fade" id="modal-post-delivery" role="dialog">  <!-- modal window -->
        <div class="modal-dialog">
            <div class="modal-content">  <!-- modal content -->
                <form id='form-post-question'>
                    <div class='modal-header'>  <!-- modal header -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Request delivery service</h4>
                    </div>
                    <div class='modal-body'>  <!-- modal body -->
                        
						<div class="form-group">
						  <label for="input-post-item">Item type:</label>
						  <select class="form-control" id="input-post-item">
							<option>Sofa</option>
							<option>Bed</option>
							<option>Electronics</option>
							<option>Outdoor Furniture</option>
						  </select>
						</div>
						
						<label for='input-post-description'>Description</label>
                        <input id='input-post-description' class='form-control' type='text' autofocus required>
						
						<label for='input-post-pickup'>Pickup Address</label>
                        <input id='input-post-pickup' class='form-control' type='text' autofocus required>
						
						<label for='input-post-dropoff'>DropOff Address</label>
                        <input id='input-post-dropoff' class='form-control' type='text' autofocus required>
					</div>
						
						<div class='modal-footer'>  <!-- modal footer -->
                        <button id='submit-post-question' type="button" class="btn btn-primary">Submit</button>  <!-- not data-dismiss='modal' -->
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
	
	<!-- Delete Modal -->
    
    <div class="modal fade" id="modal-id-input" role="dialog">  <!-- modal window -->
        <div class="modal-dialog">
            <div class="modal-content">  <!-- modal content -->
                <form id='form-post-question'>
                    <div class='modal-header'>  <!-- modal header -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Please enter delivery id</h4>
                    </div>
                    <div class='modal-body'>  <!-- modal body -->
                        <label for='input-delivery-id'>Delivery Id</label>
                        <input id='input-delivery-id' class='form-control' type='text' autofocus required>
						
						
                    </div>
                    <div class='modal-footer'>  <!-- modal footer -->
                        <button id='submit-post-id' type="button" class="btn btn-primary">Submit</button>  <!-- not data-dismiss='modal' -->
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
	
	<!-- change Profile Modal -->
    
    <div class="modal fade" id="modal-change-profile" role="dialog">  <!-- modal window -->
        <div class="modal-dialog">
            <div class="modal-content">  <!-- modal content -->
                <form id='form-post-question'>
                    <div class='modal-header'>  <!-- modal header -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Please enter new password!</h4>
                    </div>
                    <div class='modal-body'>  <!-- modal body -->
                        <input id='input-new-password' class='form-control' type='text' autofocus required>
                    </div>
                    <div class='modal-footer'>  <!-- modal footer -->
                        <button id='submit-post-password' type="button" class="btn btn-primary">Submit</button>  <!-- not data-dismiss='modal' -->
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
	<!-- Delivery Modal -->
    
    <div class="modal fade" id="modal-delivery" role="dialog">  <!-- modal window -->
        <div class="modal-dialog">
            <div class="modal-content">  <!-- modal content -->
                <form id='form-post-question'>
                    <div class='modal-header'>  <!-- modal header -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Please enter delivery id</h4>
                    </div>
                    <div class='modal-body'>  <!-- modal body -->
                        <label for='input-delivery-job'>Delivery id:</label>
                        <input id='input-delivery-job' class='form-control' type='text' autofocus required>
						
						<label for='input-delivery-fname'>First Name:</label>
                        <input id='input-delivery-fname' class='form-control' type='text' autofocus required>
						
						<label for='input-delivery-lname'>Last Name</label>
                        <input id='input-delivery-lname' class='form-control' type='text' autofocus required>
						
						<label for='input-delivery-vtype'>Vehicle Type</label>
                        <input id='input-delivery-vtype' class='form-control' type='text' autofocus required>
						
						<label for='input-delivery-vyear'>Vehicle Year</label>
                        <input id='input-delivery-vyear' class='form-control' type='text' autofocus required>
                    </div>
                    <div class='modal-footer'>  <!-- modal footer -->
                        <button id='submit-delivery' type="button" class="btn btn-primary">Submit</button>  <!-- not data-dismiss='modal' -->
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
	
	<!-- Edit Modal -->
    
    <div class="modal fade" id="modal-id-edit" role="dialog">  <!-- modal window -->
        <div class="modal-dialog">
            <div class="modal-content">  <!-- modal content -->
                <form id='form-post-question'>
                    <div class='modal-header'>  <!-- modal header -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Please enter delivery id</h4>
                    </div>
                    <div class='modal-body'>  <!-- modal body -->
                        <label for='input-post-edit'>Delivery id:</label>
                        <input id='input-post-edit' class='form-control' type='text' autofocus required>
						
						<div class="form-group">
						  <label for="edit-post-item">Item type:</label>
						  <select class="form-control" id="edit-post-item">
							<option>Sofa</option>
							<option>Bed</option>
							<option>Electronics</option>
							<option>Outdoor Furniture</option>
						  </select>
						</div>
						
						<label for='edit-post-description'>Description</label>
                        <input id='edit-post-description' class='form-control' type='text' autofocus required>
						
						<label for='edit-post-pickup'>Pickup Address</label>
                        <input id='edit-post-pickup' class='form-control' type='text' autofocus required>
						
						<label for='edit-post-dropoff'>DropOff Address</label>
                        <input id='edit-post-dropoff' class='form-control' type='text' autofocus required>
						
                    </div>
					
                    <div class='modal-footer'>  <!-- modal footer -->
                        <button id='edit-post-id' type="button" class="btn btn-primary">Submit</button>  <!-- not data-dismiss='modal' -->
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<script>
    /*
    *   Timeout
    */
    
    document.getElementById('sign-out').addEventListener('click', function() {
        timeout();
    })
    
    var timer = setTimeout(timeout, 1000 * 60 * 1000);
    window.addEventListener('mousemove', event_listener_mousemove_or_keydown);
    window.addEventListener('keydown', event_listener_mousemove_or_keydown);  // for keyboard action
    window.addEventListener('unload', function() {  // when the window is closed
        timeout();
    });
    function event_listener_mousemove_or_keydown() {
        clearTimeout(timer);
        timer = setTimeout(timeout, 1000 * 60 * 1000);
    }
    function timeout() {
        document.getElementById('form-sign-out').submit();
    }
    
	/*
    *   Post a delivery request
    */
    $('#submit-delivery').click(function(e)
    {
        $('#modal-delivery').modal('hide');
            
        
        var i = $('#input-delivery-job').val();   
		var f = $('#input-delivery-fname').val();
		var l = $('#input-delivery-lname').val();
		var t = $('#input-delivery-vtype').val();
		var y = $('#input-delivery-vyear').val();
		
        if (i != "") {
            $.post("controller.php", { page:"MainPage", command: "PostDeliveryJob", item:i, fname:f , lname:l, vtype:t , vyear:y},
				   function(data){
				
			});
			$('#result-pane').html('<h2>Succesfully Posted!</h2><br> <p>We will contact you shortly.</p>');
        }
        else
            $('#result-pane').html('<h2>Error updating database!</h2><br>');
    });
    /*
    *   Post a delivery
    */
    $('#submit-post-question').click(function(e)
    {
        $('#modal-post-delivery').modal('hide');
            
        
        var i = $('#input-post-item').val();   
		var d = $('#input-post-description').val();
		var p = $('#input-post-pickup').val();
		var dropoff = $('#input-post-dropoff').val();
		
        if (i != "") {
            $.post("controller.php", { page:"MainPage", command: "PostDelivery", item:i , description:d, pickup:p , dropoff:dropoff},
				   function(data){
				
			});
			$('#result-pane').html('<h2>Succesfully Posted!</h2><br>');
        }
        else
            $('#result-pane').html('<h2>Error updating database!</h2><br>');
    });

    /*
    *   List delivery
    */
    $('#list-delivery').click(function(e) {
        
	  var url = "controller.php";
	  
      var query = {page:'MainPage', command:'ListDelivery'};
       $.post (url,query, function(data) { 
			$('#result-pane').html('<h2>List Delivery</h2><br><button data-toggle="modal" data-target="#modal-id-input" class="btn btn-danger" type="button" >Delete Delivery</button> &nbsp;&nbsp;<button data-toggle="modal" data-target="#modal-id-edit"   class="btn btn-danger" type="button" >Edit Delivery</button> <br><br>' + data); 
	   });
	   
	});
	
	/*
    *   delete Delivery
    */
    $('#submit-post-id').click(function(e)
    {
        $('#modal-id-input').modal('hide');
            
        
        var i = $('#input-delivery-id').val();   
		
        if (i != "") {
            $.post("controller.php", { page:"MainPage", command: "DeleteDelivery", id:i },
				   function(data){
				
			});
			$('#result-pane').html('<h2>Succesfully Deleted!</h2><br>');
        }
        else
            $('#result-pane').html('<h2>Error updating database!</h2><br>');
    });
	
	/*
    *   Update Password!
    */
    $('#submit-post-password').click(function(e)
    {
        $('#modal-change-profile').modal('hide');
            
        
        var i = $('#input-new-password').val();   
		
        if (i != "") {
            $.post("controller.php", { page:"MainPage", command: "UpdatePassword", password:i },
				   function(data){
				
			});
			$('#result-pane').html('<h2>Succesfully Updated!</h2><br>');
        }
        else
            $('#result-pane').html('<h2>Error updating database!</h2><br>');
    });
	
	/*
    *   edit a delivery
    */
    $('#edit-post-id').click(function(e)
    {
        $('#modal-id-edit').modal('hide');
            
        
		var id = $('#input-post-edit').val();
        var i = $('#edit-post-item').val();   
		var d = $('#edit-post-description').val();
		var p = $('#edit-post-pickup').val();
		var dropoff = $('#edit-post-dropoff').val();
		
        if (id != "") {
            $.post("controller.php", { page:"MainPage", command: "EditDelivery", item:i , description:d, pickup:p , dropoff:dropoff, id:id },
				   function(data){
				
			});
			
			$('#result-pane').html('<h2>Succesfully Edited!</h2><br> <br><p> Thank you for keeping updated! </p>');
			
        }
		else
            $('#result-pane').html('<h2>Error updating database!</h2><br>');

    });
	
	/*
    *   Apply for delivery
    */
    $('#apply-delivery').click(function(e) {
        
	  var url = "controller.php";
	  
      var query = {page:'MainPage', command:'ApplyDelivery'};
       $.post (url,query, function(data) { 
			$('#result-pane').html('<h2>Apply for delivery </h2><br><button data-toggle="modal" data-target="#modal-delivery" class="btn btn-danger" type="button" >Apply now</button> <br><br>' + data); 
	   });
	   
	});

    /*
    *   Sign out
    */
    $("#sign-out").click(function() {
        $.post("controller.php",
            {page:"MainPage", command:"SignOut"},
            function(data) {}
        );
    })
	
	$("#btnDelete12").on('click', '.btnDelete', function () {
		cosole.log('inside click....');
		$(this).closest('tr').remove();
	});
	
	$(".btnDelete").click(function() {
		console.log('aaaaa');
	})
	
	/*
    *   Unsubscribe
    */
    $('#unsubscribe').click(function(e) {
        
	  var url = "controller.php";
	  
      var query = {page:'MainPage', command:'DeleteUser'};
       $.post (url,query, function(data) { 
			
	   });
	   timeout();
	});
	
</script>
