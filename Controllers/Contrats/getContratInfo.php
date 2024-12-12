<?php
    require "../../BD/database.php";

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $numContrat = (int) $_GET['id'];

        try {
            $sql = "Select * From contrats where NumContrat = ?";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Database error: " . $conn->error);
            }

            $stmt->bind_param("i", $numContrat);

            if (!$stmt->execute()) {
                throw new Exception("Execution failed: " . $stmt->error);
            }

            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $_SESSION['contrat_infos'] = $result->fetch_assoc();
            }
            $stmt->close();
            $conn->close();
            header("Location: ../../pages/Contrats/updateContrat.php");
            exit;
        } catch (Exception $e) {
            $successMessage = "Error: " . $e->getMessage();
        }
    }