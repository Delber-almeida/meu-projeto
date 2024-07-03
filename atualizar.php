<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Dados</title>
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
        form {
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
        <h1>Atualizar Dados do Formulário</h1>

        <?php
        // Verifica se o ID foi fornecido
        if (!isset($_GET['id'])) {
            echo "<p>ID não fornecido.</p>";
            echo "<a href='javascript:history.go(-1);'>Voltar</a>";
            exit;
        }

        $id = $_GET['id'];

        include 'conecta.php';

        // Busca os dados do formulário com o ID fornecido
        $sql = "SELECT * FROM formulario WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "<p>Nenhum dado encontrado para o ID fornecido.</p>";
            echo "<a href='javascript:history.go(-1);'>Voltar</a>";
            exit;
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
        ?>

        <!-- Formulário para atualização -->
        <form method="post" action="processa_atualizacao.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

            <label for="avaliacao">Avaliação da Série (1 a 5 estrelas):</label>
            <select id="avaliacao" name="avaliacao" required>
                <option value="1" <?php if ($row['avaliacao'] == 1) echo 'selected'; ?>>1 Estrela</option>
                <option value="2" <?php if ($row['avaliacao'] == 2) echo 'selected'; ?>>2 Estrelas</option>
                <option value="3" <?php if ($row['avaliacao'] == 3) echo 'selected'; ?>>3 Estrelas</option>
                <option value="4" <?php if ($row['avaliacao'] == 4) echo 'selected'; ?>>4 Estrelas</option>
                <option value="5" <?php if ($row['avaliacao'] == 5) echo 'selected'; ?>>5 Estrelas</option>
            </select>

            <label for="episodio">Episódio Favorito:</label>
            <input type="text" id="episodio" name="episodio" value="<?php echo $row['episodio']; ?>">

            <label for="comentarios">Comentários sobre a Série:</label>
            <textarea id="comentarios" name="comentarios" rows="4"><?php echo $row['comentarios']; ?></textarea>

            <label for="personagem">Personagem Favorito:</label>
            <input type="text" id="personagem" name="personagem" value="<?php echo $row['personagem']; ?>">

            <label for="gostaram">O que mais gostou na série?</label>
            <textarea id="gostaram" name="gostaram" rows="4"><?php echo $row['gostaram']; ?></textarea>

            <button type="submit">Atualizar</button>
        </form>

        <!-- Botão de voltar -->
        <a href="javascript:history.go(-1);">Voltar</a>
    </div>
</body>
</html>
