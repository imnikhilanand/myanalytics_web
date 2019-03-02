<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        ///STARTS HERE////////////////////
        //Reading the file and inserting the queries in the database
        ////////////////////////////////////////////////////////////

        $name_of_file=basename( $_FILES["fileToUpload"]["name"]); 


        require '../vendor/autoload.php';
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load("uploads/".$name_of_file);

        $worksheet = $spreadsheet->getActiveSheet();
        // Get the highest row and column numbers referenced in the worksheet
        $highestRow = $worksheet->getHighestRow(); // e.g. 10
        $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5

        for ($row = 1; $row <= $highestRow; ++$row) {
         
            $question = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
            $option1 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
            $option2 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
            $option3 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
            $option4 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
            $level = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
            $subject = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
            $correct = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
            

            include 'conn.php';

            $sql1="INSERT INTO questions (`question`,`difficulty_level`,`subject`) VALUES ('$question','$level','$level')";
            $result1=mysqli_query($conn,$sql1);

if(!$result1){
    die(mysqli_error($conn));
}

$last_id = mysqli_insert_id($conn);

if(isset($option1)){
    $sql2="INSERT INTO option (`ques_id`,`choices`) VALUES ('$last_id','$option1')";
    $result2=mysqli_query($conn,$sql2);
    if(!$result2){
        die(mysqli_error($conn));
    }
    $last_id_2=mysqli_insert_id($conn);
    if($correct==1){
        $sql6="UPDATE questions SET `correct_choice_id`='$last_id_2' WHERE `id`='$last_id'";
        $result6=mysqli_query($conn,$sql6); 
        if(!$result6){
            die(mysqli_error($conn));
        }   
    }
}

if(isset($option2)){
    $sql3="INSERT INTO option (`ques_id`,`choices`) VALUES ('$last_id','$option2')";
    $result3=mysqli_query($conn,$sql3);
    if(!$result3){
        die(mysqli_error($conn));
    }
    $last_id_2=mysqli_insert_id($conn);
    if($correct==2){
        $sql7="UPDATE questions SET `correct_choice_id`='$last_id_2' WHERE `id`='$last_id'";
        $result7=mysqli_query($conn,$sql7); 
        if(!$result7){
            die(mysqli_error($conn));
        }   
    }
}

if(isset($option3)){
    $sql4="INSERT INTO option (`ques_id`,`choices`) VALUES ('$last_id','$option3')";
    $result4=mysqli_query($conn,$sql4);
    if(!$result4){
        die(mysqli_error($conn));
    }
    $last_id_2=mysqli_insert_id($conn);
    if($correct==3){
        $sql8="UPDATE questions SET `correct_choice_id`='$last_id_2' WHERE `id`='$last_id'";
        $result8=mysqli_query($conn,$sql8); 
        if(!$result8){
            die(mysqli_error($conn));
        }
    }
}

if(isset($option4)){
    $sql5="INSERT INTO option (`ques_id`,`choices`) VALUES ('$last_id','$option4')";
    $result5=mysqli_query($conn,$sql5);
    if(!$result5){
        die(mysqli_error($conn));
    }
    $last_id_2=mysqli_insert_id($conn);
    if($correct==4){
        $sql9="UPDATE questions SET `correct_choice_id`='$last_id_2' WHERE `id`='$last_id'";
        $result9=mysqli_query($conn,$sql9);
        if(!$result9){
            die(mysqli_error($conn));
        }   
    }
}



echo "Successfully added";                


echo "<a href='add_questions.php'>Back</a>";





        }
        



        /////////////////////////////////////////////////////////////////////////////
        ///ENDS HERE///
        /////////////////////////////////////////////////////////////////////////////



    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>