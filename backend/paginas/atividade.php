<?php

    session_start();

    if (isset($_SESSION["id"])) {
        
        $mysqli = require __DIR__ . "/../connectDB.php";

        $sql = "SELECT * FROM utilizador
                WHERE id={$_SESSION['id']}";

        $result = $mysqli->query($sql);

        $utilizador = $result->fetch_assoc();
    }

?>

<!DOCTYPE html>
<html class="dark scroll-smooth" lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../frontend/assets/imgs/favicon.ico" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="../../frontend/assets/css/output.css">
    <!-- Icons -->
    <script src="https://kit.fontawesome.com/082fcabe62.js" crossorigin="anonymous"></script>
</head>
<body class="font-Satoshi bg-white dark:bg-zinc-800">
    <div class="grid grid-cols-12 grid-rows-6 h-screen max-w-screen-1366 m-auto">
        <!-- Header -->
        <header class="flex items-center px-8 col-start-3 col-end-13 h-14 md:h-16 justify-between shadow shadow-slate-200 dark:shadow">
            <!-- Search Bar -->
            <div class="flex items-center bg-slate-100 dark:bg-zinc-700 rounded-lg py-2 px-3 w-1/3">
                <i class="fa-solid fa-magnifying-glass pr-2 text-slate-400 dark:text-slate-200"></i>
                <input class="bg-transparent outline-none text-slate-400 dark:text-slate-200 placeholder:text-slate-400 placeholder:dark:text-slate-200 w-full" type="text" placeholder="Procura rápida...">
            </div>
            <div class="flex items-center">
                <!-- Calendário e Notificações -->
                <div class="hidden md:flex items-center">
                    <div class="flex items-center justify-center bg-slate-100 dark:bg-zinc-700 w-10 h-10 rounded-full mx-4">
                        <i class="fa-regular fa-calendar text-lg text-slate-400 dark:text-slate-200"></i>
                    </div>
                    <div class="flex items-center justify-center bg-slate-100 dark:bg-zinc-700 w-10 h-10 rounded-full mx-4 relative">
                        <i class="fa-regular fa-bell text-lg text-slate-400 dark:text-slate-200"></i>
                        <div class="flex justify-center items-center absolute -top-0.5 left-7 bg-red-500 rounded-full h-4 w-4">
                            <p class="font-semibold text-slate-200 text-sm">8</p>
                        </div>
                    </div>
                </div>
                <!-- Nome, tipo de subscrição e perfil -->
                <div class="text-end px-4">
                    <?php 
                    echo "<p class='font-medium text-blue-500 dark:text-blue-500'>" . htmlspecialchars($utilizador["nome"]) . "</p>"
                    ?>
                    <p class="font-medium text-sm text-yellow-400 dark:text-yellow-300 leading-none">Premium</p>
                </div>
                <div class="h-12 w-12 rounded-full bg-slate-100 dark:bg-zinc-700 pl-2"></div>
            </div>
        </header>
        <!-- Barra lateral -->
        <aside class="col-span-2 row-span-full border-l border-r border-slate-200 dark:border-zinc-700">
            <div class="flex items-center select-none text-3xl justify-center h-14">
                <i class="fa-solid fa-film text-blue-500 text-3xl pr-1 dark:text-yellow-400"></i>
                <h2 class="hidden md:block text-blue-500 font-extrabold">Movies</h2>
            </div>
            <div class="flex flex-col">
                <p class="text-center md:text-start text-slate-400 dark:text-slate-200 pt-6 pb-0.5 px-3">Menu</p>
                <ul class="flex flex-col [&>li]:select-none">
                    <li class="w-auto mx-3 py-0.5 pr-1.5 my-1 rounded-md text-slate-500 dark:text-slate-200 [&>*]:hover:text-blue-500 hover:bg-azul-com-opacidade dark:hover:bg-preto-com-opacidade justify-center md:justify-start">
                        <a href="dashboard.php" class="flex flex-row items-center">
                            <i class="fa-solid fa-film md:px-3 md:w-10 py-[20%] md:py-0"></i>
                            <p class="text-lg hidden md:block truncate">Filmes</p>
                        </a>
                    </li>
                    <li class="w-auto mx-3 py-0.5 pr-1.5 my-1 rounded-md text-slate-500 dark:text-slate-200 [&>*]:hover:text-blue-500 hover:bg-azul-com-opacidade dark:hover:bg-preto-com-opacidade justify-center md:justify-start">
                        <a href="estudio.php" class="flex flex-row items-center">
                            <i class="fa-solid fa-building md:px-3 md:w-10 py-[20%] md:py-0"></i>
                            <p class="text-lg hidden md:block truncate">Estúdios</p>
                        </a>
                    </li>
                    <li class="w-auto mx-3 py-0.5 pr-1.5 my-1 rounded-md text-slate-500 dark:text-slate-200 [&>*]:hover:text-blue-500 hover:bg-azul-com-opacidade dark:hover:bg-preto-com-opacidade justify-center md:justify-start">
                        <a href="participantes.php" class="flex flex-row items-center">
                            <i class="fa-solid fa-user-tie md:px-3 md:w-10 py-[20%] md:py-0"></i>
                            <p class="text-lg hidden md:block truncate">Participantes</p>
                        </a>
                    </li>
                    <li class="w-auto mx-3 py-0.5 pr-1.5 my-1 rounded-md text-slate-500 dark:text-slate-200 [&>*]:hover:text-blue-500 hover:bg-azul-com-opacidade dark:hover:bg-preto-com-opacidade justify-center md:justify-start">
                        <a href="utilizadores.php" class="flex flex-row items-center">
                            <i class="fa-solid fa-user md:px-3 md:w-10 py-[20%] md:py-0"></i>
                            <p class="text-lg hidden md:block truncate">Utilizadores</p>
                        </a>
                    </li>
                </ul>
                <p class="text-center md:text-start text-slate-400 dark:text-slate-200 pt-1 pb-0.5 px-3">Outro</p>
                <ul class="flex flex-col [&>li]:select-none">
                    <li class="w-auto mx-3 py-0.5 pr-1.5 my-1 rounded-md text-blue-500 dark:text-blue-500 bg-azul-com-opacidade dark:bg-preto-com-opacidade justify-center md:justify-start">
                        <a href="atividade.php" class="flex flex-row items-center">
                            <i class="fa-solid fa-chart-line md:px-3 md:w-10 py-[20%] md:py-0"></i>
                            <p class="text-lg hidden md:block truncate">Atividade</p>
                        </a>
                    </li>
                    <li class="w-auto mx-3 py-0.5 pr-1.5 my-1 rounded-md text-slate-500 dark:text-slate-200 [&>*]:hover:text-blue-500 hover:bg-azul-com-opacidade dark:hover:bg-preto-com-opacidade justify-center md:justify-start">
                        <a href="suporte.php" class="flex flex-row items-center">
                            <i class="fa-solid fa-question md:px-3 md:w-10 py-[20%] md:py-0"></i>
                            <p class="text-lg hidden md:block truncate">Suporte</p>
                        </a>
                    </li>
                    <li class="flex items-center w-auto mx-3 py-0.5 pr-1.5 my-1 rounded-md text-slate-500 dark:text-slate-200 [&>*]:hover:text-blue-500 hover:bg-azul-com-opacidade dark:hover:bg-preto-com-opacidade justify-center md:justify-start" onclick="trocarTema()">
                        <i id="trocarIcon" class="fa-solid fa-sun text-lg dark:text-slate-200 text-slate-500 md:px-3 md:w-10 py-[20%] md:py-0"></i>
                        <p class="text-lg hidden md:block truncate">Tema</p>
                    </li>
                    <li class="flex items-center w-auto mx-3 py-0.5 pr-1.5 my-1 rounded-md text-slate-500 dark:text-slate-200 [&>*]:hover:text-blue-500 hover:bg-azul-com-opacidade dark:hover:bg-preto-com-opacidade justify-center md:justify-start" onclick="logout()">
                        <i id="trocarIcon" class="fa-solid fa-arrow-right-from-bracket text-lg dark:text-slate-200 text-slate-500 md:px-3 md:w-10 py-[20%] md:py-0"></i>
                        <p class="text-lg hidden md:block truncate">Sair</p>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Zona principal -->
        <main class="borderr rounded-xl -mt-5 mb-6 mx-6 col-start-3 col-end-13 row-start-2 row-span-full">
            
        </main>              
    </div>
    <!-- JS -->
    <script src="../../frontend/assets/js/links.js"></script>
    <script src="../../frontend/assets/js/trocarTema.js"></script>

</body>
</html>