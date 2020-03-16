
<a href="<?php echo base_url('index.php/C_welldy/formAdd'); ?>" class="btn btn-sm btn-primary">Add Jabatan</a>
<p></p>
<table class="table table-bordered tabel-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Action</th>
      <th scope="col">No</th>
      <th scope="col">Kode Jabatan</th>
      <th scope="col">Nama Jabatan</th>
      <th scope="col">Standart Gaji</th>
      <th scope="col">Ket</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        foreach ($datas as $dt){
        ?>
    <tr>
      <td>
          <a href="<?php echo base_url('index.php/C_welldy/formAdd/'.$dt->kode_jab); ?>" class="btn btn-sm btn-primary"> Edit</a> 
          <!-- <a href="<?php echo base_url('index.php/C_welldy/formDel/'.$dt->kode_jab); ?>" class="btn btn-sm btn-danger"> Del</a> -->
          <button type="button" onClick="delJab(<?php echo $dt->kode_jab ?>)" class ="btn btn-sm btn-danger">Del</button>
        </td>
      <td><?php echo $no; $no++; ?></td>
      <td><?php echo $dt->kode_jab ?></td>
      <td><?php echo $dt->jabatan ?></td>
      <td><?php echo number_format($dt->std_gaji) ?></td>
      <td><?php echo $dt->ket ?></td>
    </tr>
        <?php } ?>
  </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
      
      $(function() {
        delJab =function (val){
           var isvalid = confirm("Yakin Akan Mengahpus?"); 
           if(isvalid){
                $.ajax({
                    url : "<?php echo base_url('index.php/C_welldy/formDel'); ?>",
                    method : "POST",
                    data : {kd_jab:val},
                    async : false,
                    dataType : 'json',
                    success:function(ret){
                      debugger
                      if(!ret){
                        alert('Data Telah DIpakei TIdak BIsa Hapus');
                      }
                        window.location = "<?php  echo base_url('index.php/C_welldy/vjab'); ?>";
                    }
                });
           }
        }
        });
    });
</script>