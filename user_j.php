<script type="text/javascript">
    $(document).ready(function (){      
     $.holdReady( true );
    // if (window.localStorage.getItem("firstname")==null) {
    //     window.location.replace("http://localhost/index.php");
    //     return false;
    // }else{
    //             $.ajax({
    //             type: "GET",
    //             url: "dm_api/Api/user_List",
    //             dataType: 'json',
    //             success: function( data ) {
    //                 $("#sample_21").dataTable().fnDestroy();
    //                 var t = $('#sample_21').DataTable();
    //                 var html='';
    //                 if(data.user_data.length>0){
    //                 var i=0; 
    //                 var type='';
    //                $.each(data.user_data,function(key, value){    
    //                     if(data.user_data[i].user_type==0){
    //                            type = 'Admin';
    //                      } 
	// 					 else if(data.user_data[i].user_type==1){
    //                            type = 'EXE Assosicate';
    //                      }
	// 					 else
	// 					 {
    //                           type = 'Finance Assosicate';
    //                      }    
    //                         var currentTime = new Date(data.user_data[i].created_at)
    //                         var month = currentTime.getMonth() + 1;
    //                         var day = currentTime.getDate();
    //                         var year = currentTime.getFullYear();
    //                         var date = day + "/" + month + "/" + year;
    //                         var status =  data.user_data[i].is_active;
    //                         if(status==1){var active = "Active";} else{ var active = "Deactivate"; }  
    //                         //         t.row.add( [
    //                         //         (i+1),
    //                         //         data.user_data[i].sau_FName,
    //                         //         data.user_data[i].sau_name,
    //                         //         data.user_data[i].sau_PhoneNo,
    //                         //         data.user_data[i].user_address,
    //                         //         type,
    //                         //         data.user_data[i].country,
    //                         //         '<a onclick=active_deactive(this.id,'+status+') id='+data.user_data[i].sa_id+'>'+active+'</a>',
    //                         //         '<a href="edit_user.php?id='+data.user_data[i].sa_id+'">Edit</a>',
	// 						// 		'<a href="change_password.php?id='+data.user_data[i].sa_id+'">Edit</a>'
    //                         //         ] ).draw( false );
    //                         // i++;
    //                         html += '<tr>' +
    //                                  '<td id="tiername_' + data.user_data[i].sa_id + '">' + (++i) + '</td>' +
    //                                  '<td id="tiername_' + data.user_data[i].sa_id + '">' + data.user_data[i].sau_FName + '</td>' +
    //                                  '<td id="tiername_' + data.user_data[i].sa_id + '">' + data.user_data[i].sau_name + '</td>' +
    //                                  '<td id="tiername_' + data.user_data[i].sa_id + '">' + data.user_data[i].sau_PhoneNo + '</td>' +
    //                                  '<td id="tiername_' + data.user_data[i].sa_id + '">' + data.user_data[i].user_address + '</td>' +
    //                                  '<td id="tiername_' + data.user_data[i].sa_id + '">' + data.user_data[i].type + '</td>' +
    //                                  '<td id="tiername_' + data.user_data[i].sa_id + '">' + data.user_data[i].country + '</td>' +
    //                                  '<td id="tiername_' + data.user_data[i].sa_id + '"><a onclick=active_deactive(this.id,'+status+') id='+data.user_data[i].sa_id+'>'+active+'</a></td>' +
    //                                  '<td id="tiername_' + data.user_data[i].sa_id + '"><a href="edit_user.php?id='+data.user_data[i].sa_id+'">Edit</a></td>' ;
    //                                  html += '</tr>';
    //                     });   
    //                     $('#user_data').html(html);                   
    //                 }
    //            // else{alert('No Data Found');}
    //             }

    //         }); 
    //     }
    });

   function active_deactive(id, active){
        if(active==1){
            var ch = 'Deactivate';
        }else{
            var ch = 'Activate';
        }
         if (confirm("Are you sure you want to "+ch+" these user ?")) {
         $.ajax({
            type: "POST",
            url: "dm_api/Api/active_Deactive",
            dataType: "json",
            data: {"id":id},
            success: function(resp)
            {
                console.log(resp);
                if(resp){
            var status = resp.status;
            if(status=="TRUE"){           
                      alert(resp.message);
                      window.location.reload();
            }else{
                alert(resp.message);
                window.location.reload();                
            }
          }          
          else {
            alert('Somthing went wrong. Please try again later');
          }
       }
   });
 }
    return false;
    }
</script>