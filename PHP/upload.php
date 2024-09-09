<?php
require 'C:/wamp64/www/sahan/gym-main/vendor/autoload.php';
// Load Composer's autoloader

function uploadToGoogleDrive($filePath) {
    // Create a new Google client
    $client = new Google_Client();
    $client->setAuthConfig('client_secret_823479849184-mh1qt1hhp0anif9gf1m9uuioggs35v24.apps.googleusercontent.com.json');
    $client->addScope(Google_Service_Drive::DRIVE_FILE);

    // Load previously authorized token from a file if exists, otherwise get a new one
    if (file_exists('token.json')) {
        $accessToken = json_decode(file_get_contents('token.json'), true);
        $client->setAccessToken($accessToken);
        
        // Refresh the token if expired
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            file_put_contents('token.json', json_encode($client->getAccessToken()));
        }
    } else {
        // Request authorization from the user
        $authUrl = $client->createAuthUrl();
        echo "Open the following link in your browser:\n$authUrl\n";
        echo "Enter the authorization code:\n";
        $authCode = trim(fgets(STDIN));

        // Exchange authorization code for an access token
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
        $client->setAccessToken($accessToken);

        // Save the token for future use
        if (!file_exists(dirname('token.json'))) {
            mkdir(dirname('token.json'), 0700, true);
        }
        file_put_contents('token.json', json_encode($client->getAccessToken()));
    }

    // Set up Google Drive service
    $service = new Google_Service_Drive($client);

    // Create file metadata
    $fileMetadata = new Google_Service_Drive_DriveFile(array(
        'name' => basename($filePath)
    ));

    // Upload the file
    $content = file_get_contents($filePath);
    $file = $service->files->create($fileMetadata, array(
        'data' => $content,
        'mimeType' => mime_content_type($filePath),
        'uploadType' => 'multipart',
        'fields' => 'id'
    ));

    // Get the file ID
    $fileId = $file->id;

    // Make the file public
    $permission = new Google_Service_Drive_Permission([
        'type' => 'anyone',
        'role' => 'reader'
    ]);
    $service->permissions->create($fileId, $permission);

    // Return shareable link
    return "https://drive.google.com/uc?id=" . $fileId;
}

// Usage example:
$filePath = 'C:\\Users\\sahan\\Desktop\\CS photo\\sahan.jpg'; // Replace with the path to your file
$link = uploadToGoogleDrive($filePath);
echo "File uploaded successfully! Shareable link: " . $link;
echo "File uploaded successfully! Shareable link: " . $link;
?>
