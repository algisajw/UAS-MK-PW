<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Sewain</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        body {
            background-color: #f4f6f9;
            color: #333333;
        }
        nav {
            background-color: #ffffff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
        }
        nav h1 {
            font-size: 20px;
        }
        .logout-btn {
            color: #ff3333;
            text-decoration: none;
            font-size: 14px;
        }
        .content {
            padding: 30px;
        }
        .btn-add {
            display: inline-block;
            background-color: #333333;
            color: #ffffff;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
        }
        th, td {
            border: 1px solid #e0e0e0;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #f8f9fa;
        }
        .status-badge {
            padding: 4px 8px;
            font-size: 12px;
            color: #fff;
        }
        .tersedia {
            background-color: #28a745;
        }
        .disewa {
            background-color: #dc3545;
        }
        .action-btn {
            text-decoration: none;
            font-size: 13px;
            margin-right: 10px;
        }
        .edit {
            color: #0066cc;
        }
        .delete {
            color: #ff3333;
        }
    </style>
</head>
<body>
    <nav>
        <h1>Sewain - Panel Kelola Gedung</h1>
        <a class="logout-btn" href="/logout">Logout</a>
    </nav>
    <div class="content">
        <a class="btn-add" href="/dashboard/create">Tambah Gedung</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Gedung</th>
                    <th>Kapasitas</th>
                    <th>Harga Total</th>
                    <th>Harga /Jam</th>
                    <th>Durasi</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($gedung as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_gedung']; ?></td>
                    <td><?= $row['kapasitas']; ?> orang</td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td>Rp <?= number_format($row['harga_per_jam'], 0, ',', '.'); ?></td>
                    <td><?= $row['durasi_sewa']; ?> Jam</td>
                    <td><?= $row['lokasi']; ?></td>
                    <td>
                        <span class="status-badge <?= strtolower($row['status']); ?>">
                            <?= $row['status']; ?>
                        </span>
                    </td>
                    <td>
                        <a class="action-btn edit" href="/dashboard/edit/<?= $row['id']; ?>">Edit</a>
                        <a class="action-btn delete" href="/dashboard/delete/<?= $row['id']; ?>">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
