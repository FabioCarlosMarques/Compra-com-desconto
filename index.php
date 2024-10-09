<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Compra com Desconto</title>
</head>
<body>
    <h2>Formulário de Compra</h2>
    
    <!-- Formulário para envio dos dados -->
    <form method="POST" action="">
        <label for="product_name">Nome do Produto:</label><br>
        <input type="text" id="product_name" name="product_name" required><br><br>

        <label for="product_description">Descrição do Produto:</label><br>
        <textarea id="product_description" name="product_description" required></textarea><br><br>

        <label for="price">Valor Unitário (R$):</label><br>
        <input type="number" step="0.01" id="price" name="price" required><br><br>

        <label for="quantity">Quantidade:</label><br>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php
    // Verificar se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Receber os dados do formulário
        $productName = $_POST["product_name"];
        $productDescription = $_POST["product_description"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];

        // Calcular o valor total sem desconto
        $totalWithoutDiscount = $quantity * $price;

        // Aplicar o desconto conforme a regra
        if ($totalWithoutDiscount > 1000) {
            $discount = 0.10; // 10%
        } else {
            $discount = 0.05; // 5%
        }

        // Calcular o valor do desconto
        $discountValue = $totalWithoutDiscount * $discount;

        // Calcular o valor total com desconto
        $totalWithDiscount = $totalWithoutDiscount - $discountValue;

        // Exibir os resultados
        echo "<h3>Detalhes do Produto:</h3>";
        echo "Nome do Produto: " . htmlspecialchars($productName) . "<br>";
        echo "Descrição do Produto: " . htmlspecialchars($productDescription) . "<br>";
        echo "Quantidade: " . htmlspecialchars($quantity) . "<br>";
        echo "Valor Unitário: R$ " . number_format($price, 2, ',', '.') . "<br>";
        echo "Valor Total Sem Desconto: R$ " . number_format($totalWithoutDiscount, 2, ',', '.') . "<br>";
        echo "Valor do Desconto: R$ " . number_format($discountValue, 2, ',', '.') . " (" . ($discount * 100) . "%)<br>";
        echo "Valor Total Com Desconto: R$ " . number_format($totalWithDiscount, 2, ',', '.') . "<br>";
    }
    ?>

</body>
</html>
