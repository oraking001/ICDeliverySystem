$(document).ready(function(){
    //function to fill dropdown
    fillDropdown('hub','tbl_hub');
    fillDropdown('ori_hub','tbl_hub');
    fillDropdown('hub1','tbl_hub');
    function fillDropdown(id,table){
        $('#'+id).html('');
        $.ajax({
            type: "POST",
            url: "dm_api/Delivery/get_dropdown",
            data: {
                table_name: table,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {console.log("Result:", data);
                var data = eval(data);
                var html = '<option value="" selected>select</option>';
                for (var i = 0; i < data.length; i++) {
                    
                        name = data[i].hub_name;
                 
                    html += '<option value="'+data[i].id+'">'+name+'</option>';
                }
                $('#'+id).html(html);
            }
        });
    }
    var destination_hub='';
    var transit_bag = '';
    //function to generate transit bag number
    $(document).on("submit", "#hub_form", function(e) {
        e.preventDefault();
        destination_hub = $('#hub').val();
        var origin_hub = $('#hub1').val();
        if(destination_hub != origin_hub){
            if(destination_hub != ''){
                $('#msg').html('')
                var hub_name = $("#hub option:selected").text();
                //console.log("hub details:",hub_id, hub_name);
                var n =  generateRandomNDigits(4);
                //console.log("n:",n);
                transit_bag = 'TB'+hub_name + n;
            // console.log("transit_bag:",transit_bag);
            $('#hub_edit').hide();
            $('#bag_no').html(transit_bag);
            $('#dest_hub').html(hub_name);
            $('#hub_hidden').val(destination_hub);
            datashow(destination_hub='');
            $('#hub_list_data').show();
            }else{
                $('#msg').html('Please Select Destination Hub!')
            }
        }else{
            swal("Origin Hub and destination Hub cannot be the same!");
        }

    });

    var generateRandomNDigits = (n) => {
        return Math.floor(Math.random() * (9 * (Math.pow(10, n)))) + (Math.pow(10, n));
      }

       //function to list data into table
     function datashow(hub_id){
         $.ajax({
             type: "POST",
             url: "dm_api/Delivery/get_data",
             data: {
                 table_name: 'tbl_delivery',
                 hub_id: hub_id,
                 status: 0,
             },
             dataType: "JSON",
             async: false,
             success: function(data) {console.log("Result:", data);
               //  $("#delivery_table").dataTable().fnDestroy();
                 var data = eval(data);
                 var html = '';
                 for (var i = 0; i < data.length; i++) {
                     var status = '';
                     if(data[i].status == 0){
                         status = 'pending';
                     }
                     html += '<tr>' +
                     '<td data-orderable="false" style="display: table-cell;text-align: center;vertical-align: middle"><input class="chkclientpdf" type="checkbox" id="chk_'+data[i].id+'" disabled></td>'+
                     '<td id="receipt_' + data[i].id + '" data="'+data[i].id+'">ICL'+ data[i].receipt_no + '</td>' +
                     '<td id="logistictype_' + data[i].id + '">' + data[i].logi_type + '</td>' +
                     '<td id="vendorname_' + data[i].id + '">' + data[i].vendor_name + '</td>' +
                     '<td id="packagetype_' + data[i].id + '">' + data[i].pack_type + '</td>' +
                     '<td id="hub_' + data[i].id + '">' + data[i].hub_name + '</td>' +
                     '<td id="weight_' + data[i].id + '">' + data[i].pack_weight + '</td>' +
                     '<td id="city_' + data[i].id + '">' + data[i].city_name + '</td>' +
                     '<td id="status_' + data[i].id + '"><span class="label label-warning" style="color:#000000;">' + status + '</span></td>' ;
            
                     html += '</tr>' ;
                
                 }
                 $('#hub_list').html(html);
               //  $('#delivery_table').DataTable({});
             }
         });
        }

         //tracking no. enter event
         var package_weight = 0;
         $(document).on('keypress','#package_no',function(e) {
            if(e.which == 13) {
                var flag = 1;
                var tracking_no = $('#package_no').val();
                $('#hub_table > tbody  > tr').each(function() {
                    // $(this).find("td:gt(0)").each(function(){
                    //    alert($(this).html());
                    // });
                   
                   if($(this).find("td:gt(0)").html() == tracking_no){
                    var id = $(this).find("td:gt(0)").attr('data');
                  //  var weight = $(this).find("td:gt(5)").html();
                    
                    
                   // console.log(package_weight);
                    if ($('#chk_'+id).prop("checked") == true) {
                        $('#chk_'+id).prop("checked", false);
                        package_weight = parseInt(package_weight) - parseInt(1);
                   }else{
                        $('#chk_'+id).prop("checked", true);
                        package_weight = parseInt(package_weight) + parseInt(1);
                   }
                   $('#pac_cnt').html(package_weight);
                }
                });
            }
        });

        //change event of origin hub
        $(document).on("change", "#ori_hub", function(e) {
            e.preventDefault();
        var hub_id = $('#ori_hub').val();
        datashow(hub_id);
    });

    //click event of dispatch button
     $(document).on('click', "#dispatch", function(e) {
        e.preventDefault();
        var destination_hub = $('#hub_hidden').val();
        cid='';
               $(".chkclientpdf").each(function(index, elem) {
                //alert($(elem).prop("checked"));
               
                if ($(elem).prop("checked") == true) 
                {
                    var id = $(this).attr("id");
                    
                    id = id.split("_");
                    cid = cid + id[1] + ',';
                    
                   
                }
           });

           if(cid == ''){
            swal("Please Select Packages!");
           }else{
            swal({
                title: "are you sure you want to dispatch?",
             //   text: "You will not be able to recover this Data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                closeOnConfirm: true
            },
            function() {
                $.ajax({
                    data: {
                        tracking_no: cid,
                        hub_id: destination_hub,
                        transit_bag: transit_bag,
                        status: 1,
                    },
                    url: "dm_api/Transitbag/save_data",
                    type: "POST",
                    dataType: 'json',
                    // async: false,
                    success: function(data) {
                        $('#hub_edit').show();
                        $('#hub_list_data').hide();
                        successTost("Record Updated Successfully!");
                        $('#transit_bag').val(transit_bag);
                        $('#print_form').trigger('submit');
                        
                    
                    }
                });
            });
           }
     });
});