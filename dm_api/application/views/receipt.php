<html>
    <head>
        <title>Receipt & Way Bill Print</title>
        <style>
            .allborder {
                border: 1px solid #000;
                text-align: left;
            }
        </style>
    </head>
    <body id="receipt">
    <?php
    
    for($i=0; $i<2; $i++){
	foreach ($record as $v) {
            if($i == 0){
                $heading = "Receipt";
            }else{
                $heading = "Way Bill";
            }
		?>
        <table width="100%" style="border:2px solid rgb(0,0,0);">
            <tr>
                <td style="border-bottom: 2px solid rgb(0, 0, 0);padding-left:10px;padding-top:10px"><h2><?php echo $heading; ?></h2></td>
                <td align="right" style="border-bottom: 2px solid rgb(0, 0, 0);padding-right:10px;"><img src="<?php echo base_url() ?>assets/images/logo.jpg" /></td>
            </tr>
            <tr>
                <td rowspan=2 style="border-right: 2px solid rgb(0, 0, 0);border-bottom: 2px solid rgb(0, 0, 0);padding-left:10px;padding-top:10px;">
                         <h2>Destination City: <?php echo $v->city_name; ?></h2>
                </td>
                <td style="border-bottom: 2px solid rgb(0, 0, 0);padding-right:10px;padding-top:10px;text-aligh:right;">
                    <h2><center>Small Parcel</center></h2>
                </td>
            </tr>
            <tr>
                <td style="border-bottom: 2px solid rgb(0, 0, 0);padding-right:10px;padding-top:10px;text-aligh:right;">
                    <h2><center><?php echo $v->pack_weight; ?></center></h2>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left:10px;padding-top:10px;">
                    <h2>Date: <?php echo date('d/m/Y'); ?></h2>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom: 2px solid rgb(0, 0, 0);padding-bottom:10px;">
                    <center>
                        <img src="<?php echo base_url() ?>uploads/<?php echo $qrcode; ?>" width="100px" height="100px"/>
                        <img src="<?php echo base_url() ?>uploads/<?php echo $barcode; ?>" width="300px" height="100px" style="margin-left:200px;"/><br>
                        <!-- <h2 style="margin-left:300px;">ICL23565889</h2> -->
                    </center>
                </td>
               <!-- <td style="padding-bottom:10px;">
                     <center><img src="assets/images/barcode.jpg" width="300px" height="100px"/><br><h2>ICL23565889</h2></center>
                </td> -->
            </tr>
            <tr>
                <td style="border-bottom: 2px solid rgb(0, 0, 0);padding-left:10px;padding-top:10px;">
                    <h2>Reciever's Name: <?php echo $v->rec_name; ?></h2>
                    <h2 style="margin-top:15px;">Reciever's Address: <?php echo $v->rec_address; ?></h2>
                    <h2>Reciever's Email: <?php echo $v->vendor_email; ?></h2>
                </td>
                <td style="border-bottom: 2px solid rgb(0, 0, 0);padding-right:10px;padding-top:10px;">
                   <h2>Vendor Name: <?php echo $v->vendor_name; ?></h2>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom: 2px solid rgb(0, 0, 0);padding-left:10px;padding-top:10px;">
                    <h2>LOGISTICS TYPE: <?php echo $v->logi_type; ?></h2>
                </td>
            </tr>
            <tr>
                <td style="padding-left:10px;padding-top:10px;"><h2>Origin Hub: <?php echo $v->hub_name; ?></h2></td>
                <td style="padding-right:10px;padding-top:10px;"><b><h2>Shipping Fee: <?php echo $v->shipping_fee; ?></h2></b></td>
            </tr>
        </table>
        <?php
        if($i == 0){
        ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <?php 
        }
    }
 } ?>
<script> 
    window.print(); 	
</script>
    </body>
</html>