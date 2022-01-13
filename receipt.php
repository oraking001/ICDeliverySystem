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
	for ($i=0 ; $i<2; $i++) {
            if($i == 0){
                $heading = "Receipt";
            }else{
                $heading = "Way Bill";
            }
		?>
        <table width="100%" style="border:2px solid rgb(0,0,0);">
            <tr>
                <td style="border-bottom: 2px solid rgb(0, 0, 0);padding-left:10px;"><h2><?php echo $heading; ?></h2></td>
                <td align="right" style="border-bottom: 2px solid rgb(0, 0, 0);padding-right:10px;"><img src="assets/images/logo.jpg" /></td>
            </tr>
            <tr>
                <td rowspan=2 style="border-right: 2px solid rgb(0, 0, 0);border-bottom: 2px solid rgb(0, 0, 0);padding-left:10px;padding-top:10px;">
                         <h2>Destination City: Rajkot</h2>
                </td>
                <td style="border-bottom: 2px solid rgb(0, 0, 0);padding-right:10px;padding-top:10px;text-aligh:right;">
                    <h2><center>Small Parcel</center></h2>
                </td>
            </tr>
            <tr>
                <td style="border-bottom: 2px solid rgb(0, 0, 0);padding-right:10px;padding-top:10px;text-aligh:right;">
                    <h2><center>1 KG</center></h2>
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
                        <img src="assets/images/qr-code.png" width="100px" height="100px"/>
                        <img src="assets/images/barcode.jpg" width="300px" height="100px" style="margin-left:200px;"/><br><h2 style="margin-left:300px;">ICL23565889</h2>
                    </center>
                </td>
               <!-- <td style="padding-bottom:10px;">
                     <center><img src="assets/images/barcode.jpg" width="300px" height="100px"/><br><h2>ICL23565889</h2></center>
                </td> -->
            </tr>
            <tr>
                <td style="border-bottom: 2px solid rgb(0, 0, 0);padding-left:10px;padding-top:10px;">
                    <h2>Reciever's Name: Vishal AKbari</h2>
                    <h2 style="margin-top:15px;">Reciever's Address: Rajkot</h2>
                    <h2>Reciever's Email: vishal@gmail.com</h2>
                </td>
                <td style="border-bottom: 2px solid rgb(0, 0, 0);padding-right:10px;padding-top:10px;">
                   <h2>Vendor Name: Vishal AKbari</h2>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom: 2px solid rgb(0, 0, 0);padding-left:10px;padding-top:10px;">
                    <h2>LOGISTICS TYPE: Intercity</h2>
                </td>
            </tr>
            <tr>
                <td style="padding-left:10px;padding-top:10px;"><h2>Origin Hub: HUB1</h2></td>
                <td style="padding-right:10px;padding-top:10px;"><b><h2>Shipping Fee: 3000</h2></b></td>
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
        <?php 
        }
    } ?>
<script> 
    window.print(); 	
</script>
    </body>
</html>