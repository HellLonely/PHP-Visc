<?php
$aplication_resource_folder = "../web";
$resources_path = $aplication_resource_folder;

function load_resources($resources_path)
{
    if (is_dir($resources_path)) {
        $resources = scandir($resources_path);


        $resources = array_filter($resources, function ($resource) use ($resources_path) {
            return is_file($resources_path . '/' . $resource);
        });

        foreach ($resources as $resource) {
            $resource_out = ucfirst(pathinfo($resource, PATHINFO_FILENAME));
            echo "<li class='flex items-center justify-between'>
                <a href='$resources_path/$resource' class='block px-4 py-2 w-56 hover:bg-white dark:hover:bg-gray-600 dark:hover:text-white flex items-center justify-between'>$resource_out
                <svg class='w-6 h-6 text-gray-800 dark:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='urrentColor' viewBox='0 0 16 20'>
                <path d='M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5'/>
                <path d='M14.067 0H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.933-2ZM6.709 13.809a1 1 0 1 1-1.418 1.409l-2-2.013a1 1 0 0 1 0-1.412l2-2a1 1 0 0 1 1.414 1.414L5.412 12.5l1.297 1.309Zm6-.6-2 2.013a1 1 0 1 1-1.418-1.409l1.3-1.307-1.295-1.295a1 1 0 0 1 1.414-1.414l2 2a1 1 0 0 1-.001 1.408v.004Z'/>
                </svg>
                </a>
                
            </li>"
            ;
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
