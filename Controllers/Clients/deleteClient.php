<?php
    require "../../BD/database.php";

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $num_client = (int) $_GET['id'];
        try {
            $sql = "Delete From lcontrats where num_client = ?";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Database error: " . $conn->error);
            }

            $stmt->bind_param("i", $num_client);

            if ($stmt->execute()) {
                $sql = "Delete From clients where num_client = ?";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    throw new Exception("Database error: " . $conn->error);
                }

                $stmt->bind_param("i", $num_client);

                if ($stmt->execute()) {
                    $_SESSION['success_message'] = "Client deleted successfully.";
                    $stmt->close();
                    $conn->close();
                    header("Location: ../../pages/Clients/afficherClients.php");
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