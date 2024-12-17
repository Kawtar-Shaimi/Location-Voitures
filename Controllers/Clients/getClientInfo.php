<?php
    require "../../BD/database.php";

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $num_client = (int) $_GET['id'];

        try {
            $sql = "Select * From clients where num_client = ?";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Database error: " . $conn->error);
            }

            $stmt->bind_param("i", $num_client);

            if (!$stmt->execute()) {
                throw new Exception("Execution failed: " . $stmt->error);
            }

            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                // on a pas utilisée while car knjibu juste un client
                $_SESSION['client_infos'] = $result->fetch_assoc();
            }
            $stmt->close();
            $conn->close();
            header("Location: ../../pages/Clients/updateClient.php");
            exit;
        } catch (Exception $e) {
            $successMessage = "Error: " . $e->getMessage();
        }
    }