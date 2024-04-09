<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define the CSV file path
    $csvFile = 'registros_mentorias.csv';
    // Open the file in append mode
    $fileHandle = fopen($csvFile, 'a');

    // Get form data
    $formData = [
        $_POST['Nombre'] ?? '',
        $_POST['NumeroEstudiante'] ?? '',
        $_POST['Razon'] ?? '',
        $_POST['Servicio'] ?? '',
        $_POST['Curso'] ?? '',
        $_POST['Seccion'] ?? '',
        $_POST['Profesor'] ?? '',
        $_POST['Tema'] ?? '',
        $_POST['Mentor'] ?? '',
        isset($_POST['gridRadios']) ? ($_POST['gridRadios'] === 'option1' ? 'Presencial' : 'Virtual') : '',
        $_POST['DiaHora'] ?? '',
    ];

    // Append the form data to the CSV file
    fputcsv($fileHandle, $formData);

    // Close the file
    fclose($fileHandle);

    // Redirect or display a success message
    echo "Registro completado con éxito.";
} else {
    // Not a POST request
    echo "Error en el envío del formulario.";
}
?>