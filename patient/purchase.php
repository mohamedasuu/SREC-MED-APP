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
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .medicine-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .medicine-card {
            width: 250px;
            padding: 20px;
            margin: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .medicine-card img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .medicine-card h3 {
            margin-bottom: 5px;
        }
        .medicine-card p {
            margin-bottom: 15px;
        }
        .medicine-card button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    // Import database
    include("../connection.php");

    // Create the "medicines" table if it doesn't exist
    $createTableQuery = "CREATE TABLE IF NOT EXISTS medicines (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        medicine_name VARCHAR(100) NOT NULL,
        medicine_photo VARCHAR(100) NOT NULL,
        medicine_price DECIMAL(10, 2) NOT NULL
    )";

    if ($database->query($createTableQuery) === FALSE) {
        echo "Error creating table: " . $database->error;
    }

    // Query to fetch medicines from the database
    $sql = "SELECT * FROM medicines";
    $result = $database->query($sql);
    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title">Doctor</p>
                                    <p class="profile-subtitle">Doctor UI</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-dashbord" >
                        <a href="index.php" class="non-style-link-menu"><div><p class="menu-text">Dashboard</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor ">
                        <a href="doctors.php" class="non-style-link-menu "><div><p class="menu-text">Doctors Schedule</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-schedule">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Doctors Session</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">Patient Appointments</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="meet.php" class="non-style-link-menu"><div><p class="menu-text">Join meet</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="purchase.php" class="non-style-link-menu"><div><p class="menu-text">Upload medical records</p></div></a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="medicine-container">
            <?php
            // Loop through the medicines and display them
            while ($row = $result->fetch_assoc()) {
                $medicineName = $row["medicine_name"];
                $medicinePhoto = $row["medicine_photo"];
                $medicinePrice = $row["medicine_price"];
            ?>
                <div class="medicine-card">
                    <figure>
                        <img src="../img/medicine_images/<?php echo $medicinePhoto; ?>" alt="<?php echo $medicineName; ?>">
                        <figcaption><?php echo $medicineName; ?></figcaption>
                    </figure>
                    <p>$<?php echo $medicinePrice; ?></p>
                    <button>Purchase</button>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
