<?php
    require "../../BD/database.php";

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num_client = (int) $_POST['num_client'];
        $name = trim($_POST['nom']);
        $phone = trim($_POST['tel']);
        $address = trim($_POST['adresse']);
        $isValid = true;

        if (empty($name) || strlen($name) > 30) {
            $_SESSION['nameErr'] = "Name is required and must be 30 characters or less.";
            $isValid = false;
        }

        if (empty($phone) || !preg_match("/^\d{10}$/", $phone)) {
            $_SESSION['phoneErr'] = "Phone is required and must be exactly 10 digits.";
            $isValid = false;
        }

        if (empty($address)) {
            $_SESSION['addressErr'] = "Address is required.";
            $isValid = false;
        }

        if ($isValid) {
            try {
                $sql = "Update clients set nom = ?, tel = ?, adresse = ? where num_client = ?";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    throw new Exception("Database error: " . $conn->error);
                }

                $stmt->bind_param("sssi", $name, $phone, $address, $num_client);

                if ($stmt->execute()) {
                    $_SESSION['success_message'] = "Client updated successfully.";
                    $stmt->close();
                    $conn->close();
                    header("Location: ../../pages/Clients/afficherClients.php");
                    exit;
                } else {
                    throw new Exception("Failed to insert data: " . $stmt->error);
                }
            } catch (Exception $e) {
                $successMessage = "Error: " . $e->getMessage();
            }
        }else{
            header("Location: ../../pages/Clients/updateClient.php");
            exit;
        }
    }
?>