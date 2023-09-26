
function loadPHPContent(contentDiv,phpInstruction) {
    var xhr = new XMLHttpRequest();

    // divContainer where the php code will be uploaded
    let divContainer = document.getElementById(contentDiv);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            divContainer.innerHTML = xhr.responseText;
        }

        // PHP Instruction Ejample => "<?php echo $archivo_url ?>" or "../resc/delete_file.php?url=" + encodeURIComponent(url)
    };
    xhr.open("GET", phpInstruction, true);
    xhr.send();
}
