<?php
    require "../../BD/database.php";

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $numContrat = (int) $_GET['id'];

        try {
            $sql = "Delete From lcontrats where NumContrat = ?";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Database error: " . $conn->error);
            }

            $stmt->bind_param("i", $numContrat);

            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Contrat deleted successfully.";
                $stmt->close();
                $conn->close();
                header("Location: ../../pages/Contrats/afficherContrats.php");
                exit;
            } else {
                throw new Exception("Failed to insert data: " . $stmt->error);
            }
        } catch (Exception $e) {
            $successMessage = "Error: " . $e->getMessage();
            echo $successMessage;
        }
    }