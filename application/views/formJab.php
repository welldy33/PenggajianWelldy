
<form id="formJab" action="<?php echo base_url('index.php/C_welldy/saveJab'); ?>" method="post">
    <label>Kode Jabatan</label>
    <input type="text" readonly="true" name="kd_jab" id="kd_jab" value="<?php echo ($data)?$data->kode_jab:'';?>"  class="form-control">
    <label>Jabatan</label>
    <input type="text" name="jab" id="jab" value="<?php echo ($data)?$data->jabatan:'';?>" class="form-control" required>
    <label>Standart Gaji</label>
    <input type="number" name="sal" value="<?php echo ($data)?$data->std_gaji:'';?>" class="form-control" required>
    <label>Ket</label>
    <input type="text" name="ket" value="<?php echo ($data)?$data->ket:'';?>" class="form-control" required>
    <legend></legend>
    <!-- <input type="submit" class="btn btn-primary" name="save" value="Submit"> -->
    <button type="button" id="btnSave" class="btn btn-primary">Save</button>
    <a href="<?php echo base_url('index.php/C_welldy/cancelJab'); ?>" class="btn btn-warning">Cancel</a>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        debugger
        $("#formJab").validate({
                rules: {
                    jab: "required"
                    ,sal:"required"
                }
                ,messages: {
                    jab: "Please enter Jabatan"
                    ,sal: "Please enter Salary"
                }
            });
        $('#btnSave').click(function(){
            debugger
           var isvalid= $("#formJab").valid();
           if(isvalid){
                var datastring = $("#formJab").serialize();
                var obj=generateObj(datastring)
                debugger
                $.ajax({
                    url : "<?php echo base_url('index.php/C_welldy/saveJab'); ?>",
                    method : "POST",
                    data : obj,
                    async : false,
                    dataType : 'json',
                    success:function(ret){
                        window.location = "<?php  echo base_url('index.php/C_welldy/vjab'); ?>";
                    }
                });
           }
        });
    });
</script>