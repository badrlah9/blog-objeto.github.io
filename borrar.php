
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

    require_once "../modelo/Articulo.php";
    require_once "../modelo/RepositorioArticulos.php";
    require_once "../modelo/conexion.php";

    
    // Check if the "id" parameter is set in the URL
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    
        // Use prepared statements to prevent SQL injection
        $consulta = "DELETE FROM articulos WHERE id = ?";
        $stmt = $conexion->prepare($consulta);
    
        // Bind the parameter to the prepared statement
        $stmt->bind_param("i", $id);
    
        // Execute the statement
        $stmt->execute();
    
        // Close the statement
        $stmt->close();
    
        // Redirect to index.php after deletion
        header("location: index.php");
    } else {
        // Handle the case when "id" is not set in the URL
        echo "Error: Missing 'id' parameter in the URL.";
    }

?>
