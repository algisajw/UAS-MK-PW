<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Gedung</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        body {
            background-color: #f4f6f9;
            padding: 30px;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            max-width: 500px;
            margin: 0 auto;
            border: 1px solid #e0e0e0;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            font-size: 14px;
            outline: none;
        }
        .btn-group {
            display: flex;
            gap: 10px;
        }
        button {
            padding: 10px 15px;
            background-color: #333333;
            color: #ffffff;
            border: none;
            font-size: 14px;
            cursor: pointer;
        }
        .btn-back {
            display: inline-block;
            padding: 10px 15px;
            background-color: #cccccc;
            color: #333333;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Data Gedung</h2>
        <form action="/dashboard/store" method="post">
            <div class="form-group">
                <label>Nama Gedung</label>
                <input type="text" name="nama_gedung" required>
            </div>
            <div class="form-group">
                <label>Kapasitas (Orang)</label>
                <input type="number" name="kapasitas" required>
            </div>
            <div class="form-group">
                <label>Harga Total</label>
                <input type="number" name="harga" required>
            </div>
            <div class="form-group">
                <label>Harga Per Jam</label>
                <input type="number" name="harga_per_jam" required>
            </div>
            <div class="form-group">
                <label>Durasi Sewa (Jam)</label>
                <input type="number" name="durasi_sewa" required>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <textarea name="lokasi" required></textarea>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="Tersedia">Tersedia</option>
                    <option value="Disewa">Disewa</option>
                </select>
            </div>
            <div class="btn-group">
                <button type="submit">Simpan</button>
                <a class="btn-back" href="/dashboard">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
