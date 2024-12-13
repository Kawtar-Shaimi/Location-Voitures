<?php
    session_start();
    require "../../BD/database.php";

    $sql = "SELECT * FROM clients";
    $result = $conn->query($sql);  
    
    $successMessage = $_SESSION['success_message'] ?? null;
    unset($_SESSION['success_message']);
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
    <div class="whole-container">
        <div class="lg:flex relative">
            <div class="sidebar bg-blue-900 w-full lg:w-1/5 lg:h-screen text-center rounded flex lg:flex-col gap-2 lg:gap-7 lg:flex-wrap justify-around lg:justify-start items-center">
            <img class="w-24 lg:w-44" src="../../imgs/logo.png" alt="logo">
            <div class="icon flex gap-5 justify-center">
                    <svg class="text-yellow-100 h-7 lg:h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7l131.7 0c0 0 0 0 .1 0l5.5 0 112 0 5.5 0c0 0 0 0 .1 0l131.7 0c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2L224 304l-19.7 0c-12.4 0-20.1 13.6-13.7 24.2z"/>
                    </svg>
                    <p class="my-1 lg:my-3 font-bold text-yellow-100"><a href="./afficherClients.php">Clients</a></p>
                </div>
                <div class="icon flex gap-5 justify-center">
                    <svg class="text-yellow-100 h-7 lg:h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M135.2 117.4L109.1 192l293.8 0-26.1-74.6C372.3 104.6 360.2 96 346.6 96L165.4 96c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32l181.2 0c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2l0 144 0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L96 400l0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L0 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/>
                    </svg>
                    <p class="my-1 lg:my-3 font-bold text-yellow-100"><a href="../Voitures/afficherVoitures.php">Voitures</a></p>
                </div>
                <div class="icon flex gap-5 justify-center">
                    <svg class="text-yellow-100 h-7 lg:h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path fill="currentColor" d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM80 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm54.2 253.8c-6.1 20.3-24.8 34.2-46 34.2L80 416c-8.8 0-16-7.2-16-16s7.2-16 16-16l8.2 0c7.1 0 13.3-4.6 15.3-11.4l14.9-49.5c3.4-11.3 13.8-19.1 25.6-19.1s22.2 7.7 25.6 19.1l11.6 38.6c7.4-6.2 16.8-9.7 26.8-9.7c15.9 0 30.4 9 37.5 23.2l4.4 8.8 54.1 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-6.1 0-11.6-3.4-14.3-8.8l-8.8-17.7c-1.7-3.4-5.1-5.5-8.8-5.5s-7.2 2.1-8.8 5.5l-8.8 17.7c-2.9 5.9-9.2 9.4-15.7 8.8s-12.1-5.1-13.9-11.3L144 349l-9.8 32.8z"/>
                    </svg>
                    <p class="my-1 lg:my-3 font-bold text-yellow-100"><a href="../Contrats/afficherContrat.php">Contrats</a></p>
                </div>
            </div>
            <div class="w-full bg-none lg:bg-cover lg:bg-center " style="background-image: url('../../imgs/c.jpg');">
            <?php
                if ($successMessage) {
                    echo "
                        <div class='w-full mt-5 py-3 px-3 bg-green-500 rounded-md'>
                            <p class='text-white font-bold text-sm'>$successMessage</p>
                        </div>
                    ";
                }
            ?>
            <div class=" ms-3">
                <button class="bg-blue-900 mt-5 px-4 py-2 text-yellow-100 rounded text-left text-sm lg:text-[15px]">
                    <a href="./ajouterClient.php">Ajouter Client</a>
                </button>
            </div>
    <div class="clients w-full px-3 mt-5">
        <p class="text-center pb-2 font-bold text-blue-900 text-xl lg:text-2xl">Liste des clients</p>
        <table class="table-auto border-collapse border border-gray-500 w-full text-xs">
            <tr>
                <th class="py-2 px-2 text-left text-sm lg:text-[15px] bg-blue-300">Num client</th>
                <th class="py-2 px-2 text-left text-sm lg:text-[15px] bg-blue-300">Nom</th>
                <th class="py-2 px-2 text-left text-sm lg:text-[15px] bg-blue-300">Adresse</th>
                <th class="py-2 px-2 text-left text-sm lg:text-[15px] bg-blue-300">Téléphone</th>
                <th class="py-2 px-2 text-left text-sm lg:text-[15px] bg-blue-300">Action</th>
            </tr>
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='even:bg-yellow-50 odd:bg-blue-300'>";
                        echo "<td class='px-7 py-2 text-sm lg:text-[15px] '>" . $row['num_client'] . "</td>";
                        echo "<td class='px-2 py-2 text-sm lg:text-[15px]'>" . $row['nom'] . "</td>";
                        echo "<td class='px-2 py-2 text-sm lg:text-[15px]'>" . $row['adresse'] . "</td>";
                        echo "<td class='px-2 py-2 text-sm lg:text-[15px]'>" . $row['tel'] . "</td>";
                        echo "<td class='flex gap-2 px-2 py-2'>
                        <a href='../../Controllers/Clients/getClientInfo.php?id=" . $row['num_client'] . "'>
                            <svg class='text-blue-900 h-5 cursor-pointer' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                                <path fill='currentColor' d='M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z'/>
                            </svg>
                        </a>
                        <a href='../../Controllers/Clients/deleteClient.php?id=" . $row['num_client'] . "'>
                            <svg class='text-blue-900 h-5 cursor-pointer' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'>
                                <path fill='currentColor' d='M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z'/>
                            </svg>
                        </a>
                    </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center py-2'>No clients found</td></tr>";
                }
                $conn->close();
            ?>
        </table>
    </div> 
</div>
   
        </div>
    </div>
</body>
</html>