<?php
    session_start(); 
    $dateDebutErr = $_SESSION['dateDebutErr'] ?? null;
    $dateFinErr = $_SESSION['dateFinErr'] ?? null;
    $dureeErr = $_SESSION['dureeErr'] ?? null;
    unset($_SESSION['dateDebutErr'],$_SESSION['dateFinErr'],$_SESSION['dureeErr']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex">
        <div class="sidebar bg-blue-900 w-1/5 h-screen  py-10 text-center rounded flex flex-col gap-7">
            <div class="icon flex gap-5 justify-center">
                <svg class="text-yellow-100 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7l131.7 0c0 0 0 0 .1 0l5.5 0 112 0 5.5 0c0 0 0 0 .1 0l131.7 0c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2L224 304l-19.7 0c-12.4 0-20.1 13.6-13.7 24.2z"/>
                </svg>
                <p class="my-3 font-bold text-yellow-100"><a href="../Clients/afficherClients.php">Clients</a></p>
            </div>
            <div class="icon flex gap-5 justify-center">
                <svg class="text-yellow-100 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M135.2 117.4L109.1 192l293.8 0-26.1-74.6C372.3 104.6 360.2 96 346.6 96L165.4 96c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32l181.2 0c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2l0 144 0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L96 400l0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L0 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/>
                </svg>
                <p class="my-3 font-bold text-yellow-100"><a href="../Voitures/afficherVoitures.php">Voitures</a></p>
            </div>
            <div class="icon flex gap-5 justify-center">
                <svg class="text-yellow-100 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path fill="currentColor" d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM80 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm54.2 253.8c-6.1 20.3-24.8 34.2-46 34.2L80 416c-8.8 0-16-7.2-16-16s7.2-16 16-16l8.2 0c7.1 0 13.3-4.6 15.3-11.4l14.9-49.5c3.4-11.3 13.8-19.1 25.6-19.1s22.2 7.7 25.6 19.1l11.6 38.6c7.4-6.2 16.8-9.7 26.8-9.7c15.9 0 30.4 9 37.5 23.2l4.4 8.8 54.1 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-6.1 0-11.6-3.4-14.3-8.8l-8.8-17.7c-1.7-3.4-5.1-5.5-8.8-5.5s-7.2 2.1-8.8 5.5l-8.8 17.7c-2.9 5.9-9.2 9.4-15.7 8.8s-12.1-5.1-13.9-11.3L144 349l-9.8 32.8z"/>
                </svg>
                <p class="my-3 font-bold text-yellow-100"><a href="./afficherContrat.php">Contrats</a></p>
            </div>
        </div>
        <div class="w-4/5 bg-cover bg-center flex justify-center items-center" style="background-image: url('../../imgs/c.jpg');">
            <fieldset class="flex justify-center items-center w-4/5">
                <div class="w-[50%]">
                    <p class="bg-yellow-100 mt-5 rounded text-center text-xl font-bold py-2 text-blue-900">Ajouter contrats</p>
                    <form class="flex flex-col justify-center pl-10 bg-blue-900 h-[550px] rounded-md shadow-xl" action="../../Controllers/Contrats/ajouterContrat.php" method="post">
                        <label class="text-yellow-100">Date début :</label>
                        <input class="w-[80%] bg-yellow-50 rounded focus:outline-none focus:border-transparent" type="date" name="DateDebut"><br>
                        <?php if ($dateDebutErr) echo "<p class='text-red-600'>$dateDebutErr</p><br>"?>
                        <label class="text-yellow-100">Date fin :</label>
                        <input class="w-[80%] bg-yellow-50 rounded focus:outline-none focus:border-transparent" type="date" name="DateFin"><br>
                        <?php if ($dateFinErr) echo "<p class='text-red-600'>$dateFinErr</p><br>"?>
                        <label class="text-yellow-100">Durée :</label>
                        <input class="w-[80%] bg-yellow-50 rounded focus:outline-none focus:border-transparent" type="number" name="Duree"><br>
                        <?php if ($dureeErr) echo "<p class='text-red-600'>$dureeErr</p><br>"?>
                        <label class="text-yellow-100">Numéro client :</label>
                        <input class="w-[80%] bg-yellow-50 rounded focus:outline-none focus:border-transparent" type="number" name="num_client"><br>
                        <label class="text-yellow-100">Numéro Immatriculation :</label>
                        <input class="w-[80%] bg-yellow-50 rounded focus:outline-none focus:border-transparent" type="text" name="NumImmatriculation"><br>
                        <button class="bg-yellow-100 w-24 py-1 rounded">Ajouter</button>
                    </form>
                </div>
            </fieldset>
        </div>
    </div>
</body>
</html>