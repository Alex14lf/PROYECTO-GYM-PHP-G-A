<?php

if (!$_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: ../index.php");
} else {
    if (isset($_POST["user"])) {
        $user = $_POST["user"];
    }
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }
}

include "./funciones";

?>
