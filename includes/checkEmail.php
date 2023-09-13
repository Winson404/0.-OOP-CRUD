<?php
require_once '../db_connection.php';

function queryEmailExists($dbConnection, $email) {
    $stmt = $dbConnection->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    return $count > 0;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Perform the email existence check by passing the DB Connection and the Email
    $exists = queryEmailExists($dbConnection->getConnection(), $email);

    // Prepare the response
    $response = array('exists' => $exists);

    // Send the JSON response
    echo json_encode($response);
}
?>
