<!DOCTYPE html>
<html>
<head>
    <title> Print-Out Lampiran Surat </title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body { font-family: Arial; font-size: 20px; max-width: 21cm; max-height: 30cm; margin-left: 20%; border: 1px solid;}
        #ket_surat { font-size:medium; margin-left: 2cm; padding-right: 2cm;}
        .ket_surat_bawah { font-size: medium; margin-left: 13cm; text-align: center;}
        .ket_surat_dalam { font-size:medium; margin-left: 2cm; padding-right: 2cm; font-weight: bold;}
        button { 
            margin-bottom: 10px; 
            margin-left: 10px; 
            transition-duration: 0.4s;
            background-color: red; 
            border: 1px solid;
            border-radius: 5px;
            color: white;
            padding: 13px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            transition-duration: 0.4s;
            cursor: pointer;
        }
        button:hover {
            border-color: red; 
            background-color: white; 
            color: black;}

        a {
            text-decoration: none;
            color: white;
        }

        a:hover {
            color: black;
        }
    </style>
</head>

<body>
    <div id="lampiran-surat">
        <div>
            <center> <h1>Lampiran Surat</h1> </center>
            <hr>
        </div>
        <div id="ket_surat" class="col-11">
            <table>
                <thead class="primary">
                    <th> </th>
                </thead>
                <tbody>
                    <tr>
                        <td> Nomor </td> 
                        <td> : </td>
                        <td> <?php echo $surat_print['nomor_surat']; ?> </td>  
                    </tr>
                    <tr>
                        <td> Lampiran </td> 
                        <td> : </td>
                        <td name="lampiran" id="lampiran" value=""> <?php echo $surat_print['lampiran']; ?> </td>
                    </tr>
                    <tr>
                        <td> Perihal </td> 
                        <td> : </td>
                        <td name="hal" id="hal" value=""> <?php echo $surat_print['hal']; ?> </td>
                    </tr>
                </tbody>
            </table>
            <br><br>
               <b>
                   Yth. <?php echo $surat_print['kepada'] ?>
               </b> 
            <br>
            <div name="lokasi" id="lokasi" value=""> <?php echo $surat_print['lokasi']; ?> </div>
            <br><br>
            <div name="text_surat" id="text_surat" value=""> <?php echo $surat_print['text_surat']; ?> </div>
        </div>
        <br><br><br>
        <div class="ket_surat_bawah" align="right">
            <div name="tanggal_surat" id="tanggal_surat"> <?php echo date('l, d M Y', strtotime($surat_print['tanggal_surat']));?> </div>
        <br><br><br>
            <div name="penanda_tangan" id="penanda_tangan"> <?php echo $surat_print['penanda_tangan']; ?> </div>
        </div>
        <br>
    </div>
    <button onclick="javascript:printDiv('lampiran-surat');" style="text-decoration:none;">
        Print
    </button>&nbsp;
    <button>
    <a href="<?php echo base_url()?>surat/keluar/index" class="btn btn-warning">Kembali</a>
    </button>&nbsp;&nbsp;&nbsp;
</body>

    <textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
    <iframe id="printing-frame" name="print_frame" src='print.php' style="display:contents;"></iframe>
    
    <script type="text/javascript">
        function printDiv(elementId) 
        {
         var a = document.getElementById('printing-css').value;
         var b = document.getElementById(elementId).innerHTML;
         window.frames["print_frame"].document.title = "Print-Out Lampiran Surat";
         window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
        }
    </script>

</html>


