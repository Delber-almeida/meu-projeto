<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Dados</title>
    <link rel="stylesheet" href="project.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .background {
            background: url('background-image.jpg') no-repeat center center fixed;
            background-size: cover;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
            color: #333;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="container">
        <h1>Deletar Dados do Formulário</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Avaliação</th>
                <th>Episódio Favorito</th>
                <th>Comentários</th>
                <th>Personagem Favorito</th>
                <th>O que mais gostou</th>
                <th>Ações</th>
            </tr>
            <?php
            include 'conecta.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
                $id = $_POST["id"];
                $sql = "DELETE FROM formulario WHERE id='$id'";

                if ($conn->query($sql) === TRUE) {
                    echo "<p>Registro deletado com sucesso!</p>";
                } else {
                    echo "<p>Erro ao deletar registro: " . $conn->error . "</p>";
                }
            }

            $sql = "SELECT * FROM formulario";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nome"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["avaliacao"] . "</td>
                        <td>" . $row["episodio"] . "</td>
                        <td>" . $row["comentarios"] . "</td>
                        <td>" . $row["personagem"] . "</td>
                        <td>" . $row["gostaram"] . "</td>
                        <td>
                            <form method='post' action='delete.php' style='display:inline-block;'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit'>Deletar</button>
                            </form>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Nenhum dado encontrado</td></tr>";
            }

            $conn->close();
            ?>
        </table>
        <a href="javascript:history.go(-1);">Voltar</a>
    </div>
</body>
</html>
