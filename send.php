<?php
$email = $_POST['signup-email'];
$filename = 'suscribers.txt';
$somecontent = "$email\n";

// Let's make sure the file exists and is writable first.
if (is_writable($filename)) {

    // In our example we're opening $filename in append mode.
    // The file pointer is at the bottom of the file hence
    // that's where $somecontent will go when we fwrite() it.
    if (!$handle = fopen($filename, 'a')) {
     
		 //echo "Cannot open file ($filename)";
         exit;
		 
    $message= "An error occurred, please try agains.";
	$status  = "error";
	$data = array(
                'status'  => $status,
                'message' => $message
            );

            echo json_encode($data);
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Cannot write to file ($filename)";
        //exit;
    }

    $message= "Success!. You have been added to our email list.";
	$status  = "success";
	$data = array(
                'status'  => $status,
                'message' => $message
            );

            echo json_encode($data);
    fclose($handle);

} else {
       $message= "An error occurred, please try agains.";
	$status  = "error";
	$data = array(
                'status'  => $status,
                'message' => $message
            );

            echo json_encode($data);
}
?>
