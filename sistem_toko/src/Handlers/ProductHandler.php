<?php
namespace App\Handlers;

class ProductHandler extends AbstractHandler
{
    public function getAllProducts()
    {
        return $this->pdo->query("SELECT * FROM produk")->fetchAll();
    }

    public function addProduct($name, $price, $stock)
    {
        $stmt = $this->pdo->prepare("INSERT INTO produk (nama, harga, stok) VALUES (?, ?, ?)");
        $stmt->execute([$name, $price, $stock]);
    }

    public function deleteProduct($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM produk WHERE id = ?");
        $stmt->execute([$id]);
    }
}
