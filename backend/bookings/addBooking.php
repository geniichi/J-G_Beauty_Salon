<?php
    include ('../connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customer_ID = $_POST['customer_ID'];
        $date = $_POST['date'];
    
        $stmt = $conn->prepare("INSERT INTO appointment (customer_ID, date) VALUES (?, ?)");
        $stmt->bind_param("is", $customer_ID, $date);

        if ($stmt->execute()) {
            echo "New appointment created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    }
    
    mysqli_close($conn);
?>