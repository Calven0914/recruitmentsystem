<?php
include 'dbCon.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $location = $_POST['location'];
    $jobType = $_POST['jobType'];

    // Initialize an empty WHERE clause for filtering
    $whereClause = "1"; // Always true to select all rows by default

    // Initialize an array to store the conditions
    $conditions = array();

    // Check if a location filter is selected
    if (!empty($location)) {
        $conditions[] = "vacancyLocation = ?";
    }

    // Check if a job type filter is selected
    if (!empty($jobType)) {
        $conditions[] = "vacancyType = ?";
    }

    // If conditions are present, join them with 'AND'
    if (!empty($conditions)) {
        $whereClause = implode(" AND ", $conditions);
    }

    // Prepare the SQL query with the dynamic WHERE clause
    $query = "SELECT * FROM vacancy WHERE $whereClause";

    $stmt = $db->prepare($query);

    // Bind parameters conditionally
    if (!empty($location) && !empty($jobType)) {
        $stmt->bind_param("ss", $location, $jobType);
    } elseif (!empty($location)) {
        $stmt->bind_param("s", $location);
    } elseif (!empty($jobType)) {
        $stmt->bind_param("s", $jobType);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $vacancies = array();
    while ($row = $result->fetch_assoc()) {
        $vacancies[] = $row;
    }

    echo json_encode($vacancies);
}

?>
