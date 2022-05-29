<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">tanggal</th>
      <th scope="col">nama mandor</th>
      <th scope="col">nama wilayah</th>
      <th scope="col">nama plan</th>
      <th scope="col">nama pekerjaan</th>
      <th scope="col">biaya pekerja dan sopir</th>
      <th scope="col">biaya pupuk</th>
      <th scope="col">total biaya</th>
      <th scope="col">biaya ha</th>
      <th scope="col">konsumsi ha</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($hasil as $hsl) :?>
    <tr>
      <th scope="row">1</th>
      <td><?= $hsl['tanggal']; ?></td> 
      <td><?= $hsl['nama_mandor']; ?></td>
      <td><?= $hsl['kebun']; ?></td>
      <td><?= $hsl['nama_plan']; ?></td>
      <td><?= $hsl['nama_pekerjaan']; ?></td>
      <td><?=floor( $hsl['biaya_pekerja_sopir']); ?></td> 
      <td><?=floor( $hsl['biaya_pupuk']); ?></td>
      <td><?=floor( $hsl['total_biaya']); ?></td>
      <td><?= floor($hsl['biaya_ha']); ?></td> 
      <td><?= floor($hsl['konsumsi_ha']); ?></td>
     
    </tr>
   <?php endforeach; ?>
  </tbody>
</table>