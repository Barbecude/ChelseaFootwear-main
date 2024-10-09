<!DOCTYPE html>
<html>
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
     
            
          
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-gray-800 border border-gray-700 flex flex-col rounded-lg p-4">
                    <div class="bg-blue-800/30 w-12 h-12 flex justify-center items-center rounded-lg mb-2">
                        <span class="info-box-icon text-blue-500 text-xl"><i class="fa fa-user"></i></span>
                    </div>
                    <span class="info-box-text text-gray-400">User</span>
                    <span class="text-4xl text-white font-medium"><?php echo $pegawai['jml_pegawai']; ?></span>
                </div>
                <a href="<?php echo base_url()?>produk">
                <div class="bg-gray-800 border border-gray-700 flex flex-col rounded-lg p-4">
                    <div class="bg-green-800/30 w-12 h-12 flex justify-center items-center rounded-lg mb-2">
                        <span class="info-box-icon text-green-500 text-xl"><i class="fa fa-cube"></i></span>
                    </div>
                    <span class="info-box-text text-gray-400">Produk</span>
                    <span class="text-4xl text-white font-medium"><?php echo $produk['jml_produk']; ?></span>
                </div>
                </a>
            </div>

    </section>
</html>

<script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".preloader").fadeOut();
    });
</script>