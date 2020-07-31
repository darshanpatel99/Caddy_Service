<?php
if (empty($_POST['page'])) {  // When no page is sent from the client; The initial display
                                // You may use if (!isset($_POST['page'])) instead of empty(...).
    $display_type = 'none';  // This variable will be used in 'view_startpage.php'.
                              // It will display the start page without any box, i.e., no SignIn box, no Join box, ...
    $error_message_username = "";
    $error_message_password = "";
    include ('view_startpage.php');
    exit();
}

require('model.php');  // This file includes some routines to use DB.

session_start();
	
// When commands come from StartPage
if ($_POST['page'] == 'StartPage')
{
    $command = $_POST['command'];
    switch($command) {  // When a command is sent from the client
	
		case 'PostEmail':  
            $result = post_email($_POST['email']);
            if ($result)
                return true;
            else
                return false;
            break;
            
		case 'PostReview':  
            $result = post_review($_POST['name'],$_POST['email'], $_POST['comments']);
            if ($result)
                return true;
            else
                return false;
            break;
			
        case 'SignIn':  // With username and password
            // if (there is an error in username and password) {
            if (!is_valid($_POST['username'], $_POST['password'])) {
				
                $error_msg_username = '* Wrong username, or';
                $error_msg_password = '* Wrong password'; // Set an error message into a variable.
                                                        // This variable will used in the form in 'view_startpage.php'.
                $display_type = 'signin';  // It will display the start page with the SignIn box.
                                           // This variable will be used in 'view_startpage.php'.
                include('view_startpage.php');
            } 
            else {
                $_SESSION['SignIn'] = 'Yes';
                $_SESSION['username'] = $_POST['username'];
                include('view_mainpage.php');
            }
            exit();

        case 'Join':  // With username, password, email, some other information
            // if (there is an error in username and password) {
            if (!is_new($_POST['username'])) {
                $join_error_msg_username = '* Username exists';
                $display_type = 'join';  // It will display the start page with the SignIn box.
                                           // This variable will be used in 'view_startpage.php'.
                include('view_startpage.php');
            } 
            else if (join_a_new_user($_POST['username'], $_POST['password'], $_POST['email'])) {
                $error_msg_username = '';
                $error_msg_password = ''; 
                $display_type = 'signin';
                include('view_startpage.php');
            } 
            else {
                $join_error_msg_username = '* Something wrong';
                $display_type = 'join';  // It will display the start page with the SignIn box.
                                           // This variable will be used in 'view_startpage.php'.
                include('view_startpage.php');
            }
            exit();
        //...
    }
}

// When commands come from 'MainPage'
else if ($_POST['page'] == 'MainPage') 
{
    if (!isset($_SESSION['SignIn'])) {
        $display_type = 'none';
        include('view_startpage.php');
        exit();
    }

    $username=$_SESSION['username'];
    $command=$_POST['command'];

    switch($command ) {  
            
		case 'PostDelivery':  
            $result = post_delivery($_POST['item'], $username , $_POST['description'], $_POST['pickup'], $_POST['dropoff']);
            if ($result)
                return true;
            else
                return false;
            break;
			
		case 'PostDeliveryJob':  
            $result = post_delivery_job($_POST['item'], $username , $_POST['fname'], $_POST['lname'], $_POST['vtype'], $_POST['vyear']);
            if ($result)
                return true;
            else
                return false;
            break;
            
		case 'ListDelivery':  
            $result = list_delivery($username);
            if (count($result) == 0)
                echo " No result found!";
            else {  // Trial 6 in 4.3
                $str = "<table class='table table-hover table-striped table-dark'>";

    			$str .= "<tr>"; 
				
    			foreach($result[0] as $k => $v)
					$str .= "<th>" . $k . "</th>";
                $str .= "</tr>";
    
    			for ($i = 0; $i < count($result); $i++) {
        		$str .= "<tr>";
					foreach($result[$i] as $k => $v)
						$str .= "<td>" . $v. "</td>";
						$str .= "</tr>";
				}
				$str .= "</table>";
              echo $str;
            }
            break;
			
			case 'ApplyDelivery':  
            $result = apply_delivery($username);
            if (count($result) == 0)
                echo " No result found!";
            else {  // Trial 6 in 4.3
                $str = "<table class='table table-condensed table-hover'>";
    			$str .= "<tr>"; 
				
    			foreach($result[0] as $k => $v)
					$str .= "<th>" . $k . "</th>";
                $str .= "</tr>";
    
    			for ($i = 0; $i < count($result); $i++) {
        		$str .= "<tr>";
					foreach($result[$i] as $k => $v)
						$str .= "<td>" . $v. "</td>";
						$str .= "</tr>";
				}
				$str .= "</table>";
              echo $str;
            }
            break;
			
        case 'SignOut':  
            session_unset();
            session_destroy();  // It does not unset session variables. session_unset() is needed.
            $display_type = 'none';
            include ('view_startpage.php');
            break;
			
		case 'DeleteDelivery':  
            $result = delete_delivery($_POST['id'], $username);
			console.log('Inside case.....');
            if ($result)
                return true;
            else
                return false;
            break;
		
		case 'DeleteUser':  
            $result = delete_user($username);

            if ($result)
                return true;
            else
                return false;
            break;		
		
			
		case 'UpdatePassword':  
            $result = update_password($_POST['password'], $username);
            if ($result)
                return true;
            else
                return false;
            break;
			
		case 'EditDelivery':  
            $result = edit_delivery($_POST['id'], $_POST['item'], $_POST['description'], $_POST['pickup'], $_POST['dropoff']);
            if ($result)
                return true;
            else
                return false;
            break;
    }
}

else {
	
    //...
}



?>   
