
<aside class="w-64">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="p-4">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="space-y-2">         
            <?php
                $main = $this->db->get_where('tb_menu', array('kat_menu' => 0));
                foreach ($main->result() as $m) {
                    // cek ada submenu atau tidak
                    $sub = $this->db->get_where('tb_menu', array('kat_menu' => $m->id_menu));
                    if ($sub->num_rows() > 0) {
                        // buat menu + sub menu
                        echo '<li class="group">';
                        echo anchor($m->link, '<i class="' . $m->icon . ' text-white"></i>
                        <span class="text-white">' . $m->nama_menu . '</span>
                        <b class="fa fa-angle-left ml-auto text-gray-400 group-hover:text-white transition"></b>', 
                        array('class' => 'flex items-center justify-between gap-2 p-2 hover:bg-gray-700 rounded-lg'));
                        echo "<ul class='ml-4 mt-2 space-y-2 hidden group-hover:block'>";
                        foreach ($sub->result() as $s) {
                            echo '<li>' . anchor($s->link, '<i class="' . $s->icon . ' text-white"></i> ' . $s->nama_menu, 
                            array('class' => 'flex items-center gap-2 p-2 hover:bg-gray-700 rounded-lg')) . '</li>';
                        }
                        echo "</ul>";
                        echo '</li>';
                    } else {
                        // single menu
                        echo '<li>' . anchor($m->link, '<i class="' . $m->icon . ' text-white fa-lg"></i>
                        <span class="text-white ml-2">' . $m->nama_menu . '</span>', 
                        array('class' => 'flex items-center  gap-2 p-2 hover:bg-gray-700 rounded-lg')) . '</li>';
                    }                
                } 
            ?>
        </ul> 
		
    </section>
    <!-- /.sidebar -->
</aside>
