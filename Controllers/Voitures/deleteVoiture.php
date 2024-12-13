<?php
    require "../../BD/database.php";

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $numImmatriculation = $_GET['id'];

        try {
            $sql = "Delete From lcontrats where NumImmatriculation = ?";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Database error: " . $conn->error);
            }

            $stmt->bind_param("s", $numImmatriculation);

            if ($stmt->execute()) {
                $sql = "Delete From voitures where NumImmatriculation = ?";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    throw new Exception("Database error: " . $conn->error);
                }

                $stmt->bind_param("s", $numImmatriculation);

                if ($stmt->execute()) {
                    $_SESSION['success_message'] = "Voiture deleted successfully.";
                    $stmt->close();
                    $conn->close();
                    header("Location: ../../pages/Voitures/afficherVoitures.php");
                    exit;
                } else {
                    throw new Exception("Failed to insert data: " . $stmt->error);
                }
                
            } else {
                throw new Exception("Failed to insert data: " . $stmt->error);
            }
        } catch (Exception $e) {
            $successMessage = "Error: " . $e->getMessage();
            echo $successMessage;
        }
    }