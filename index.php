<?php

$invalido = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/backend/connectDB.php";

    $sql = sprintf("SELECT * FROM utilizador
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    $utilizador = $result->fetch_assoc();

    if ($utilizador) {
        if(password_verify($_POST["password"], $utilizador["psw"])) {
            session_start();
            session_regenerate_id();    
            $_SESSION["id"] = $utilizador["id"];
            header("Location: backend/paginas/dashboard.php");
            exit;
        }
    }
    $invalido = true;
}   
?>

<!DOCTYPE html>
<html class="dark scroll-smooth" lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="frontend/assets/imgs/favicon.ico" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="frontend/assets/css/output.css">
    <!-- Icons -->
    <script src="https://kit.fontawesome.com/082fcabe62.js" crossorigin="anonymous"></script>
</head>
<body class="font-Satoshi bg-white dark:bg-zinc-800" onload="autoFocus()">
    <!-- Container -->
    <div class="flex flex-row h-screen">
        <!-- Intro -->
        <div class="hidden w-1/2 bg-gray-300 dark:bg-gray-200 md:flex relative">
            <!-- Marca -->
            <div class="flex items-center absolute top-16 left-8">
                <i class="fa-solid fa-film text-blue-500 text-4xl dark:text-blue-500 pr-2"></i>
                <h3 class="text-blue-500 text-xl pr-1 dark:text-blue-500 font-bold">MoviesForEveryone</h3>
            </div>

            <!-- Componente 1 -->
            <div class="rounded-xl h-auto w-auto bg-white absolute top-48 left-[15%] p-4 drop-shadow-lg z-10">
                <i class="fa-solid fa-film text-blue-500 text-3xl dark:text-blue-500"></i>
                <p class="font-medium md:text-sm">Filmes Disponiveis</p>
                <p class="text-blue-500 text-2xl dark:text-blue-500 font-bold">1749</p>
            </div>
            <!-- Componente 2 -->
            <div class="rounded-xl h-auto w-auto bg-white absolute top-96 left-[15%] p-4 drop-shadow-lg">
                <div class="flex flex-col">
                    <div class="h-10 w-10 bg-blue-500 flex justify-center items-center text-white rounded-full self-center mb-1">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <p class="font-medium ">Adicionar Filme</p>
                    <p></p>
                </div>
            </div>

            <!-- Componente 3 -->
            <div class="rounded-xl h-auto w-auto bg-white absolute top-[17rem] left-[40%] p-4 drop-shadow-lg z-20">
                <div class="flex flex-col items-center">
                    <table>
                        <tr>
                          <th>Capa</th>
                          <th>Nome</th>
                          <th>Ano</th>
                        </tr>
                        <tr>
                          <td><div class="h-8 w-8 bg-blue-500 rounded"></div></td>
                          <td>Fast X</td>
                          <td>2023</td>
                        </tr>
                        <tr>
                          <td><div class="h-8 w-8 bg-black rounded"></div></td>
                          <td>Avatar</td>
                          <td>2009</td>
                        </tr>
                      </table>
                </div>
            </div>

            <!-- Footer -->
            <div class="absolute bottom-12 left-8">
                <h2 class="text-2xl font-medium text-blue-500 dark:text-blue-500">Bem-vindo de Volta!</h2>
                <p class="font-medium text-slate-500 dark:text-gray-500">Faz login para acederes à tua conta. </p>
            </div>
        </div>
        <!-- Zona de Login -->
        <div class="w-full md:w-1/2 m-auto text-center px-8 md:px-12 lg:px-28">
            <!-- Mudar tema -->
            <button class="absolute top-0 right-0 hover:bg-azul-com-opacidade dark:hover:bg-preto-com-opacidade rounded-md h-10 w-10 m-4" onclick="trocarTema()">
                <i id="trocarIcon" class="fa-solid fa-sun fa-lg dark:text-slate-200 text-slate-400"></i>
            </button>
            <!-- Logótipo e Zona com texto -->
            <i class="fa-solid fa-film text-blue-500 text-5xl pr-1 dark:text-blue-500 pb-4"></i>
            <h2 class="text-2xl font-medium text-slate-600 dark:text-slate-200 pb-3">Bem-vindo de Volta!</h2>
            <p class="font-medium text-slate-500 dark:text-gray-400 pb-9 px-12">Faz login para acederes à tua conta e veres todos os filmes que temos para ti. </p>
            <!-- Página de login -->
            <form method="POST" class="flex flex-col m-auto">
                <!-- Email -->
                <div class="flex flex-col ">
                    <label for="nome" class="flex flex-row justify-between items-center border border-slate-400 dark:border-gray-400 rounded-md py-2 px-3 mb-1 cursor-pointer">
                        <input id="utilizador" id="email" 
                                class="bg-transparent border-0 outline-none caret-slate-400 text-slate-400 dark:text-slate-400 placeholder:text-slate-500 placeholder:dark:text-gray-400 cursor-pointer w-full" type="text" name="email" 
                                id="email" 
                                placeholder="Email" 
                                
                                value="<?php htmlspecialchars($_POST["email"] ?? "") ?>">
                                <!-- O código em php serve para manter o email mesmo que o login seja inválido -->
                        <i class="fa-solid fa-user text-slate-400 dark:text-gray-400 ml-4"></i>
                    </label>
                </div>
                <!-- Password -->
                <label for="password" class="flex flex-row justify-between items-center border border-slate-400 dark:border-gray-400 rounded-md py-2 px-3 mt-5 cursor-pointer">
                    <input class="bg-transparent border-0 outline-none caret-slate-400 text-slate-400 dark:text-gray-400 placeholder:text-slate-500 placeholder:dark:text-gray-400 cursor-pointer w-full" 
                            type="password" 
                            name="password" 
                            id="password" 
                            placeholder="Password">
                    <i class="fa-solid fa-eye-slash text-slate-400 dark:text-gray-400 ml-3" onclick="mostrarEsconderPassword()"></i>
                </label>
                <!-- Guardar Password ou Recuperar Password -->
                <div class="flex justify-between mb-8 pt-1">
                    <label for="guardar_password" class="text-slate-500 dark:text-gray-400 flex items-center cursor-pointer">
                        <input class="mr-1 border-slate-400 dark:border-gray-400 accent-transparent dark:accent-transparent cursor-pointer" 
                                type="checkbox" 
                                name="guardar_password" 
                                id="guardar_password">
                        <p class="text-sm md:text-base">Guardar Password</p>
                    </label>
                    <a href="#" class="text-blue-500 font-medium text-sm md:text-base">Recuperar password</a>
                </div>
                <!-- Fazer Login -->
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-slate-200 duration-200 font-semibold py-2 rounded-md mb-2 cursor-pointer">Login</button>
                <p class="dark:text-slate-200">Ainda não tens conta? <a href="frontend/signup.php" class="text-blue-500 underline">Sign Up!</a></p>
                <?php
                    if ($invalido) {
                        echo "<h3 class='text-slate-600 dark:text-slate-200 text-xl'>Login inválido!</h3>";
                    }
                ?>
            </form>
        </div>
    </div>
    <script src="frontend/assets/js/saveTheme.js"></script>
    <script src="frontend/assets/js/autoFocus.js"></script>
    <script src="frontend/assets/js/trocarTema.js"></script>
    <script src="frontend/assets/js/mostrarEsconderPassword.js"></script>
</body>
</html>