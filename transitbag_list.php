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
                    <th colspan="2" style="border-bottom: 2px solid rgb(0, 0, 0);padding-top:10px"><h2>Transit No: THhub25652</h2></th>
                    <th colspan="2" style="border-bottom: 2px solid rgb(0, 0, 0);padding-top:10px"><h2>Destination Hub: HUb2</h2></th>
                    <th colspan="5" align="" style="border-bottom: 2px solid rgb(0, 0, 0);padding-right:10px;"><img src="assets/images/logo.jpg" /></th>
                </tr>
                <tr>    
					<th style="border-bottom: 2px solid rgb(0, 0, 0);">Tracking No</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);">Logistic Type</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);">Vendor Name</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);">Package Type</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);">Origin Hub</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);">Weight</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);">Shipping Fee</th>
					<th style="border-bottom: 2px solid rgb(0, 0, 0);">Destination City</th>                                             
                    <th style="border-bottom: 2px solid rgb(0, 0, 0);">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            for($i=0;$i<4;$i++){
            ?>
                <tr>
                    <td style="text-align:center;">ILC456856</td>
					<td style="text-align:center;">Logistic Type</td>
					<td style="text-align:center;">Vendor Name</td>
					<td style="text-align:center;">Package Type</td>
					<td style="text-align:center;">Origin Hub</td>
					<td style="text-align:center;">Weight</td>
					<td style="text-align:center;">Shipping Fee</td>
					<td style="text-align:center;">Destination City</td>                                             
                    <td style="text-align:center;">Status</td>
                </tr>
            <?php
            }?>
            </tbody>
            
        </table>
       
<script> 
    //window.print(); 	
</script>
    </body>
</html>