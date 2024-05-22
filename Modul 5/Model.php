<?php
require_once 'Koneksi.php';

function getData($koneksi, $table, $orderBy) {
    try {
        // Query yang akan dijalankan
        $query = "SELECT * FROM $table ORDER BY $orderBy DESC";
        
        // Khusus untuk tabel peminjaman, kita memerlukan join
        if ($table == 'peminjaman') {
            $query = "SELECT p.id_peminjaman, m.nama_member, b.judul_buku, p.tgl_pinjam, p.tgl_kembali
                      FROM peminjaman p
                      JOIN member m ON p.id_member = m.id_member
                      JOIN buku b ON p.id_buku = b.id_buku
                      ORDER BY $orderBy DESC";
        }
        
        // Menjalankan query
        $stmt = $koneksi->query($query);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    } finally {
        // Menutup koneksi secara eksplisit
        $koneksi = null;
    }
}

function deleteData($koneksi, $table, $column, $id) {
    try {
        $stmt = $koneksi->prepare("DELETE FROM $table WHERE $column = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Menutup koneksi secara eksplisit
        $koneksi = null;
    }
}

function updateData($koneksi, $tabel, $data, $whereColumn, $whereValue) {
    try {
        // Membuat string untuk kolom yang akan di-update
        $setClause = [];
        foreach ($data as $key => $value) {
            $setClause[] = "$key = :$key";
        }
        $setClauseStr = implode(', ', $setClause);
        
        // Persiapan query untuk update data
        $stmt = $koneksi->prepare("UPDATE $tabel SET $setClauseStr WHERE $whereColumn = :whereValue");
        
        // Bind parameter untuk kolom yang akan di-update
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        // Bind parameter untuk klausa WHERE
        $stmt->bindValue(':whereValue', $whereValue);
        
        // Eksekusi statement
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    } finally {
        // Menutup koneksi secara eksplisit
        $koneksi = null;
    }
}

function insertData($koneksi, $tabel, $data) {
    try {
        $kolom = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        // Persiapan query untuk insert data
        $stmt = $koneksi->prepare("INSERT INTO $tabel ($kolom) VALUES ($placeholders)");
        
        // Bind parameter
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        // Eksekusi statement
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    } finally {
        // Menutup koneksi secara eksplisit
        $koneksi = null;
    }
}

function isExist($koneksi, $column_id, $id_member, $table) {
    try {
        $stmt = $koneksi->prepare("SELECT 1 FROM $table WHERE $column_id = $id_member LIMIT 1");
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function getById($koneksi, $table, $keyColumn, $keyValue) {
    try {
        if ($table == 'peminjaman') {
            $query = "SELECT p.id_peminjaman, m.id_member, b.id_buku, p.tgl_pinjam, p.tgl_kembali
                      FROM peminjaman p
                      JOIN member m ON p.id_member = m.id_member
                      JOIN buku b ON p.id_buku = b.id_buku
                      WHERE p.$keyColumn = :keyValue";
        } else {
            $query = "SELECT * FROM $table WHERE $keyColumn = :keyValue";
        }

        // Persiapan query
        $stmt = $koneksi->prepare($query);
        $stmt->bindParam(':keyValue', $keyValue, PDO::PARAM_INT);

        // Eksekusi statement
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}


?>
