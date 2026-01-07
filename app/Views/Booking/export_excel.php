<?php
header("Content-type: application/vnd-ms-excel");
?>
<table border="1">
    <thead>
        <tr>
            <th style="background-color: #4680ff; color: white;">No</th>
            <th style="background-color: #4680ff; color: white;">Tanggal Pesan</th>
            <th style="background-color: #4680ff; color: white;">Peminjam</th>
            <th style="background-color: #4680ff; color: white;">Kendaraan</th>
            <th style="background-color: #4680ff; color: white;">Driver</th>
            <th style="background-color: #4680ff; color: white;">Periode</th>
            <th style="background-color: #4680ff; color: white;">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($bookings as $b) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $b['created_at'] ?></td>
            <td><?= $b['username'] ?></td>
            <td><?= $b['vehicle_name'] ?></td>
            <td><?= $b['driver_name'] ?></td>
            <td><?= $b['start_date'] ?> s/d <?= $b['end_date'] ?></td>
            <td><?= $b['status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>