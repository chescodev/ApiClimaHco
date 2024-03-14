<!-- templates/WeatherData/select_dates.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar Fechas</title>
</head>
<body>
    <h2>Seleccionar Fechas</h2>
    <form action="/WeatherData/filteredData" method="get">
        <label for="startDate">Fecha de inicio:</label>
        <input type="date" id="startDate" name="startDate" required><br><br>

        <label for="endDate">Fecha de fin:</label>
        <input type="date" id="endDate" name="endDate" required><br><br>

        <button type="submit">Filtrar Datos</button>
    </form>
</body>
</html>
