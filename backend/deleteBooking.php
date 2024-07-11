<?php
include("connect.php");

if (isset($_POST['appointment_ID'])) {
    $appointment_ID = $_POST['appointment_ID'];

    $sql = "DELETE FROM appointments WHERE appointment_ID='$appointment_ID'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../frontend/pages/booking.php?message=Appointment+deleted+successfully");
    } else {
        header("Location: ../frontend/pages/booking.php?error=Error+deleting+appointment");
    }

    $conn->close();
} else {
    header("Location: ../frontend/view_appointments.php");
}
?>
