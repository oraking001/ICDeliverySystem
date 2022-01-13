<html>
    <head>
        <title>Transit Bag List</title>
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
                     <th colspan="9" align="" style="border-bottom: 2px solid rgb(0, 0, 0);padding-right:10px;"><img src="<?php echo base_url() ?>assets/images/logo.jpg" /></th>
                </tr>
                <tr>
                    <th colspan="4" style="border-bottom: 2px solid rgb(0, 0, 0);padding-top:10px;text-align:left;"><h2>Transit No: <?php echo $transit_bag; ?></h2></th>
                    <th colspan="5" style="border-bottom: 2px solid rgb(0, 0, 0);padding-top:10px;text-align:right;"><h2>Destination Hub: <?php echo $destination_hub; ?></h2></th>
                </tr>
                <tr>    
					<th style="border-bottom: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);">Tracking No</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);">Logistic Type</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);">Vendor Name</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);">Package Type</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);">Origin Hub</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);">Weight</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);">Shipping Fee</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);">Destination City</th>                                             
                    <th style="border-bottom: 2px solid rgb(0, 0, 0);">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($record as $v) {
            ?>
                <tr>
                    <td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);"><?php echo 'ICL'.$v->receipt_no; ?></td>
					<td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);"><?php echo $v->logi_type; ?></td>
					<td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);"><?php echo $v->vendor_name; ?></td>
					<td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);"><?php echo $v->pack_type; ?></td>
					<td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);"><?php echo $v->hub_name; ?></td>
					<td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);"><?php echo $v->pack_weight; ?></td>
					<td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);"><?php echo $v->shipping_fee; ?></td>
					<td style="text-align:center;border-right: 2px solid rgb(0, 0, 0);"><?php echo $v->city_name; ?></td>                                             
                    <td style="text-align:center;"><?php echo 'INTransit'; ?></td>
                </tr>
            <?php
            }?>
            </tbody>
            
        </table>
       
<script> 
    window.print(); 	
</script>
    </body>
</html>