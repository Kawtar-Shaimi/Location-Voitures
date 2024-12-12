<?php
    require "../../BD/database.php";

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dateDebut = $_POST['DateDebut'];
        $dateFin = $_POST['DateFin'];
        $duree = (int)$_POST['Duree'];
        $num_client = (int) $_POST['num_client'];
        $numImmatriculation = trim($_POST['NumImmatriculation']);
        $isValid = true;
    
        if (empty($dateDebut) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateDebut)) {
            $_SESSION['dateDebutErr'] = "The start date is required and must be in the format YYYY-MM-DD.";
            $isValid = false;
        }
        if (empty($dateFin) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateFin)) {
            $_SESSION['dateFinErr'] = "The end date is required and must be in the format YYYY-MM-DD.";
            $isValid = false;
        }
        
        if (strtotime($dateFin) < strtotime($dateDebut)) {
            $_SESSION['dateFinErr'] = "The end date cannot be earlier than the start date.";
        }
        
        

        if (empty($duree) || !is_numeric($duree)) {
            $_SESSION['dureeErr'] = "Duree is required and must be a number.";
            $isValid = false;
        }

        if ($isValid) {
            try {
                $sql = "INSERT INTO lcontrats (DateDebut, DateFin, Duree, num_client, NumImmatriculation) VALUES ( ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    echo $conn->error;
                    throw new Exception("Database error: " . $conn->error);
                }

                $stmt->bind_param("ssiis",  $dateDebut, $dateFin, $duree, $num_client, $numImmatriculation);

                if ($stmt->execute()) {
                    $_SESSION['success_message'] = "Contrats added successfully.";
                    $stmt->close();
                    $conn->close();
                    header("Location: ../../pages/Contrats/afficherContrat.php");
                    exit;
                } else {
                    echo $stmt->error;
                    throw new Exception("Failed to insert data: " . $stmt->error);
                }
            } catch (Exception $e) {
                
                $successMessage = "Error: " . $e->getMessage();
                echo $successMessage;
            }
        }else{
            header("Location: ../../pages/Contrats/ajouterContrat.php");
            exit;
        }
    }
?>
