<?php
// Learn from w3schools.com

session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
        //header("location: ../login.php");
    }else{
        $useremail=$_SESSION["user"];
    }

}else{
    header("location: ../login.php");
}

// Import database
include("../connection.php");

// Check if the form is submitted
if(isset($_POST['submit'])){
    // Get the patient ID
    $patientID = $_POST['patientID'];

    // Count total files
    $countFiles = count($_FILES['files']['name']);

    // Loop through each file
    for($i=0;$i<$countFiles;$i++){
        // File information
        $fileName = $_FILES['files']['name'][$i];
        $fileTmpName = $_FILES['files']['tmp_name'][$i];

        // Read the file content
        $fileContent = file_get_contents($fileTmpName);

        // Escape special characters in the file content
        $escapedFileContent = $database->real_escape_string($fileContent);

        // SQL query to insert the file content into the database
        $sql = "INSERT INTO records (patient_id, file_name, file_content) VALUES ('$patientID', '$fileName', '$escapedFileContent')";

        if ($database->query($sql) === TRUE) {
            echo "<p>File '$fileName' uploaded successfully for patient ID: $patientID.</p>";
        } else {
            echo "<p>Error uploading file '$fileName' for patient ID: $patientID - " . $database->error . "</p>";
        }
    }
}

$database->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Doctors</title>
    <style>
        body {
            background-image: url("bg.avif");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .upload-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .upload-form h2 {
            text-align: center;
        }
        .upload-form input[type="text"],
        .upload-form input[type="file"],
        .upload-form input[type="submit"] {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="upload-form">
            <h2>Upload Files</h2>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <input type="text" name="patientID" placeholder="Patient ID" required>
                <input type="file" name="files[]" multiple required>
                <input type="submit" value="Upload" name="submit">
            </form>
        </div>
    </div>
</body>
</html>
