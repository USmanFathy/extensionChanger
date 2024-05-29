<?php

// Define the directory containing the files
$directory = 'D:\projects\Seamless-main\resources\views\admin-dashboard';

// Define the old and new extensions
$old_extension = 'html'; // old extension without dot
$new_extension = 'blade.php';  // new extension without dot

// Open the directory
if ($handle = opendir($directory)) {

    // Loop through the directory
    while (false !== ($file = readdir($handle))) {

        // Skip '.' and '..'
        if ($file != '.' && $file != '..') {

            // Get the file's full path
            $file_path = $directory . '/' . $file;

            // Check if the file has the old extension
            if (pathinfo($file_path, PATHINFO_EXTENSION) == $old_extension) {

                // Get the file name without the extension
                $file_name = pathinfo($file_path, PATHINFO_FILENAME);

                // Define the new file path
                $new_file_path = $directory . '/' . $file_name . '.' . $new_extension;

                // Rename the file
                if (rename($file_path, $new_file_path)) {
                    echo "Renamed $file to $file_name.$new_extension\n";
                } else {
                    echo "Failed to rename $file\n";
                }
            }
        }
    }

    // Close the directory
    closedir($handle);
} else {
    echo "Failed to open directory\n";
}
?>
