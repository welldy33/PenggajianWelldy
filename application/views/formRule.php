<form action="<?php echo base_url('index.php/C_welldy/saveRul'); ?>" method="post">
    <label>Kode Jabatan</label>
   <select name="kode_jab" id="kode_jab" value="<?php echo ($data)?$data->kode_jab:'';?>" class="form-control">
        <option value="0">-PILIH-</option>
                <?php foreach($datajab as $row):?>
                    <option value="<?php echo $row->kode_jab;?>"><?php echo $row->jabatan;?></option>
                <?php endforeach;?>
        </select>
    <label>Masa Kerja</label>
    <input type="number" name="masa_kerja" value="<?php echo ($data)?$data->masa_kerja:'';?>" class="form-control" required>
    <label>Insentif</label>
    <input type="number" name="insentif" value="<?php echo ($data)?$data->insentif:'';?>" class="form-control" required>
    <label>Bonus</label>
    <input type="number" name="bonus" value="<?php echo ($data)?$data->bonus:'';?>" class="form-control" required>
    <legend></legend>
    <input type="submit" class="btn btn-primary" name="save" value="Submit">
    <a href="" class="btn btn-warning">Cancel</a>
</form>