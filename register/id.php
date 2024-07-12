<?php
require 'dbcon.php';

// Fetch data from source_table
$query = "SELECT id_number, firstname FROM voters";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Loop through each row in source_table
    while ($row = $result->fetch_assoc()) {
        // Extract id_number and name
        $id_number = $row['id_number'];
        $firstname = $row['firstname'];

        // Insert into destination_table
        $insert_query = "INSERT INTO ids (id_number, firstname) VALUES ('$id_number', '$firstname')";
        if ($conn->query($insert_query) === TRUE) {
            echo "Record inserted successfully into ids";
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }
} else {
    echo "No records found in source_table";
}

// Close the connection
$conn->close();
?>
