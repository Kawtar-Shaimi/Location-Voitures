<?php
    require "../../BD/database.php";

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $numImmatriculation = $_GET['id'];

        try {
            $sql = "Select * From voitures where NumImmatriculation = ?";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Database error: " . $conn->error);
            }

            $stmt->bind_param("s", $numImmatriculation);

            if (!$stmt->execute()) {
                throw new Exception("Execution failed: " . $stmt->error);
            }

            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $_SESSION['voiture_infos'] = $result->fetch_assoc();
            }
            $stmt->close();
            $conn->close();
            header("Location: ../../pages/Voitures/updateVoiture.php");
            exit;
        } catch (Exception $e) {
            $successMessage = "Error: " . $e->getMessage();
        }
    }