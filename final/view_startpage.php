<!DOCTYPE html>

<html>
<head>
    <title>Caddy Service</title>
	  
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
    <style>
		
		body {
			font: 400 15px Lato, sans-serif;
			line-height: 1.8;
			color: #818181;
		  }
		  
		  h2 {
			font-size: 24px;
			text-transform: uppercase;
			color: #303030;
			font-weight: 600;
			margin-bottom: 30px;
		  }
		  h4 {
			font-size: 19px;
			line-height: 1.375em;
			color: #303030;
			font-weight: 400;
			margin-bottom: 30px;
		  }  
		  .jumbotron {
			background-color: #5ac4be;
			color: #fff;
			padding: 100px 25px;
			font-family: Montserrat, sans-serif;
			margin-bottom: -30px;
			
		  }
		  .container-fluid {
			padding: 60px 50px;
		  }
		  .bg-grey {
			background-color: #f6f6f6;
		  }
		  .logo-small {
			color: #003E51;
			font-size: 50px;
		  }
		  .logo {
			color: #003E51;
			font-size: 200px;
		  }
		  .thumbnail {
			padding: 0 0 15px 0;
			border: none;
			border-radius: 0;
		  }
		  .thumbnail img {
			width: 100%;
			height: 100%;
			margin-bottom: 10px;
		  }
		  .carousel-control.right, .carousel-control.left {
			background-image: none;
			color: #f4511e;
		  }
		  .carousel-indicators li {
			border-color: #f4511e;
		  }
		  .carousel-indicators li.active {
			background-color: #f4511e;
		  }
		  .item h4 {
			font-size: 19px;
			line-height: 1.375em;
			font-weight: 400;
			font-style: italic;
			margin: 70px 0;
		  }
		  .item span {
			font-style: normal;
		  }
		  .panel {
			border: 1px solid #f4511e; 
			border-radius:0 !important;
			transition: box-shadow 0.5s;
		  }
		  .panel:hover {
			box-shadow: 5px 0px 40px rgba(0,0,0, .2);
		  }
		  .panel-footer .btn:hover {
			border: 1px solid #f4511e;
			background-color: #fff !important;
			color: #f4511e;
		  }
		  .panel-heading {
			color: #fff !important;
			background-color: #f4511e !important;
			padding: 25px;
			border-bottom: 1px solid transparent;
			border-top-left-radius: 0px;
			border-top-right-radius: 0px;
			border-bottom-left-radius: 0px;
			border-bottom-right-radius: 0px;
		  }
		  .panel-footer {
			background-color: white !important;
		  }
		  .panel-footer h3 {
			font-size: 32px;
		  }
		  .panel-footer h4 {
			color: #aaa;
			font-size: 14px;
		  }
		  .panel-footer .btn {
			margin: 15px 0;
			background-color: #f4511e;
			color: #fff;
		  }
		  .navbar {
			margin-bottom: 0;
			background-color: #003E51;
			z-index: 9999;
			border: 0;
			font-size: 12px !important;
			line-height: 1.42857143 !important;
			letter-spacing: 4px;
			border-radius: 0;
			font-family: Montserrat, sans-serif;
		  }
		  .navbar li a, .navbar .navbar-brand {
			color: #fff !important;
		  }
		  .navbar-nav li a:hover, .navbar-nav li.active a {
			color: #f4511e !important;
			background-color: #fff !important;
		  }
		  .navbar-default .navbar-toggle {
			border-color: transparent;
			color: #fff !important;
		  }
		  footer .glyphicon {
			font-size: 20px;
			margin-bottom: 20px;
			color: #003E51;
		  }
		  .slideanim {visibility:hidden;}
		  .slide {
			animation-name: slide;
			-webkit-animation-name: slide;
			animation-duration: 1s;
			-webkit-animation-duration: 1s;
			visibility: visible;
		  }
		  @keyframes slide {
			0% {
			  opacity: 0;
			  transform: translateY(70%);
			} 
			100% {
			  opacity: 1;
			  transform: translateY(0%);
			}
		  }
		  @-webkit-keyframes slide {
			0% {
			  opacity: 0;
			  -webkit-transform: translateY(70%);
			} 
			100% {
			  opacity: 1;
			  -webkit-transform: translateY(0%);
			}
		  }
		  @media screen and (max-width: 768px) {
			.col-sm-4 {
			  text-align: center;
			  margin: 25px 0;
			}
			.btn-lg {
			  width: 100%;
			  margin-bottom: 35px;
			}
		  }
		  @media screen and (max-width: 480px) {
			.logo {
			  font-size: 150px;
			}
		  }
		
		.modal-window {
			 display: none;background-color: White; 
			 border-bottom: 1px solid rgba(0,0,0,0.09);
			 border-radius: 9px;
			 background-color: white; 
			 box-shadow: 1px 0px 11px 1px rgba(0,0,0,0.2);
			 position: absolute; top: 150px; left: calc(50% - 225px);
			 z-index: 999;
			 padding: 50px;
			 font-size: 16px;
			 width: 450px;
			 text-align: center;
		}
		
		.modal-label{
			display: inline-block; 
			font-size: 20px; 
			font-weight: 500; 
			width: 96px
		}
		
		.input{
			color: rgba(0,0,0,0.9);
			font-weight:500; 
			font-size:18px;
			border:none;
			border-bottom: 1px solid   rgba(0,0,0,0.4);
			display: inline-block
		}
		
		.input:active{
			border:none;  
			outline:none; 
			border-bottom:1px solid rgba(0,0,0,0.4);
		}	
		
		.input:focus{
			border:none; 
			outline:none; 
			border-bottom:1px solid rgba(0,0,0,0.4);
		}
		
		#blanket {
            display: none;
            background-color: LightGrey;
            opacity: 0.5;
            position: fixed; top: 0; left: 0;
            width: 100%;
            height: 100%;
            z-index: 998;
        }
		
    </style>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	
    <div id='blanket'>
    </div>
	
	<!-- SignIn modal window -->
    <div id="signin-box" class="modal-window">
        <h2 style="text-align:center">Sign In</h2>
        <br>
        <form method="post" action="controller.php">
            <input type="hidden" name="page" value="StartPage">
            <input type="hidden" name="command" value="SignIn">
            <label class="modal-label">Username:</label>
            <input class="input" type="text" name="username" required> <?php if (!empty($error_msg_username)) echo $error_msg_username; ?><br><br>
            <label class="modal-label">Password:</label>
            <input class="input" type="password" name="password" required> <?php if (!empty($error_msg_password)) echo $error_msg_password; ?><br>
            <br>
            <input class="btn btn-primary" type="submit">&nbsp;&nbsp;
            <input class="btn btn-danger" id="cancel-signin-button" type="button" value="Cancel">&nbsp;&nbsp;
            <input  class="btn btn-light" type="reset">
        </form>
    </div>

    <!-- Join modal window-->
    <div id='join-box' class='modal-window'>
        <h2 style='text-align:center'>Join</h2>
        <br>
        <form method='post' action='controller.php'>
            <input type='hidden' name='page' value='StartPage'>
            <input type='hidden' name='command' value='Join'>
            <label class='modal-label'>Username:</label>
            <input class="input" type='text' name='username' required> <?php if (!empty($join_error_msg_username)) echo $join_error_msg_username; ?><br>
            <label class='modal-label'>Password:</label>
            <input class="input" type='password' name='password' required><br>
            <label class='modal-label'>Email:</label>
            <input class="input" type='text' name='email' required><br>
            <br>
            <input class="btn btn-primary" type='submit'>&nbsp;&nbsp;
            <input class="btn btn-danger" id='cancel-join-button' type='button' value='Cancel'>&nbsp;&nbsp;
            <input class="btn btn-light" type='reset'>
        </form>
    </div>
	
	
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <a class="navbar-brand" href="#myPage">Caddy</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav navbar-right">
			<!-- <li><a id='menu-signin' data-toggle="modal" data-target="#modal-signin">Sign In</a></li> -->
			<li><a id='menu-signin'>Sign In</a></li>
            <li><a id='menu-join'>Join</a></li>
		  </ul>
		</div>
	  </div>
	</nav>

	<div class="jumbotron text-center">
	  <h1>Caddy Service</h1> 
	  <p>Delivery & Moving Made Easy</p> 
	  <form id='form-subscribe'>
		<div class="input-group">						
		  <input id='input-subscribe' type="email" class="form-control" size="50" placeholder="Email Address" name='email' required>
		  <div class="input-group-btn">
			<button id='submit-subscribe' type="button" class="btn btn-primary">Subscribe</button>

		  </div>
		</div>
	  </form>
	</div>

	<!-- Container (About Section) -->
	<div id="about" class="container-fluid bg-grey">
	  <div class="row">
		<div class="col-sm-9">
		  <h2>About Caddy Service</h2><br>
		  <h4>Have delivery or moving needs? Don’t waste your time or money, use Caddy to find help on your schedule at an affordable price.</h4><br>
		  <p>Caddy Service allows user to request a delivery service. Suppose you don’t have a truck and planning to buy big item like furniture, electronics etc. this website allows user to request a pickup and drop-off. It can be anything like retail store delivery, mini and small moves, labour only moves.</p>
		</div>
		<div class="col-sm-3">
		  <span class="glyphicon glyphicon-hourglass logo"></span>
		</div>
	  </div>
	</div>


	<!-- Container (Services Section) -->
	<div id="services" class="container-fluid text-center">
	  <h2>SERVICES</h2>
	  <h4>What we offer</h4>
	  <br>
	  <div class="row slideanim">
		<div class="col-sm-4">
		  <span class="glyphicon glyphicon-map-marker logo-small"></span>
		  <h4>Store Pickup</h4>
		  <p>Get your purchase home...</p>
		</div>
		<div class="col-sm-4">
		  <span class="glyphicon glyphicon-shopping-cart logo-small"></span>
		  <h4>Small move</h4>
		  <p>Easy way to move item</p>
		</div>
		<div class="col-sm-4">
		  <span class="glyphicon glyphicon-lock logo-small"></span>
		  <h4>Other</h4>
		  <p>Caddy can help for moving item</p>
		</div>
	  </div>
	  <br>
	</div>


	<!-- Container (Contact Section) -->
	<div id="contact" class="container-fluid bg-grey">
	  <h2 class="text-center">Leave a Review</h2>
	  <div class="row">
		<div class="col-sm-5">
		  <p>Contact us and we'll get back to you within 24 hours.</p>
		  <p><span class="glyphicon glyphicon-map-marker"></span> Kamloops, BC</p>
		  <p><span class="glyphicon glyphicon-phone"></span> +1 (250)999-9999</p>
		  <p><span class="glyphicon glyphicon-envelope"></span> Darshan@mytru.com</p>
		</div>
		<div class="col-sm-7 slideanim" id='form-review'>
		  <div class="row">
			<div class="col-sm-6 form-group">
			  <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
			</div>
			<div class="col-sm-6 form-group">
			  <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
			</div>
		  </div>
		  <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
		  <div class="row">
			<div class="col-sm-12 form-group">
			  <button class="btn btn-default pull-right" type="submit" id='submit-review'>Send</button>
			</div>
		  </div>
		</div>
	  </div>
	</div>


	<footer class="container-fluid text-center">
	  <p>Thank You for visiting!</p>
	</footer>
	
	    <!-- SignIn Modal -->
    
    <div class="modal fade" id="modal-signin" role="dialog">  <!-- modal window -->
        <div class="modal-dialog">
            <div class="modal-content">  <!-- modal content -->
                <form id='form-post-question'>
                    <div class='modal-header'>  <!-- modal header -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Request delivery service</h4>
                    </div>
                    <div class='modal-body'>  <!-- modal body -->
						
						<label for='input-post-username'>Username</label>
                        <input id='input-post-username' class='form-control' type='text' autofocus required>
						
						<label for='input-post-password'>Password</label>
                        <input id='input-post-password' class='form-control' type='text' autofocus required>
						
					</div>
						
						<div class='modal-footer'>  <!-- modal footer -->
                        <button id='submit-signin' type="button" class="btn btn-primary">Submit</button>  <!-- not data-dismiss='modal' -->
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
	
