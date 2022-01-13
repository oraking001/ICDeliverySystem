<?php include('header.php');?>
 <!-- BEGIN CONTENT -->
<?php 
    $user_id = $_GET['dmsu']; 
    $hub_id = $_GET['hub_id'];
    $d1 = $_GET['d1'];
    $d1 = base64_decode($d1);
    $d2 =  $_GET['d2'];
    $d2 = base64_decode($d2);

    $user_id = base64_decode($user_id);
    $url1 = 'http://partner.opmovings.com/dm_api/Api/get_Username/'.$user_id;
    $ch = curl_init($url1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result_user = curl_exec($ch);
    curl_close($ch);
    $array_user = json_decode($result_user,true);           
    $array_user = reset($array_user);
    // echo '<pre>';
    // print_r($array_user);
?>

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="row page-head">

                        <div class="page-title col-md-10">
                            <h1>Add Acount Statement</h1>
                        </div>
                        <div class="col-md-2">
                                <a href="account_statement.php" class="btn btn-info">Cancel</a>
                            <a onclick="myPrint()" href="#" class="btn btn-success">Print</a>
                        </div>
                        
                    </div>
                    <div class="invoice-content">
                        <table class="table table-bordered" width="100%">
                            <tr>
                                <td colspan="2">
                                    <?php $user_image = $array_user['sau_LName'];
                                    if($user_image!=''){ 
                                   // if (file_exists('http://partner.opmovings.com/agreement/'.$user_image)) { ?>
                                        <img src="agreement/<?php echo $user_image;?>" height="200" width="300" alt="Please upload LOGO Again">
                                    <?php //} else{ echo "Please upload logo again."; }?>
                                         
                                    <?php }
                                    else{ ?>
                                        <h2>There is no logo uploaded yet.</h2>
                                    <?php }
                                    ?>
                                </td>
                                <td colspan="2">
                                    <?php echo $array_user['company_name'].','; ?> <?php echo 'Address: '.$array_user['user_address']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Invoice Number</th>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <th>Account Details</th>
                                <td colspan="3"><?php echo 'Bank Name:'.$array_user['bank'];?><br/><?php echo 'Account Number: '.$array_user['account_number'];?><br/>Account Name: <?php echo $array_user['account_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Tin</th>
                                <td colspan="3"><?php echo $array_user['company_tin']; ?></td>
                            </tr>
                            <tr>
                                <th>Cycle</th>
                                <?php  
                                
                                $from_date_old = DateTime::createFromFormat('m-d-Y', $d1);
                                $d_ctcle = $from_date_old->format('Y-m-d');
                                ?>
                                <td colspan="3"><?php echo date("F", strtotime($d_ctcle)); ?></td>
                            </tr>
                             <?php 
          $url = 'http://partner.opmovings.com/dm_api/Api/account_statement_List/'.$hub_id.'/'.$d1.'/'.$d2;
           //$url = 'http://localhost/dm_api/Api/account_statement_List/'.$hub_id ;
           $ch = curl_init($url);
           curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           $result = curl_exec($ch);
           curl_close($ch);
           // echo $result;
            $array_hub = json_decode($result,true);           
            $new_array = reset($array_hub);
            foreach ($new_array as $key => $value) {
               $hub_name =  $value['hub_name'];
            }                                              
        ?>
                            <tr>
                                <th>Hub Name</th>
                                <th>Count Of Tracking Number</th>
                                <th>Rate</th>
                                <th>Amount Payable</th>
                            </tr>
                            <tr>
                                <th><?php echo $hub_name; ?></th>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <?php 
                            $sum = 0;
                            $total_pack = 0;
                           foreach ($new_array as $key => $value) { 
                                $sum = $sum+($value['totalhub'] * $value['rate']);
                                $total_pack = $total_pack+$value['totalhub'];
                            ?>
                            <tr>
                                <td><?php echo $value['delivery_classification']; ?></td>
                                <td><?php echo $value['totalhub']; ?></td>
                                <td><?php echo number_format((float)$value['rate'], 2, '.', ''); ?></td>
                                <td><?php $payble = $value['totalhub'] * $value['rate'] ; 
                                echo number_format((float)$payble, 2, '.', '');
                                ?></td></tr>
                            <?php }  ?>
                           
                            

                            <?php 
          $url = 'http://partner.opmovings.com/dm_api/Api/account_deduction_List/'.$hub_id.'/'.$d1.'/'.$d2;
           //$url = 'http://localhost/dm_api/Api/account_statement_List/'.$hub_id ;
           $ch = curl_init($url);
           curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           $result_deduction = curl_exec($ch);
           curl_close($ch);
            //echo $result_deduction;
            $array_dedy = json_decode($result_deduction,true);           
            $dedu_array = reset($array_dedy);
            // echo '<pre>';
            // print_r($array_dedy);
           // echo $totalDeduction = array_sum(array_column($array_dedy,'deduct_amount'));

               ?>                                      
                            <tr>
                                <th colspan="1">Total Earning</th>
                                <th><?php echo $total_pack; ?></th>
                                <th colspan="1"></th>
                                <th><?php echo number_format((float)$sum, 2, '.', '');; ?></th>
                            </tr>
                          
                            
                             <?php 
                             $totaldeduction = 0;
                            foreach ($array_dedy as $key => $value_dedu) {
                                $totaldeduction = $totaldeduction + $value_dedu['deduct_amount'];
                                ?><tr><td colspan="3">Deduction: <?php echo $value_dedu['deduction_type'];?></td>
                                    <td><?php echo $value_dedu['deduct_amount']; ?></td>
                                </tr>
                                
                            <?php 
                                //echo $totaldeduction;
                            }
                            ?>
                            
                            
                            
                            <tr>
                                <td colspan="2">Gross Amount</td>
                                <td></td>
                                <td><?php $gross_amount = $sum-$totaldeduction; 
                                echo number_format((float)$gross_amount, 2, '.', '');
                                ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">VAT</td>
                                <td><?php echo $value['vat'].''; ?></td>
                                <td><?php $vat = ($sum*$value['vat'])/100; 
                                echo number_format((float)$vat, 2, '.', '');
                                ?></td>
                            </tr>
                            <tr>
                                <th colspan="2">Total Payable</th>
                                <th></th>
                                <th><?php $total_payble = $gross_amount+$vat;
                                    echo number_format((float)$total_payble, 2, '.', '');?></th>
                            </tr>
                        </table>
                    </div>
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <?php include('footer.php');?>
        
<script>
function myPrint() {
    window.print();
}
</script>