
<a href="<?php echo base_url('index.php/C_welldy/formAddRul'); ?>" class="btn btn-sm btn-primary">Add Aturan</a>
<p></p>
<table class="table table-bordered tabel-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Action</th>
      <th scope="col">No</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Masa Kerja</th>
      <th scope="col">Insentif</th>
      <th scope="col">Bonus</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        foreach ($datas as $dt){
        ?>
    <tr>
      <td>
          <a href="<?php echo base_url('index.php/C_welldy/formAddRul/'.$dt->kode_jab.'/'.$dt->masa_kerja); ?>" class="btn btn-sm btn-primary"> Edit</a> 
          <a href="<?php echo base_url('index.php/C_welldy/formDel/'.$dt->kode_jab); ?>" class="btn btn-sm btn-danger"> Del</a>
        </td>
      <td><?php echo $no; $no++; ?></td>
      <td><?php echo $dt->kode_jab ?></td>
      <td><?php echo $dt->masa_kerja ?></td>
      <td><?php echo number_format($dt->insentif) ?></td>
      <td><?php echo number_format($dt->bonus) ?></td>
    </tr>
        <?php } ?>
  </tbody>
</table>