<form action="<?php echo base_url('index.php/C_welldy/saveGaj'); ?>" name="formGaj" id="formGaj" method="post">
    <label>Kode Jabatan</label>
    <select name="kd_jab" id="kd_jab" class="form-control">
        <option value="0">-PILIH-</option>
                <?php foreach($data as $row):?>
                    <option value="<?php echo $row->kode_jab;?>"><?php echo $row->jabatan;?></option>
                <?php endforeach;?>
        </select>
    <label>NIP</label>
    <select name="nip" class="subkategori form-control">
        <option value="0">-PILIH-</option>
    </select>
    <legend></legend>
    <!-- <input type="submit" class="btn btn-primary" name="save" value="Calculate"> -->
    <button type="button" id="btnSaveGaj" class="btn btn-primary">Calculate</button>
    <a href="" class="btn btn-warning">Cancel</a>
</form>

      <script type="text/javascript">
    $(document).ready(function(){
        $("#formGaj").validate({
                rules: {
                    kd_jab: "required"
                    ,nip:"required"
                }
                ,messages: {
                    kd_jab: "Please enter Jabatan"
                    ,nip: "Please enter Employee"
                }
            });
        $('#btnSaveGaj').click(function(){
            debugger
           var isvalid= $("#formGaj").valid();
           if(isvalid){
                var datastring = $("#formGaj").serialize();
                var obj=generateObj(datastring)
                debugger
                $.ajax({
                    url : "<?php echo base_url('index.php/C_welldy/saveGaj'); ?>",
                    method : "POST",
                    data : obj,
                    async : false,
                    dataType : 'json',
                    success:function(ret){
                        if(!ret){
                            alert("TIdak Bisa Insert")
                        }else{
                            window.location = "<?php  echo base_url('index.php/C_welldy/vgaji'); ?>";
                        }
                    }
                });
           }
        });
        $('#kd_jab').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url('index.php/C_welldy/get_nip'); ?>",
                method : "POST",
                data : {kode_jab: id},
                async : false,
                dataType : 'json',
                success: function(data){
                   // alert(JSON.stringify(data))
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].nip+'">'+data[i].nama+'</option>';
                    }
                    $('.subkategori').html(html);
                }
            });
        });
    });
</script>