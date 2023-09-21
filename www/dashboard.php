<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <link href="../config/tailwind.min.css" rel="stylesheet"/>
    <link href="../config/flowbite.min.css" rel="stylesheet" />
    <script src="../config/flowbite.min.js"></script>

    <link rel="shortcut icon" href="../config/logo.ico" type="image/x-icon">


    <title>Dashboard</title>
</head>
<body>
<header>
    
        <?php 
            // Get config.json data.

            $config_json_file = '../config/config.json';
            $config_json_content = file_get_contents($config_json_file);
            $config_data = json_decode($config_json_content,true);

            if($config_data != null) {
                $aplication_name = $config_data['name'];
                $aplication_version = $config_data['version'];
                $aplication_resource_folder = $config_data['resource'];
            }
            
        ?>

        <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="../index.php" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><?php echo $aplication_name ?> </span>
            </a>
            <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                <a href="../index.php" class="block py-2 pl-3 pr-4 text-gray-900 bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Utilities <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-200 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton" id="resource_list"></ul>
                        <script>
                            function cargarRecursos() {
                                var xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function() {
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
                    <a href="../www/dashboard.php" class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Dashboard</a>
                </li>
                <li>
                    <a href="../www/php-bigxhtml.html" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Documentacion</a>
                </li>  
            </ul>
            </div>
        </div>
        </nav>
    </header>
        <hr>
    <main>
        <div class="flex justify-start flex-col p-16">
            <h1 class="text-5xl font-semibold">Dashboard</h1>
            <div class="p-6">
                <section id="section_main">
                    <h2 class="text-4xl font-medium">Utilities</h2>
                    <div>
                        <ol id="file_list" class="max-w-screen-xl p-6" >
                            <script>
                                function loadFilesList() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                            document.getElementById("file_list").innerHTML = xhr.responseText;
                                        }
                                    };
                                    xhr.open("GET", "../resc/load_files.php", true);
                                    xhr.send();
                                }

                                window.addEventListener("load", loadFilesList);

                            </script>
                        </ol>
                            <script>
                                function eliminarArchivo(url) {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                            cargarRecursos();   
                                            loadFilesList();
                                        }
                                    };
                                    xhr.open("GET", "../resc/delete_file.php?url=" + encodeURIComponent(url), true);
                                    xhr.send();
                                }

                                function codeFile(url) {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                            cargarRecursos();   
                                            loadFilesList();
                                        }
                                    };
                                    console.log(url);
                                    xhr.open("GET", "../www/resource_load.php?url=" + encodeURIComponent(url), true);
                                    xhr.send();
                                    window.location.href = "../www/resource_load.php?url=" + encodeURIComponent(url);
                                }

                                let interval = 1000;
                                setInterval(() => {
                                    loadFilesList()
                                }, interval);
                            </script>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>
</html>