</html>

<script>
    <?php 
        if ($display_type == 'signin')
            echo 'show_signin();';
        else if ($display_type == 'join')
            echo 'show_join();';
        else
            ;
    ?>
	
	/*
    *   SignIn
    */
    $('#submit-signin').click(function(e)
    {
        $('#modal-signin').modal('hide');
            
        // Send then'PostQuestion' command using jQuery AJAX
        var u = $('#input-post-username').val();   
		var p = $('#input-post-password').val();
        if (u != "") {
            $.post("controller.php", { page:"StartPage", command: "SignIn", username:u, password:p},
				   function(data){
				
			});
        }
  
    });
	
	/*
    *   Post a Subscription
    */
    $('#submit-subscribe').click(function(e)
    {
        $('#form-subscribe').modal('hide');
            
        // Send then'PostQuestion' command using jQuery AJAX
        var s = $('#input-subscribe').val();   
		
        if (s != "") {
            $.post("controller.php", { page:"StartPage", command: "PostEmail", email:s},
				   function(data){
				
			});
			$('#form-subscribe').html('<h2>Thank you for subscribing!</h2><br>');
        }
        else
            $('#form-subscribe').html('<h2>Something went wrong!</h2><br>');
    });
	
	/*
    *   Post a review
    */
    $('#submit-review').click(function(e)
    {
		console.log('inside script .....');
        $('#form-review').modal('hide');
            
        // Send then'PostQuestion' command using jQuery AJAX
        var n = $('#name').val();   
		var e = $('#email').val();   
        var c = $('#comments').val();   

        if (e != "") {
            $.post("controller.php", { page:"StartPage", command: "PostReview", email:e , name:n, comments:c },
				   function(data){
				
			});
			$('#form-review').html('<h2>Thank you for leaving review!</h2><br>');
        }
        else
            $('#form-subscribe').html('<h2>Something went wrong!</h2><br>');
    });
        
    function show_join() {
        document.getElementById('blanket').style.display = 'block';
        document.getElementById('join-box').style.display = 'block';
    };
    
    function show_signin() {
        document.getElementById('blanket').style.display = 'block';
        document.getElementById('signin-box').style.display = 'block';
    };
    
    document.getElementById('menu-signin').addEventListener('click', function() {
        document.getElementById('blanket').style.display = 'block';
        document.getElementById('signin-box').style.display = 'block';
    });
    document.getElementById('menu-join').addEventListener('click', function() {
        document.getElementById('blanket').style.display = 'block';
        document.getElementById('join-box').style.display = 'block';
    }); 
    document.getElementById('blanket').addEventListener('click', function() {
        document.getElementById('blanket').style.display = 'none';
        document.getElementById('signin-box').style.display = 'none';
        document.getElementById('join-box').style.display = 'none';
    });
    document.getElementById('cancel-signin-button').addEventListener('click', function() {
        document.getElementById('blanket').style.display = 'none';
        document.getElementById('signin-box').style.display = 'none';
        document.getElementById('join-box').style.display = 'none';
    });
    document.getElementById('cancel-join-button').addEventListener('click', function() {
        document.getElementById('blanket').style.display = 'none';
        document.getElementById('signin-box').style.display = 'none';
        document.getElementById('join-box').style.display = 'none';
    });

	  
	  $(window).scroll(function() {
		$(".slideanim").each(function(){
		  var pos = $(this).offset().top;

		  var winTop = $(window).scrollTop();
			if (pos < winTop + 600) {
			  $(this).addClass("slide");
			}
		});
	  });
	
</script>
