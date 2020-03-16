
<!doctype html>
<html lang="en">
  <head>

    <title>Test Welldy</title>

<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" >
<script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js');?>" ></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>" ></script>
  
    
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="#">Welldy-Penggajian</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/C_welldy/vjab'); ?>">Jabatan <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/C_welldy/vkar'); ?>">Karyawan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="<?php echo base_url('index.php/C_welldy/vrule'); ?>" >Aturan Gaji</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="<?php echo base_url('index.php/C_welldy/vgaji'); ?>" >Penggajian</a>
      </li>
    </ul>
   
  </div>
</nav>

<main role="main" class="container">
<?php
    $this->load->view($page);
?>
  
</main>
<script type="text/javascript">
    $(document).ready(function(){
      $(function() {
         generateObj=function(datastring){
            var dataArr=datastring.split("&");
                var obj={};
                for(var i=0;i<dataArr.length;i++){
                    var dt=dataArr[i].split("=");
                    obj[dt[0]]=dt[1];
                }
            obj.save=true;
            return obj;
        }
      });
    });
</script>

</html>
