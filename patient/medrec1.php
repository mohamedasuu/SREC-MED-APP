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
if(isset($_POST['download'])){
    // Get the patient ID
    $patientID = $_POST['patientID'];

    // SQL query to fetch the files for the patient ID
    $sql = "SELECT file_name, file_content FROM records WHERE patient_id = '$patientID'";
    $result = $database->query($sql);

    if($result->num_rows > 0){
        // Loop through each file
        while($row = $result->fetch_assoc()){
            $fileName = $row['file_name'];
            $fileContent = $row['file_content'];

            // Set the appropriate headers for downloading the file
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . strlen($fileContent));
            ob_clean();
            flush();
            echo $fileContent;
            exit;
        }
    } else {
        echo "<p>No files found for the patient ID: $patientID.</p>";
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
            background-image: url("bg1.avif");
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
        .download-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .download-form h2 {
            text-align: center;
        }
        .download-form input[type="text"],
        .download-form input[type="submit"] {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="download-form">
            <h2>Download Files</h2>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="patientID" placeholder="Patient ID" required>
                <input type="submit" value="Download" name="download">
            </form>
        </div>
    </div>
</body>
</html>
