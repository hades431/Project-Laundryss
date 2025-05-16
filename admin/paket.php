<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Laundry App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg px-8 py-4 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <span class="text-3xl font-bold text-blue-700">LAUNDRY'SS</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="../index_admin.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">dashboard</span>
                Dashboard
            </a>
            <a href="./user.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">person</span>
                User
            </a>
            <a href="./outlet.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">store</span>
                Outlet
            </a>
            <a href="./paket.php" class="flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded font-semibold">
                <span class="material-icons text-blue-500 mr-1">local_laundry_service</span>
                Paket Laundry
            </a>
            <a href="./transaksi.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">receipt_long</span>
                Entri Transaksi
            </a>
            <a href="./member.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">group_add</span>
                Registrasi Pelanggan
            </a>
            <a href="./logout.php" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 font-bold text-white">
                Logout
            </a>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="p-8 max-w-7xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Our Paket Laundry</h1>
            <nav class="text-sm text-gray-500">
                <ol class="list-reset flex">
                    <li><a href="../index_admin.php" class="hover:text-blue-600">Home</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li>Admin</li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-gray-700 font-semibold">CRUD Paket</li>
                </ol>
            </nav>
        </div>
        <!-- Add Paket Button -->
        <div class="mb-6 flex justify-between items-center">
            <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow transition" onclick="document.getElementById('modalPaket').classList.remove('hidden')">
                Tambah Paket Laundry
            </button>
        </div>
        <!-- Paket Table -->
        <div class="bg-white rounded shadow p-6 overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama Outlet</th>
                        <th class="px-4 py-2 text-left">Jenis Paket</th>
                        <th class="px-4 py-2 text-left">Nama Paket</th>
                        <th class="px-4 py-2 text-left">Harga</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php
                    include "koneksi.php";
                    $qry_paket=mysqli_query($conn,"select * from paket JOIN outlet ON outlet.id_outlet = paket.id_outlet");
                    $no=0;
                    while($data_paket=mysqli_fetch_array($qry_paket)){
                    $no++;?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2"><?=$no?></td>
                        <td class="px-4 py-2"><?=$data_paket['nama']?></td>
                        <td class="px-4 py-2"><?=$data_paket['jenis']?></td>
                        <td class="px-4 py-2"><?=$data_paket['nama_paket']?></td>
                        <td class="px-4 py-2">Rp.<?=$data_paket['harga']?></td>
                        <td class="px-4 py-2 flex gap-2">
                            <a class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded transition" href="./admin/ubah_paket.php?id_paket=<?=$data_paket['id_paket']?>">
                                <span class="material-icons text-base">edit</span>
                            </a>
                            <a href="./admin/hapus_paket.php?id_paket=<?=$data_paket['id_paket']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition">
                                <span class="material-icons text-base">delete</span>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div id="modalPaket" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
                <div class="flex justify-between items-center border-b px-6 py-4">
                    <h2 class="text-lg font-semibold">Tambah Paket Laundry</h2>
                    <button class="text-gray-400 hover:text-gray-700" onclick="document.getElementById('modalPaket').classList.add('hidden')">
                        <span class="material-icons">close</span>
                    </button>
                </div>
                <form method="POST" action="proses_tambah_paket.php" enctype="multipart/form-data" class="px-6 py-4 space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-1">Nama Outlet</label>
                        <select name="id_outlet" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Pilih Outlet</option>
                            <?php
                            include "koneksi.php";
                            $qry_outlet=mysqli_query($conn,"select * from outlet");
                            while($data_outlet=mysqli_fetch_array($qry_outlet)){
                                echo '<option value="'.$data_outlet['id_outlet'].'">'.$data_outlet['nama'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Jenis</label>
                           <?php
	include "koneksi.php";
	$result = mysqli_query($conn, "SHOW COLUMNS FROM paket LIKE 'jenis'");
	$row = mysqli_fetch_array($result);
	preg_match("/^enum\(\'(.*)\'\)$/", $row['Type'], $matches);
	$enum_values = explode("','", $matches[1]);
	?>
<select name="jenis" class="w-full border border-gray-300 rounded px-3 py-2">
    <option value="">Pilih Jenis</option>
    <?php foreach($enum_values as $jenis): ?>
        <option value="<?= $jenis ?>"><?= ucfirst($jenis) ?></option>
    <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Nama Paket</label>
                        <input type="text" name="nama_paket" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Harga</label>
                        <input type="text" name="harga" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="flex justify-end gap-2 pt-2">
                        <button type="button" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700" onclick="document.getElementById('modalPaket').classList.add('hidden')">Batal</button>
                        <input type="submit" name="simpan" value="Tambah Paket" class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white font-semibold cursor-pointer">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>