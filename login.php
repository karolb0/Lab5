<?php
// Archivo: login.php

// Incluir archivo de conexión a la base de datos
include_once "db_connection.php";

// Iniciar sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION["useridd"] = $user["id"];
        $_SESSION["rolee"] = $user["role"];

        switch ($user["rolee"]) {
            case "student":
                header("Location: student.php");
                break;
            case "faculty":
                header("Location: faculty.php");
                break;
            case "admin":
                header("Location: admin.php");
                break;
            default:
                header("Location: login.php?error=invalid_role");
                exit();
        }
    } else {
        header("Location: login.php?error=invalid_credentials");
        exit();
    }
}
?>
