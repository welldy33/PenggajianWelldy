
<form action="<?php echo base_url('index.php/C_welldy/saveKar'); ?>" method="post">
    <label>NIP</label>
    <input type="text" name="nip" value="<?php echo ($data)?$data->nip:'';?>"  class="form-control">
    <label>Nama</label>
    <input type="text" name="nama" value="<?php echo ($data)?$data->nama:'';?>" class="form-control" required>
    <label>Jenis Kelamin</label>
    <select name="jk" id="jk" value="<?php echo ($data)?$data->jk:'';?>" class="form-control">
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
    </select>
   
    <label>Tanggal Lahir</label>
    <input type="date" name="tgl" value="<?php echo ($data)?$data->tgl_lahir:'';?>" class="form-control" required>
    <label>Telp</label>
    <input type="text" name="tlp" value="<?php echo ($data)?$data->telp:'';?>" class="form-control" required>
    <label>Email</label>
    <input type="email" name="email" value="<?php echo ($data)?$data->email:'';?>" class="form-control" required>
    <label>Alamat</label>
    <input type="text" name="alamat" value="<?php echo ($data)?$data->alamat:'';?>" class="form-control" required>
    <label>Jabatan</label>
    <select name="jab" id="jab" class="form-control">
        <option value="0">-PILIH-</option>
                <?php foreach($datajab as $row):?>
                    <option value="<?php echo $row->kode_jab;?>"><?php echo $row->jabatan;?></option>
                <?php endforeach;?>
        </select>
    
    <label>Masa Kerja</label>
    <input type="number" name="mk" value="<?php echo ($data)?$data->masa_kerja:'';?>" class="form-control" required>
    <legend></legend>
    <input type="submit" class="btn btn-primary" name="save" value="Submit">
    <a href="" class="btn btn-warning">Cancel</a>
</form>