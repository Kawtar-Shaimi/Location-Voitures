<?php
    require "../../BD/database.php";

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numImmatriculation = $_POST['NumImmatriculation'];
        $marque = trim($_POST['Marque']);
        $modele = trim($_POST['Modele']);
        $annee = trim((int) $_POST['Annee']);
        $isValid = true;

        if (empty($marque) || strlen($marque) > 30) {
            $_SESSION['marqueErr'] = "Mark is required and must be 30 characters or less.";
            $isValid = false;
        }

        if (empty($modele) || strlen($modele) > 30) {
            $_SESSION['modeleErr'] = "Modele is required and must be 30 characters or less.";
            $isValid = false;
        }

        if (empty($annee) || $annee > (int) date("Y") || !preg_match("/^\d{4}$/", $annee)) {
            $_SESSION['anneeErr'] = "Annee is required and must be exactly 4 digits and a valid year.";
            $isValid = false;
        }

        if ($isValid) {
            try {
                $sql = "INSERT INTO voitures (NumImmatriculation, Marque, Modele, Annee) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    throw new Exception("Database error: " . $conn->error);
                }

                $stmt->bind_param("sssi", $numImmatriculation, $marque, $modele, $annee);

                if ($stmt->execute()) {
                    $_SESSION['success_message'] = "Voiture added successfully.";
                    $stmt->close();
                    $conn->close();
                    header("Location: ../../pages/Voitures/afficherVoitures.php");
                    exit;
                } else {
                    throw new Exception("Failed to insert data: " . $stmt->error);
                }
            } catch (Exception $e) {
                $successMessage = "Error: " . $e->getMessage();
            }
        }else{
            header("Location: ../../pages/Voitures/ajouterVoiture.php");
            exit;
        }
    }
?>
