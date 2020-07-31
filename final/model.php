<?php
$conn = mysqli_connect('localhost', 'dpatelw20', 'Haresh129', 'C354_dpatelw20'); 


/*
*   User management
*/

function is_valid($u, $p) 
{
    global $conn;
    
    $sql = "select * from Users where Username = '$u' and Password = '$p'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function is_new($u) 
{
    global $conn;
    
    $sql = "select * from Users where Username = '$u'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return false;
    else
        return true;
}

function join_a_new_user($u, $p, $email) 
{
    global $conn;
    
    $date = date("Ymd");
    
    $sql = "Insert into Users values (NULL, '$u', '$p', '$email', $date)";
    $result = mysqli_query($conn, $sql);
    
    return $result;
}

function get_deliveryId($id)
{
    global $conn;
    
    $sql = "select * from Delivery where (DeliveryId = '$id')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['deliveryIdId'];
    }
    else
        return -1;
}


function get_userid($username)
{
    global $conn;
    
    $sql = "select * from Users where (Username = '$username')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['UserId'];
    }
    else
        return -1;
}

/*
*   Queries
*/

function post_email($email)
{
    global $conn;
	
    $current_date = date('Ymd');
	console.log("Inserting.....");
    $sql = "Insert into Subscribtion(email, date) values ('$email',$current_date)";
	
    mysqli_query($conn, $sql);
    return true;
}

function post_review($name, $email, $comments )
{
    global $conn;
	
    $current_date = date('Ymd');
	
    $sql = "Insert into Review values ('$name','$email','$comments',$current_date)";
	
    mysqli_query($conn, $sql);
    
    return true;
	
}

function post_delivery($item, $u, $description, $pickup, $dropoff)
{
    global $conn;
    
    $uid = get_userid($u);  
    if ($uid < 0)
        return false;
    
    $current_date = date('Ymd');
	console.log("Inserting.....");
    $sql = "Insert into Delivery(Item, UserId, Date, descriptin, pickup, dropoff ) values ('$item', '$uid', $current_date, '$description', '$pickup', '$dropoff')";

    mysqli_query($conn, $sql);
    
    return true;
}

function post_delivery_job($item, $u, $fname, $lname, $vtype, $vyear)
{
    global $conn;
    
    $uid = get_userid($u);
    if ($uid < 0)
        return false;
    
    $current_date = date('Ymd');
	
    $sql = "Insert into DeliveryJob values ('$item', '$uid', '$fname', '$lname', '$vtype', '$vyear', $current_date)";

    mysqli_query($conn, $sql);
    
    return true;
}


function list_delivery($u)
{
    global $conn;
    
    $uid = get_userid($u);  
    if ($uid < 0)
        return array();
    
    $sql = "Select Item, descriptin, pickup, dropoff, DeliveryId, Date from Delivery where (UserId=$uid)";  // select rows posted by the above userid
    $result = mysqli_query($conn, $sql);
    $data = array();
    $i = 0;
	
	while($row = mysqli_fetch_assoc($result)){// In a loop, fetch a row and save it into the above array
        $data[$i++] = $row;
		
	}
    return $data;
	
}

function apply_delivery($u)
{
    global $conn;
    
    $uid = get_userid($u);  
    if ($uid < 0)
        return array();
    
    $sql = "Select Item, descriptin, pickup, dropoff, DeliveryId, Date from Delivery where (UserId!=$uid)";  // select rows posted by the above userid
    $result = mysqli_query($conn, $sql);
    $data = array();
    $i = 0;
	
	while($row = mysqli_fetch_assoc($result)){// In a loop, fetch a row and save it into the above array
        $data[$i++] = $row;
		
	}
    return $data;
	
}

function delete_delivery($id, $u)
{
    global $conn;
	
	$uid = get_userid($u);  
    if ($uid < 0)
        return array();
    
    $sql = "DELETE FROM Delivery WHERE (DeliveryId = '$id' and UserId= '$uid')";
	
    mysqli_query($conn, $sql);
    
    return true;
	
}

function edit_delivery($id, $item, $description, $pickup, $dropoff)
{
    global $conn;
    
    $did = get_deliveryId($id);  
    if ($did < 0)
        return false;
    
    $sql = "UPDATE Delivery SET Item = '$item', descriptin= '$description', pickup = '$pickup', dropoff= '$dropoff' WHERE DeliveryId = '$id'";
	
    mysqli_query($conn, $sql);
    
    return true;
	
}

function update_password($pass, $u)
{
    global $conn;
    
    $uid = get_userid($u);  
    if ($uid < 0)
        return array();
    
    $sql = "UPDATE Users SET Password = '$pass' WHERE UserId = '$uid' ";
	
    mysqli_query($conn, $sql);
    
    return true;
	
}

function delete_user($u)
{
    global $conn;
	
	$uid = get_userid($u);  
    if ($uid < 0)
        return array();
    
    $sql = "DELETE FROM Users WHERE (UserId= '$uid')";
	
    mysqli_query($conn, $sql);
    
    return true;
	
}

?>   