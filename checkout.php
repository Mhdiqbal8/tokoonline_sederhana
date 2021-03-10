<?php 

// session_start();

// $id_user = $_SESSION["id_user"];


  <div class="container mb-2">
    <h6>Keranjang belanja</h6>
    <table class="table table-responsive">
      <!-- <h1>Keranjang Belanja</h1> -->
      <tr class="table-bordered" >
        <th>No</th>
        <th>Nama </th>
        <th>Harga </th>
        <th>Jumlah </th>
        <th>Total </th>
        <th>Aksi</th>
      </tr> 
      <pre>
      <?php 
      $no = 1;
      foreach ($_SESSION["keranjang"] as $id_produk => $value) : ?>
      <?php
      $select = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_produk = $id_produk");
      $keranjang = mysqli_fetch_assoc($select);
      $total = $keranjang['harga'] * $value; ?>
      <tr class="table-bordered">
        <td><?= $no++; ?></td>
        <td><?= $keranjang['nama']; ?></td>
        <td>Rp. <?= number_format($keranjang['harga']); ?></td>
        <td><?= $value; ?></td>
        <td>Rp. <?= number_format($total); ?></td>
        <td>
          <a href="edit_keranjang.php?id=<?=$id_produk;?>">Edit</a> |
          <a href="hapus_keranjang.php?id=<?=$id_produk;?>">Hapus</a>
        </td>
      </tr>
    <?php endforeach;  ?>
    </table>
    <a href="checkout.php" class="btn btn-success" name="checkout" type="submit">Chechout</a>
  </div>