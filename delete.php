<?php
$link = mysqli_connect("localhost", "root", "12345678", "non-tax");
if ($link === false) {
    die(mysqli_connect_error());
}


function deleteRow($link, $table, $idColumn, $id)
{
    $id = mysqli_real_escape_string($link, $id);
    $sql = "DELETE FROM $table WHERE $idColumn = '$id'";

    if (mysqli_query($link, $sql)) {
        echo "Record deleted successfully from $table \n <br>";
    } else {
        echo "Error deleting record from $table: " . mysqli_error($link);
    }
}

if (isset($_POST["submit"])) {
    //
    $id = $_POST["id"];
    if (!empty($id)) {
        deleteRow($link, "main", "id", $id);
    }

    // Delete from scheme table
    $id_delete = isset($_POST["id"]) ? $_POST["id"] : '';
    if (!empty($id_delete)) {
        deleteRow($link, "flora", "id", $id_delete);
    }

    
}

mysqli_close($link);
?>