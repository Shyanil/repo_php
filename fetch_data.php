<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "SHYANIL5";
$database = "salience_demos";
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data
$sql = "SELECT code_wd, Accountholder_name AS Accountholder_name, Account_Number AS Account_Number, Account_Ifsc_code AS Account_Ifsc_code, Upi_Address AS Upi_Address FROM salience_Code";
$result = $conn->query($sql);

// Check if data was fetched successfully
if ($result->num_rows > 0) {
    // Array to hold data
    $data = array();

    // Fetch each row from the result set
    while ($row = $result->fetch_assoc()) {
        // Add each row to the data array
        $data[] = $row;
    }

    // Encode data to JSON
    $json_data = json_encode($data);

    // Output JSON
    header('Content-Type: application/json');
    echo $json_data;
} else {
    echo "No data found";
}

// Close connection
$conn->close();
?>
