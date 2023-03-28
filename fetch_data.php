<?php
     $con = mysqli_connect("localhost","username","password","dbname");

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

       $sql = "SELECT category_id,category_name from tbl_category";
        $result = mysqli_query($con, $sql);
        
        	$temp = array();
    		$result = mysqli_query($con,$sql);
    		while($row=mysqli_fetch_assoc($result)) {
    			$temp['data'][] = $row;
    		}
    	
    		$JSON_DATA =  json_encode($temp);
            
        mysqli_close($con);
        echo $JSON_DATA;
        
?>
