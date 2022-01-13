<html>
    <head>
        <title>Driver Sheet List</title>
        <style>
            .allborder {
                border: 1px solid #000;
                text-align: left;
            }
        </style>
    </head>
    <body id="receipt">
    
        <table width="100%" style="border:2px solid rgb(0,0,0);">
            <thead>
                <tr>
                     <th colspan="5" align="" style="border-bottom: 2px solid rgb(0, 0, 0);padding-right:10px;"><img src="<?php echo base_url() ?>assets/images/logo.jpg" /></th>
                </tr>
                <tr>
                    <th colspan="5" style="padding-top:10px;text-align:left;"><h2>Driver Sheet: <?php echo $driver_sheet; ?></h2></th>
                </tr>
                <tr>
                    <th colspan="5" style="padding-top:10px;text-align:left;"><h2>Driver Name: <?php echo $driver_name; ?></h2></th>
                </tr>
                <tr>
                    <th colspan="2" style="border-bottom: 2px solid rgb(0, 0, 0);padding-top:10px;text-align:left;"><h2>Destination Hub: <?php echo $destination_hub; ?></h2></th>
                    <th colspan="5" style="border-bottom: 2px solid rgb(0, 0, 0);padding-top:10px;text-align:right;"><h2>Number of Packages: <?php echo $package_count; ?></h2></th>
                </tr>
                <tr>    
					<th style="border-bottom: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);">Tracking No</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);">Customer Name</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);">Address</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);">Phone</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);">Barcode</th>
		
                </tr>
            </thead>
            <tbody>
            <?php
            $i=0; $j=0;
            foreach ($record as $v) {
                $i++;
               
                if(count($record) == $i){
               
            ?>
                <tr>
                    <td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);"><?php echo 'ICL'.$v->receipt_no; ?></td>
                    <td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);"><?php echo $v->vendor_name; ?></td>
                    <td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);"><?php echo $v->rec_address; ?></td>
                    <td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);"><?php echo $v->rec_phone; ?></td>
					<td style="text-align:center;"><img src="<?php echo base_url() ?>uploads/<?php echo $barcode[$j]; ?>" width="300px" height="100px"/></td>
					
                </tr>
            <?php
            }else{
                ?>
                    <tr>
                    <td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);border-bottom: 2px solid rgb(0, 0, 0);"><?php echo 'ICL'.$v->receipt_no; ?></td>
                    <td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);border-bottom: 2px solid rgb(0, 0, 0);"><?php echo $v->vendor_name; ?></td>
                    <td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);border-bottom: 2px solid rgb(0, 0, 0);"><?php echo $v->rec_address; ?></td>
                    <td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);border-bottom: 2px solid rgb(0, 0, 0);"><?php echo $v->rec_phone; ?></td>
					<td style="text-align:center;border-bottom: 2px solid rgb(0, 0, 0);border-bottom: 2px solid rgb(0, 0, 0);"><img src="<?php echo base_url() ?>uploads/<?php echo $barcode[$j]; ?>" width="300px" height="100px"/></td>
					
                </tr>
        <?php
            }
            $j++;
            }?>
            </tbody>
            
        </table>
       
<script> 
    window.print(); 	
</script>
    </body>
</html>