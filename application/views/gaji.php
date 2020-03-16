
<a href="<?php echo base_url('index.php/C_welldy/formAddGaji'); ?>" class="btn btn-sm btn-primary">Add Calculate Gaji</a>
<p></p>
<table class="table table-bordered tabel-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Action</th>
      <th scope="col">No</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama</th>
      <th scope="col">Date</th>
      <th scope="col">Bonus Amount</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        foreach ($datas as $dt){
        ?>
    <tr>
      <td>
          <!-- <a href="<?php echo base_url('index.php/C_welldy/formDelGaj/'.$dt->nip.'/'.$dt->rec_date); ?>" class="btn btn-sm btn-danger"> Del</a> -->
          <button type="button" onClick="delGaj('<?php echo $dt->nip ?>','<?php echo $dt->rec_date ?>')" class ="btn btn-sm btn-danger">Del</button>
        </td>
      <td><?php echo $no; $no++; ?></td>
      <td><?php echo $dt->nip ?></td>
      <td><?php echo $dt->nama ?></td>
      <td><?php echo $dt->rec_date ?></td>
      <td><?php echo number_format($dt->amt)?></td>
    </tr>
        <?php } ?>
  </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
      debugger
      $(function() {
        delGaj=function (nipval,recval){
           var isvalid = confirm("Yakin Akan Mengahpus?"); 
           if(isvalid){
                $.ajax({
                    url : "<?php echo base_url('index.php/C_welldy/formDelGaj'); ?>",
                    method : "POST",
                    data : {nip:nipval,rec:recval},
                    async : false,
                    dataType : 'json',
                    success:function(ret){
                      if(!ret){
                        alert('Data Telah Dipakei Tidak BIsa Hapus');
                      }
                        window.location = "<?php  echo base_url('index.php/C_welldy/vgaji'); ?>";
                    }
                });
           }
        }
        });
    });
</script>