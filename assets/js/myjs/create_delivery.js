$(document).ready(function(){
    //change event of user type to hide snf show fields
    $(document).on("change", "#user_type", function(e) {
        e.preventDefault();
        var user_type = $('#user_type').val();

        if(user_type == 'new'){
            $('#vendor_drop').hide();
            $('#vendor_text').show();
            $('.ven_data').show();
            $('#vendor_name').val('');
            $('#vendor_name').attr('required','required');
            $('#vendor_phone').val('');
            $('#vendor_phone').attr('required','required');
            $('#vendor_email').val('');
            $('#vendor_email').attr('required','required');

        }else{
            $('#vendor_drop').show();
            $('.ven_data').show();
            $('#vendor_text').hide();
            $('#vendor').attr('required','required');
            $('#vendor_name').removeAttr('required');
            $('#vendor_phone').val('');
            $('#vendor_phone').attr('required','required');
            $('#vendor_email').val('');
            $('#vendor_email').attr('required','required');
        }
    });

    //function to fill dropdown
    fillDropdown('vendor','tbl_vendor');
    fillDropdown('city','tbl_city');
    fillDropdown('hub','tbl_hub');
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
                    if(table == 'tbl_vendor'){
                        name = data[i].vendor_name;
                    }else if(table == 'tbl_city'){
                        name = data[i].city_name;
                    }else{
                        name = data[i].hub_name;
                    }
                    html += '<option value="'+data[i].id+'">'+name+'</option>';
                }
                $('#'+id).html(html);
            }
        });
    }

    //change event of city to get the tire and zone amount
    $(document).on("change", "#city", function(e) {
        e.preventDefault();
        var city_id = $('#city').val();
        $.ajax({
            type: "POST",
            url: "dm_api/Delivery/get_amount",
            data: {
                city_id: city_id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {console.log("result data:",data.amt);
              
                    $('#shipping_fee').val(data.amt);
                    $('#dest_region').val(data.region);
                
            }
        });

    });

    //change event vendor name to get the other details
    $(document).on("change", "#vendor", function(e) {
        e.preventDefault();
        var vendor_id = $('#vendor').val();
        $.ajax({
            type: "POST",
            url: "dm_api/Delivery/get_details",
            data: {
                vendor_id: vendor_id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log("vendor data:",data);
                $('#vendor_phone').val(data[0].vendor_phone);
                $('#vendor_email').val(data[0].vendor_email);
            }
        });

    });

    //function to save data
    $(document).on("submit", "#delivery_form", function(e) {
        e.preventDefault();
        var user_type = $('#user_type').val();
        var vendor_name = $('#vendor_name').val();
        var vendor_phone = $('#vendor_phone').val();
        var vendor_email = $('#vendor_email').val();
        var vendor_id = $('#vendor').val();
        var rec_name = $('#rec_name').val();
        var rec_phone = $('#rec_phone').val();
        var rec_address = $('#rec_address').val();
        var pack_desc = $('#pack_desc').val();
        var pack_type = $('#pack_type').val();
        var logi_type = $('#logi_type').val();
        var pack_weight = $('#pack_weight').val();
        var dest_region = $('#dest_region').val();
        var city = $('#city').val();
        var hub = $('#hub').val();
        var shipping_fee = $('#shipping_fee').val();
        var collect_amt = $('#collect_amt').val();

        $.ajax({
            type: "POST",
            url: "dm_api/Delivery/save_data",
            data: {
                user_type: user_type,
                vendor_name: vendor_name,
                vendor_phone: vendor_phone,
                vendor_email: vendor_email,
                vendor_id: vendor_id,
                rec_name: rec_name,
                rec_phone: rec_phone,
                rec_address: rec_address,
                pack_desc: pack_desc,
                pack_type: pack_type,
                logi_type: logi_type,
                pack_weight: pack_weight,
                dest_region: dest_region,
                city: city,
                hub: hub,
                shipping_fee: shipping_fee,
                collect_amt: collect_amt,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log("Res:"+data);
                if(data > 0){
                   // alert("Recoed Saved Successfully!");
                    successTost("Record Saved Successfully!");
                    $('#delivery_form').trigger("reset");
                    $('#vendorId').val(data);
                    $('#print_form').trigger('submit');
                }else{
                    //alert("Problem in Save Data!");
                    errorTost("Problem in Save Data!");
                }
            }
        });
    });

    //CSV file import event
    $('#import_csv').on('submit', function(event){
        event.preventDefault();
        $.ajax({
         url:"dm_api/Delivery/import_csv",
         method:"POST",
         data:new FormData(this),
         contentType:false,
         cache:false,
         processData:false,
         beforeSend:function(){
          $('#import_csv_btn').html('Importing...');
         },
         success:function(data)
         {
             console.log("CSV data:",data);
          $('#import_csv')[0].reset();
          $('#import_csv_btn').attr('disabled', false);
          $('#import_csv_btn').html('Import Done');
          successTost("Record Imported Successfully!");
         }
        })
       });
});