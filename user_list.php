<?php include('header.php');?>
 <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="row page-head">

                        <div class="page-title col-md-8">
                            <h1>USER MANAGEMENT</h1>
                        </div>

                        
                        
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                   
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->

              
                    <div class="hub-management-table">
                        <table class="table table-checkable table-bordered table-hover" id="sample_21">
                            <thead>
                                <tr>
                                    <th> S.No.</th>
                                    <th> Full Name</th>
                                    <th> Email/User Name </th>
                                    <th> Phone Number </th>
                                    <th> Address</th>
                                    <th> User Type </th>
                                    <th> Country </th>
                                    <th>User Status</th>  
                                    <th>Edit User</th>      
                                    <!-- <th>Change Password</th>       -->
                                      
                                </tr>
                            </thead>
                            <tbody id="user_data">
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
           
        </div>
        <!-- END CONTAINER -->
        <?php include('footer.php');?>
        <?php include('user_j.php');?>
        <script type="text/javascript">
    $(document).ready(function (){
    $.holdReady( true );
    if (window.localStorage.getItem("firstname")==null) {
        window.location.replace("http://localhost/dm_live/index.php");
        return false;
    }else{
			  /*
                $.ajax({
                type: "GET",
                url: "http://finz.opmovings.com/dm_api/Api/hub_List",
                dataType: 'json',
                success: function( data ) {
                var i=0;                
                if(data.hub_data.length>0){
                    $.each(data.hub_data,function(key, value){ 
                        if(i==0){
                             $('#hub_options').append('<option selected value='+data.hub_data[i].id+'>'+data.hub_data[i].hub_name+'</option>');
                             //getPackages_list_all();
                        }else{
                        $('#hub_options').append('<option value='+data.hub_data[i].id+'>'+data.hub_data[i].hub_name+'</option>');}
                         i++;
                    });                 
                    }
                }
            }); 
			*/
        }
    });



</script>

<script>
 getUser_list_all();
 function getUser_list_all(){
        
         if (window.localStorage.getItem("firstname")==null) {
        window.location.replace("http://localhost/index.php");
        return false;
    }else{
                $.ajax({
                type: "GET",
                url: "dm_api/Api/user_List",
                dataType: 'json',
                success: function( data ) {console.log("user:",data.user_data);
                    var data = eval(data.user_data);
                      $("#sample_21").dataTable().fnDestroy();
                   // var t = $('#sample_21').DataTable();
                    var html='';
                    
                    var j=1; 
                    
                    for (var i = 0; i < data.length; i++) {
                       // var type='';
                       if(data[i].user_address == null){
                            address = '';
                       }else{
                        address = data[i].user_address;
                       }
                       if(data[i].country == null){
                        country = '';
                       }else{
                        country = data[i].country;
                       }
                        if(data[i].user_type == 0){
                               type = 'Admin';
                         } 
						 else if(data[i].user_type == 1){
                               type = 'EXE Assosicate';
                         }
						 else if(data[i].user_type == 2){
                               type = 'Finance Assosicate';
                         }
						 else
						 {
                              type = 'Driver';
                         }    
                            // var currentTime = new Date(data.user_data[i].created_at)
                            // var month = currentTime.getMonth() + 1;
                            // var day = currentTime.getDate();
                            // var year = currentTime.getFullYear();
                            // var date = day + "/" + month + "/" + year;
                            var status =  data[i].is_active;
                            if(status==1){var active = "Active";} else{ var active = "Deactivate"; }  
                            //         t.row.add( [
                            //         (i+1),
                            //         data.user_data[i].sau_FName,
                            //         data.user_data[i].sau_name,
                            //         data.user_data[i].sau_PhoneNo,
                            //         data.user_data[i].user_address,
                            //         type,
                            //         data.user_data[i].country,
                            //         '<a onclick=active_deactive(this.id,'+status+') id='+data.user_data[i].sa_id+'>'+active+'</a>',
                            //         '<a href="edit_user.php?id='+data.user_data[i].sa_id+'">Edit</a>'
                            //         ] ).draw( false );
                            // i++;
                            html += '<tr>' +
                                     '<td>' + j + '</td>' +
                                     '<td>' + data[i].sau_FName + '</td>' +
                                     '<td>' + data[i].sau_name + '</td>' +
                                     '<td>' + data[i].sau_PhoneNo + '</td>' +
                                     '<td>' + address + '</td>' +
                                     '<td>' + type + '</td>' +
                                     '<td>' + country + '</td>' +
                                     '<td><a onclick=active_deactive(this.id,'+status+') id='+data[i].sa_id+'>'+active+'</a></td>' +
                                     '<td><a href="edit_user.php?id='+data[i].sa_id+'">Edit</a></td>' ;
                                     html += '</tr>';
                                     j++;
                        };     
                        
                        $('#user_data').html(html);
                        $('#sample_21').DataTable();
                }

            }); 
        }
 }
 </script>