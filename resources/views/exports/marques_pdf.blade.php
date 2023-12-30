<!-- resources/views/exports/marques_pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Marques</title>
    <style>
        /* Ajoutez des styles CSS pour la mise en page PDF */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Liste des Marques</h1>

    <table>
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Nom de la Marque</th>
                <!-- Ajoutez d'autres colonnes au besoin -->
            </tr>
        </thead>
        <tbody>
            @foreach($marques as $marque)
                <tr>
                    <td>{{ $marque->id_marque }}</td>
                    <td>{{ $marque->nom_marque }}</td>
                    <!-- Ajoutez d'autres cellules de données au besoin -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
