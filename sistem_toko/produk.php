<?php
require_once __DIR__ . '/vendor/autoload.php'; // Pastikan autoload Composer digunakan

use App\Handlers\ProductHandler;

$productHandler = new ProductHandler();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $productHandler->addProduct($_POST['name'], $_POST['price'], $_POST['stock']);
    } elseif (isset($_POST['delete'])) {
        $productHandler->deleteProduct($_POST['id']);
    }
}

$products = $productHandler->getAllProducts();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f7a8b8, #ff8c00);
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #fff;
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .container:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        form input, form button {
            padding: 12px;
            margin: 12px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
            width: 100%;
            font-size: 1rem;
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
            font-size: 1rem;
        }
        th {
            background-color: #f2f2f2;
            font-weight: 700;
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
            padding: 15px 25px;
            border-radius: 5px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }
        .back-button a:hover {
            background-color: #0056b3;
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
        <h1>Manajemen Produk</h1>
        <form method="POST">
            <input type="text" name="name" placeholder="Nama Produk" required>
            <input type="number" name="price" placeholder="Harga" required>
            <input type="number" name="stock" placeholder="Stok" required>
            <button type="submit" name="add">Tambah Produk</button>
        </form>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['id']) ?></td>
                    <td><?= htmlspecialchars($product['nama']) ?></td>
                    <td><?= htmlspecialchars($product['harga']) ?></td>
                    <td><?= htmlspecialchars($product['stok']) ?></td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
                            <button type="submit" name="delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="back-button">
            <a href="index.php">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
