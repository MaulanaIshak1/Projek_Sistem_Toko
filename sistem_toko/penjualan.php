<?php
require_once __DIR__ . '/vendor/autoload.php'; // Pastikan autoload Composer digunakan

use App\Handlers\ProductHandler;
use App\Handlers\SaleHandler;

$productHandler = new ProductHandler();
$saleHandler = new SaleHandler();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $saleHandler->addSale($_POST['product_id'], $_POST['quantity']);
}

$products = $productHandler->getAllProducts();
$sales = $saleHandler->getAllSales();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Penjualan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #74ebd5, #9face6);
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #fff;
            font-size: 3rem;
            margin-bottom: 30px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .container:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
        form select, form input, form button {
            padding: 12px;
            margin: 12px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
            width: 100%;
            font-size: 1.1rem;
        }
        form button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        form button:hover {
            background-color: #218838;
            transform: translateY(-3px);
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: center;
            font-size: 1.1rem;
        }
        th {
            background-color: #f7f7f7;
            font-weight: 600;
        }
        td {
            background-color: #f9f9f9;
        }
        td button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        td button:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
        }
        .back-button {
            margin-top: 30px;
            text-align: center;
        }
        .back-button a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .back-button a:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .container {
            animation: fadeIn 0.8s ease-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manajemen Penjualan</h1>
        <form method="POST">
            <select name="product_id" required>
                <option value="">Pilih Produk</option>
                <?php foreach ($products as $product): ?>
                    <option value="<?= $product['id'] ?>"><?= $product['nama'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="quantity" placeholder="Jumlah" required>
            <button type="submit">Tambah Penjualan</button>
        </form>

        <h2>Daftar Penjualan</h2>
        <table>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
            </tr>
            <?php foreach ($sales as $sale): ?>
                <tr>
                    <td><?= htmlspecialchars($sale['nama']) ?></td>
                    <td><?= htmlspecialchars($sale['jumlah']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="back-button">
            <a href="index.php">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
