<?php

add_action('wp_ajax_batch_download_pdfs', 'handle_batch_download_pdfs');
add_action('wp_ajax_nopriv_batch_download_pdfs', 'handle_batch_download_pdfs');

add_action('wp_ajax_batch_download_extended_notes', 'handle_batch_download_extended_notes');
add_action('wp_ajax_nopriv_batch_download_extended_notes', 'handle_batch_download_extended_notes');

function handle_batch_download_pdfs() {
    if (!isset($_POST['selected_docs']) || empty($_POST['selected_docs'])) {
        wp_die('No documents selected');
    }

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Create a human-readable timestamp
    $timestamp = date('Y-m-d-H-i-s');
    
    $zip = new ZipArchive();
    $zip_name = 'selected_appendices_' . $timestamp . '.zip';
    $upload_dir = wp_upload_dir();
    $zip_path = $upload_dir['path'] . '/' . $zip_name;

    error_log("Attempting to create ZIP at: " . $zip_path);

    if ($zip->open($zip_path, ZipArchive::CREATE) !== TRUE) {
        error_log("Failed to create ZIP file: " . $zip_path);
        wp_die('Cannot create zip file');
    }

    $added_files = 0;

    foreach ($_POST['selected_docs'] as $doc_id) {
        $file = get_field('file', $doc_id);
        if (!$file || !isset($file['url'])) {
            error_log("No file found for document ID: " . $doc_id);
            continue;
        }

        $file_url = $file['url'];
        $file_name = basename($file_url);
        
        // Get the post title to use as the filename
        $post_title = get_the_title($doc_id);
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_name = sanitize_file_name($post_title . '.' . $file_extension);
        
        error_log("Processing document ID: " . $doc_id . ", File URL: " . $file_url);

        // Create a stream context that disables SSL verification
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);

        // Use the context in file_get_contents
        $file_content = file_get_contents($file_url, false, $context);
        if ($file_content === false) {
            error_log("Failed to read file contents: " . $file_url);
            continue;
        }

        if ($zip->addFromString($file_name, $file_content)) {
            $added_files++;
            error_log("Successfully added file to ZIP: " . $file_name);
        } else {
            error_log("Failed to add file to ZIP: " . $file_url . ", ZipArchive error: " . $zip->getStatusString());
        }
    }

    $zip->close();

    error_log("ZIP creation complete. Files added: " . $added_files);

    if ($added_files === 0) {
        error_log("No files were added to the ZIP. ZIP file path: " . $zip_path);
        wp_die('No files were added to the ZIP');
    }

    if (file_exists($zip_path)) {
        error_log("ZIP file created successfully: " . $zip_path);
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename=' . $zip_name);
        header('Content-Length: ' . filesize($zip_path));
        header('Pragma: no-cache');
        readfile($zip_path);

        unlink($zip_path); // Delete the temporary zip file
        exit;
    } else {
        error_log("ZIP file not created: " . $zip_path);
        wp_die('ZIP file not created');
    }
}

function handle_batch_download_extended_notes() {
    if (!isset($_POST['selected_docs']) || empty($_POST['selected_docs'])) {
        wp_send_json_error('No documents selected');
        return;
    }

    // Create a human-readable timestamp
    $timestamp = date('Y-m-d-H-i-s');
    
    $zip = new ZipArchive();
    $zip_name = 'selected_extended_notes_' . $timestamp . '.zip';
    $upload_dir = wp_upload_dir();
    $zip_path = $upload_dir['path'] . '/' . $zip_name;

    if ($zip->open($zip_path, ZipArchive::CREATE) !== TRUE) {
        wp_send_json_error('Cannot create zip file');
        return;
    }

    $added_files = 0;

    foreach ($_POST['selected_docs'] as $doc_id) {
        $file = get_field('file', $doc_id);
        if (!$file || !isset($file['url'])) {
            continue;
        }

        $file_url = $file['url'];
        $file_name = basename($file_url);
        
        // Get the post title to use as the filename
        $post_title = get_the_title($doc_id);
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_name = sanitize_file_name($post_title . '.' . $file_extension);

        // Create a stream context that disables SSL verification
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);

        // Use the context in file_get_contents
        $file_content = file_get_contents($file_url, false, $context);
        if ($file_content === false) {
            continue;
        }

        if ($zip->addFromString($file_name, $file_content)) {
            $added_files++;
        }
    }

    $zip->close();

    if ($added_files === 0) {
        wp_send_json_error('No files were added to the ZIP');
        return;
    }

    if (file_exists($zip_path)) {
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename=' . $zip_name);
        header('Content-Length: ' . filesize($zip_path));
        header('Pragma: no-cache');
        readfile($zip_path);

        unlink($zip_path); // Delete the temporary zip file
        exit;
    } else {
        wp_send_json_error('ZIP file not created');
    }
}

add_action('wp_head', function() {
    echo '<script>var ajaxurl = "' . admin_url('admin-ajax.php') . '";</script>';
});
