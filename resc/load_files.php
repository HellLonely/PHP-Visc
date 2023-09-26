<?php
$aplication_resource_folder = "../web";
$resources_path = $aplication_resource_folder;
function load_resources($resources_path){
    if (is_dir($resources_path)) {
        $resources = scandir($resources_path);

        $resources = array_filter($resources, function ($resource) use ($resources_path) {
            return is_file($resources_path . '/' . $resource);
        });
        $number_file = 1;
        foreach ($resources as $resource) {
            
            $resource_out = ucfirst(pathinfo($resource, PATHINFO_FILENAME));
            $resource_url = "$resources_path/$resource";

            // Si el usuario es el localhost habilita la eliminacion de archivos
 
            if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {
                echo liDelete($number_file,$resource_url,$resource,$resource_out);
            }else {
                echo liBasic($number_file,$resource_url,$resource,$resource_out);
            }
            $number_file++;
        }

        if (empty($resources)) {
            echo "<li>
                <p class='block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white'>No resources found</p>
            </li>";
        }
    } else {
        echo "<li>
            <p class='block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white'>La carpeta de recursos no existe</p>
        </li>";
    }
}
load_resources($resources_path);



function liDelete($number_file,$resource_url,$resource,$resource_out){
    return "<li class='flex justify-between items-center'>
    <div class='flex jusify-center items-center gap-4'>
        <p class='text-l'>$number_file</p> 
        <a href='$resource_url' class='block px-16 py-2 hover:bg-gray-300 hover:rounded-lg dark:hover:bg-gray-800 dark:hover:text-white'>$resource_out</a>
    </div>
    <div class='flex justify-center items-center gap-2'>
        <button onclick=\"codeFile('$resource_url')\" class='px-2 py-1 text-white bg-blue-500 hover:bg-blue-700 rounded-lg'>Code View</button>
        <a href='$resource_url' class='px-2 py-1 text-white bg-blue-500 hover:bg-blue-700 rounded-lg' download='$resource'>Download</a></p>
        <button onclick=\"eliminarArchivo('$resource_url')\" class='px-2 py-1 text-white bg-red-500 hover:bg-red-700 rounded-lg'>Delete</button>
    </div>
    </li>";

}

function liBasic($number_file,$resource_url,$resource,$resource_out){
    return "<li class='flex justify-between items-center'>
    <div class='flex jusify-center items-center gap-4'>
        <p class='text-l'>$number_file</p> 
        <a href='$resource_url' class='block px-16 py-2 hover:bg-gray-300 dark:hover:bg-gray-800 dark:hover:text-white'>$resource_out</a>
    </div>
    <div class='flex justify-center items-center gap-2'>
        <button onclick=\"codeFile('$resource_url')\" class='px-2 py-1 text-white bg-blue-500 hover:bg-blue-700 rounded-lg'>Code View</button>
        <a href='$resource_url' class='px-2 py-1 text-white bg-blue-500 hover:bg-blue-700 rounded-lg' download='$resource'>Download</a></p>
    </div>
    </li>";
}


?>