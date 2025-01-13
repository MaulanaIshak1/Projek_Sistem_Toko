<?php
namespace App\Handlers;

use Exception;

class SaleHandler extends AbstractHandler
{
    public function addSale($productId, $quantity)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO penjualan (produk_id, jumlah) VALUES (?, ?)");
            $stmt->execute([$productId, $quantity]);

            $stmt = $this->pdo->prepare("UPDATE produk SET stok = stok - ? WHERE id = ?");
            $stmt->execute([$quantity, $productId]);
        } catch (Exception $e) {
            throw new Exception("Failed to add sale: " . $e->getMessage());
        }
    }

    public function getAllSales()
    {
        $stmt = $this->pdo->query(
            "SELECT p.nama, j.jumlah 
             FROM penjualan j 
             JOIN produk p ON j.produk_id = p.id"
        );
        return $stmt->fetchAll();
    }
}
