<?php
// Start or resume the session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header('Location: login.php'); // Redirect to the login page
    exit;
}

// Check if the staffName session variable is set
if (isset($_SESSION['staffName'])) 
    // Include the dbCon.php file
    require 'dbCon.php';

    // Retrieve the staff's ID 
    $staffID = $_SESSION['staffID'];

    // Query the database to get the staff's image path
    $query = "SELECT image FROM yamiraku_staff WHERE StaffID = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "i", $staffID); // Assuming StaffID is an integer
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    // Get the image path
    $imagePath = $row['image'];

    // Your SQL query to count the processID
$query = "SELECT COUNT(processID) AS processCount FROM application WHERE processID = 1";
$result = mysqli_query($db, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $processCount = $row['processCount'];
} else {
    // Handle any errors or provide a default value
    $processCount = 0;
}

// Your SQL query to count the processID = 0
$query5 = "SELECT COUNT(processID) AS processCount5 FROM application WHERE processID = 0 ";
$result = mysqli_query($db, $query5); // Use $query5 instead of $query

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $processCount5 = $row['processCount5'];
} else {
    // Handle any errors or provide a default value
    $processCount5 = 0;
}


  

// Your SQL query to count the processID equal to 7
$query2 = "SELECT COUNT(*) AS processCount2 FROM application WHERE processID = 7";
$result2 = mysqli_query($db, $query2);

if ($result2) {
    $row2 = mysqli_fetch_assoc($result2);
    $processCount2 = $row2['processCount2'];
} else {
    // Handle any errors or provide a default value
    $processCount2 = 0;
}

$query3 = "SELECT COUNT(*) AS processCount3 FROM application WHERE processID IN (6, 9)";
$result3 = mysqli_query($db, $query3);

if ($result3) {
    $row3 = mysqli_fetch_assoc($result3);
    $processCount3 = $row3['processCount3'];
} else {
    // Handle any errors or provide a default value
    $processCount3 = 0;
}
 

// Query the database to retrieve data
$query4 = "SELECT vacancy.vacancyPosition, COUNT(application.jobID) AS num_applications
          FROM vacancy
          LEFT JOIN application ON vacancy.vacancyID = application.jobID
          GROUP BY vacancy.vacancyPosition";
$resultc = mysqli_query($db, $query4);



// Create an array to store data points for the Highcharts chart
$dataPoints = array();

if ($resultc->num_rows > 0) {
    while ($row = $resultc->fetch_assoc()) {
        $dataPoints[] = array(
            
            "name" => $row['vacancyPosition'],
            "data" => [$row['num_applications']]
        );
    }
} else {
    echo "No data found in the database.";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" type="icon" href="img/favicon.ico">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body style="background: url(img/wallpaper.jpeg) 100% fixed;">

<!---------Side Navigation ---------->
    <div class="sidebar">
        <ul>
            <li class="dash-logo">
                <a href="dashboard.php">
                    <span class="icon"><img src="img/favicon.jpg"></ion-icon></span>
                    <span class="text">Yamiraku</span>
                </a>
            </li>
            <li class="active">
                <a href="dashboard.php">
                    <span class="icon "><ion-icon name="analytics-outline"></ion-icon></span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="application.php">
                    <span class="icon"><ion-icon name="laptop-outline"></ion-icon></span>
                    <span class="text">Application</span>
                </a>
            </li>
            <li>
                <a href="vacancy.php">
                    <span class="icon"><ion-icon name="person-add"></ion-icon></span>
                    <span class="text">Vacancy</span>
                </a>
            </li>
            <li>
              <!--  <a href="#">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="text">Users</span>
                </a>
            </li> -->
            <li>
                <a href="setting.php">
                    <span class="icon"><ion-icon name="cog-outline"></ion-icon></span>
                    <span class="text">Setting</span>
                </a>
            </li>
            <div class="bottom">
                <li>
                    <a href="setting.php">
                        <span class="icon"><div class="imgBx">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($imagePath);  ?> " >
                        </div></span>
                        <span class="text">  
                            
                        <?php
                        // Start or resume the session
                            echo $_SESSION['staffName']; 
                        ?>
                             
                        </span>
                    </a>
                </li>
            
            <li>
                <a href="login.php?logout=1">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="text">Logout</span>
                </a>
            </li>
        </div>
        </ul>
    </div>

    <!------------- Dashboard Content ------------------->
    <div class="main--content"> 
        <div class="header--wrapper">
           <div class="header--title">
            <h2 style="text-align:center; color:white; font-size:60px;">Admin Dashboard</h2>
           </div>
        </div>
    </div>

    <div class="row">
  <div class="column">
    <div class="card" style="font-size: 16px;">New Application To Review
        <p style="color: red; font-size: 32px; font-weight: 35px;"> <?php echo $processCount5; ?></p>
    </div>
    
  </div>
  <div class="column">
    <div class="card" style="font-size: 17px;">Application Ready To Interview
    <p style="color: red; font-size: 35px; font-weight: 35px;"> <?php echo $processCount; ?></p>
    </div>

  </div>
  <div class="column">
    <div class="card" style="font-size: 17px;">Applicatiom Waiting Decision
    <p style="color: red; font-size: 35px; font-weight: 35px;"> <?php echo $processCount2; ?></p>
    </div>
  </div>
  <div class="column">
    
    <div class="card" style="font-size: 18px; font-weight: 55px;">Withdraw/Denied Application
    <p style="color: red; font-size: 35px; font-weight: 35px;"> <?php echo $processCount3; ?></p>
    <i class='bx bx-book-content' ></i>
    </div>
  </div>
</div>

        <br>
      

    
      
        <figure class="highcharts-figure" style="width: 65%; margin: 0 auto;">
    <div id="container"></div>
    <p class="highcharts-description">
        
    </p>
</figure>








</body>
<script>

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Vacancy Applications',
        align: 'left'
    },
    xAxis: {
    categories: [
        '',
    ],


        crosshair: true,
        accessibility: {
            description: 'Vacancy Positions'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Number of People apply'
        }
    },
    tooltip: {
        valueSuffix: ''
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
});



</script>


</html>