<?php
require_once __DIR__ . '/autoload.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Toko</title>
    <style>
        /* Reset some default styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6f42c1, #007bff);
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            overflow: hidden;
            flex-direction: column;
        }

        .container {
            width: 100%;
            max-width: 800px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 3rem;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo img {
            width: 150px;
            height: auto;
        }

        nav {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 700px;
            margin-top: 30px;
        }

        nav a {
            text-decoration: none;
            color: white;
            background: #28a745;
            padding: 20px 30px;
            border-radius: 10px;
            font-size: 1.2rem;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        nav a:hover {
            background: #218838;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
        }

        nav a:active {
            transform: translateY(-1px);
        }

        /* Small screen adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 500px) {
            h1 {
                font-size: 2rem;
            }

            nav a {
                padding: 15px 20px;
                font-size: 1rem;
            }
        }

        /* Adding a subtle animation effect for the links */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        nav a {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        nav a:nth-child(1) {
            animation-delay: 0.2s;
        }

        nav a:nth-child(2) {
            animation-delay: 0.4s;
        }

        /* Decorative Elements */
        .decorative {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url('https://www.example.com/decorative-pattern.png'); /* Ganti dengan URL pola dekoratif */
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.2;
            z-index: -1;
        }
    </style>
</head>
<body>
    <div class="decorative"></div> <!-- Decorative pattern -->

    <div class="container">
        <!-- Logo Section -->
        <div class="logo">
            <img src="../sistem_toko/src/images/logo.png" alt="Logo Perusahaan"> <!-- Ganti dengan path logo perusahaan Anda -->
        </div>
        
        <h1>Selamat Datang di Sistem Toko</h1>
        
        <!-- Navigation Links -->
        <nav>
            <a href="produk.php">Manajemen Produk</a>
            <a href="penjualan.php">Manajemen Penjualan</a>
        </nav>
    </div>
</body>
</html>
