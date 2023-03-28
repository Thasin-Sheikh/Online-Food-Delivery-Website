<?php

require_once 'source/db_connect.php';

if ( isset( $_POST['signup-btn'] ) ) {
    $username = $_POST['user-name'];
    $email = $_POST['user-email'];
    $password = $_POST['user-pass'];

    $hashed_password = password_hash( $password, PASSWORD_DEFAULT );

    try {
        $SQLInsert = "INSERT INTO myfirsttb(username, password, email)
                   VALUES (:username, :password, :email)";

        $statement = $conn->prepare( $SQLInsert );
        $statement->execute( array( ':username' => $username, ':password' => $hashed_password, ':email' => $email ) );
        if ( $statement->rowCount() == 1 ) {
            echo"Regestration successful";
        }
    } catch ( PDOException $e ) {
        echo "Error: " . $e->getMessage();
    }

}

?>