<?php
require_once "../configs/db_connect.php";

if (isset($_POST['add_user'])) {
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone_number'];
    $User_Name = $_POST['User_Name'];
    $Password = $_POST['Password'];
    $userType = $_POST['user_type'];
    $address = $_POST['address'];
    $file_name = basename($_FILES["file_name"]["name"]);
    $file_path = "../uploads/" . $file_name;
    $file_type = pathinfo($file_path, PATHINFO_EXTENSION);

    $hash_pass = password_hash($Password, PASSWORD_DEFAULT);

    $fileType = ["jpg", "png", "jpeg", "gifs"];
    if (in_array($file_type, $fileType)) {
        if (move_uploaded_file($_FILES["file_name"]["tmp_name"], $file_path)) {
            $sql = "INSERT INTO images (file_name)VALUES ('$file_name')";
            if ($DbConn->query($sql) === TRUE) {
                $getImageID = "SELECT image_id FROM images WHERE file_name = '$file_name'";
                $result_spot_user = $DbConn->query($getImageID);
                $imageID = 0;
                if ($result_spot_user->num_rows>0 ) {
                    $idRow=$result_spot_user->fetch_assoc();
                    $imageID = $idRow["image_id"];
                }
                $insert_user = "INSERT INTO users (image_id, Full_Name, email, phone_Number, User_Name, Password, UserType,file_name, Address)
                VALUES ($imageID, '$fullName', '$email', '$phoneNumber', '$User_Name', '$hash_pass', '$userType','$file_name', '$address')"; //problem here

                if ($DbConn->query($insert_user) === TRUE) {
                    header("Location: ../index.php");
                } else {
                    echo "Error: " . $insert_user . "<br>" . $DbConn->error;
                }

            } else {
                echo "Error: " . $sql . "<br>" . $DbConn->error;
            }
        } else {
            echo "Error: file upload failed";
        }
    } else {
        echo "Error: Wrong file type";
    }



} else {
    echo "Error";
}
?>