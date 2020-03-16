
<a href="<?php echo base_url('index.php/C_welldy/formAddKar'); ?>" class="btn btn-sm btn-primary">Add Karyawan</a>
<p></p>
<table class="table table-bordered tabel-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Action</th>
      <th scope="col">No</th>
      <th scope="col">Nip</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Tgl Lahir</th>
      <th scope="col">Telp</th>
      <th scope="col">Email</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Masa Kerja</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        foreach ($datas as $dt){
        ?>
    <tr>
      <td>
          <a href="<?php echo base_url('index.php/C_welldy/formAddKar/'.$dt->nip); ?>" class="btn btn-sm btn-primary"> Edit</a> 
          <!-- <a href="<?php echo base_url('index.php/C_welldy/formDelKar/'.$dt->nip); ?>" class="btn btn-sm btn-danger"> Del</a> -->
          <button type="button" onClick="delKar('<?php echo $dt->nip ?>')" class ="btn btn-sm btn-danger">Del</button>
        </td>
      <td><?php echo $no; $no++; ?></td>
      <td><?php echo $dt->nip ?></td>
      <td><?php echo $dt->nama ?></td>
      <td><?php echo $dt->jk ?></td>
      <td><?php echo $dt->tgl_lahir ?></td>
      <td><?php echo $dt->telp ?></td>
      <td><?php echo $dt->email ?></td>
      <td><?php echo $dt->alamat ?></td>
      <td><?php echo $dt->kode_jab ?></td>
      <td><?php echo $dt->masa_kerja ?></td>
    </tr>
        <?php } ?>
  </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
      debugger
      $(function() {
        delKar=function (val){
           var isvalid = confirm("Yakin Akan Mengahpus?"); 
           if(isvalid){
                $.ajax({
                    url : "<?php echo base_url('index.php/C_welldy/formDelKar'); ?>",
                    method : "POST",
                    data : {nip:val},
                    async : false,
                    dataType : 'json',
                    success:function(ret){
                      debugger
                      if(!ret){
                        alert('Data Telah DIpakei TIdak BIsa Hapus');
                      }
                        window.location = "<?php  echo base_url('index.php/C_welldy/vkar'); ?>";
                    }
                });
           }
        }
        });
    });
</script>