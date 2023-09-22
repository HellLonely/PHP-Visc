<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <link href="../config/tailwind.min.css" rel="stylesheet" />
    <link href="../config/flowbite.min.css" rel="stylesheet" />
    <script src="../config/flowbite.min.js"></script>

    <link rel="shortcut icon" href="../config/logo.ico" type="image/x-icon">


    <title>Document</title>
</head>

<body>


    <?php
    if (isset($_GET['url'])) {
        $archivo_url = $_GET['url'];
        $archivo_url_2 = realpath($archivo_url);

    }
    $config_json_file = '../config/config.json';
    $config_json_content = file_get_contents($config_json_file);
    $config_data = json_decode($config_json_content, true);

    if ($config_data != null) {
        $aplication_name = $config_data['name'];
        $aplication_version = $config_data['version'];
        $aplication_resource_folder = $config_data['resource'];
    }
    ?>

    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="../index.php" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                    <?php echo $aplication_name ?>
                </span>
            </a>
            <button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="../index.php"
                            class="block py-2 pl-3 pr-4 text-gray-900 bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Utilities
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton" id="resource_list"></ul>
                            <script>
                                function cargarRecursos() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function () {
                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                            document.getElementById("resource_list").innerHTML = xhr.responseText;
                                        }
                                    };
                                    xhr.open("GET", "../resc/dropdown.php", true);
                                    xhr.send();
                                }

                                window.addEventListener("load", cargarRecursos);

                            </script>
                        </div>
                    </li>
                    <li>
                        <a href="../www/dashboard.php"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Dashboard
                        </a>
                        <li>
                            <a href="../www/php-bigxhtml.html" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Documentacion</a>
                        </li>  
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <hr>
    <!-- Hotbar element -->
    <div class="absolute bg-gray-200 right-10 mt-10  shadow rounded-lg p-4">  
        <div class="flex flex-col gap-2 justify-center items-center ml-1">
            <button type="button" onclick="goBack()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
            </button> 
            <button type="button" onclick="reloadAllCode()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                 <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 14 3-3m-3 3 3 3m-3-3h16v-3m2-7-3 3m3-3-3-3m3 3H3v3"/>
                </svg>
            </button>
        </div>
    </div>

    <div class="flex justify-between items-center flex-col mt-10">
        <!-- PHP Visualizer -->
        <div id="visualizer" class="shadow" style="width: 1200px;" >
            <script>
                function loadFilesList() {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            document.getElementById("visualizer").innerHTML = xhr.responseText;
                        }
                    };
                    xhr.open("GET", "<?php echo $archivo_url ?>", true);
                    xhr.send();
                }

            </script>
        </div>
    </div>
    <!-- Code Display -->
    
    <div class="flex justify-center items-center w-10 flex-col">
        <div class="inset-x-0 bottom-4 absolute bg-gray-100 shadow flex justify-center" id="pre"> <!-- style="resize: vertical;cursor: ns-resize;" id="resizable" -->
            
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }

        const resizable = document.getElementById("resizable");
        let prevY = 0;

        /*
        resizable.addEventListener("mousedown", (e) => {
            prevY = e.clientY;
            document.addEventListener("mousemove", resize);
            document.addEventListener("mouseup", stopResize);
        });
        */
        function resize(e) {
            const deltaY = prevY - e.clientY;
            prevY = e.clientY;
            resizable.style.height = `${resizable.offsetHeight + deltaY}px`;
        }

        function stopResize() {
            document.removeEventListener("mousemove", resize);
        }

        function reloadCode(){
            let phpText = `<?php
                if (file_exists($archivo_url)) {
                    highlight_file($archivo_url);
                } else {
                    echo "El archivo no existe.";
                }
            ?>`
            document.getElementById("pre").innerHTML = " ";
            document.getElementById("pre").innerHTML = phpText;
        }

        // Aqui puedes recargar tanto la vista de php como el visualizador de codigo php //

        function reloadAllCode(){
            reloadCode();
            loadFilesList();
        }

        window.addEventListener("load", reloadAllCode);

    </script>
</body>
<style>
    pre {
        padding: 10px;
        max-height: 350px;
        overflow-y: auto;
        white-space: pre-wrap;
        display: flex;
        justify-content: center;
    }

</style>

</html>