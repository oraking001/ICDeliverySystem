$(document).ready(function(){
    //function to save data
    $(document).on("submit", "#city_form", function(e) {
        e.preventDefault();
        var city_name = $('#city_name').val();
        var region = $('#region').val();
        var tier = $('#tier').val();
        var zone = $('#zone').val();

        $.ajax({
            type: "POST",
            url: "dm_api/City/save_data",
            data: {
                city_name: city_name,
                region: region,
                tier: tier,
                zone: zone,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log("Res:"+data);
                if(data == 1){
                   // alert("Recoed Saved Successfully!");
                    successTost("Record Saved Successfully!");
                    $('#city_form').trigger("reset");
                }else{
                    //alert("Problem in Save Data!");
                    errorTost("Problem in Save Data!");
                }
            }
        });
    });

    //function to fill dropdown
        fillDropdown('tier','tbl_tier');
        fillDropdown('zone','tbl_zone');
        function fillDropdown(id,table){
            $('#'+id).html('');
            $.ajax({
                type: "POST",
                url: "dm_api/City/get_dropdown",
                data: {
                    table_name: table,
                },
                dataType: "JSON",
                async: false,
                success: function(data) {console.log("Result:", data);
                    var data = eval(data);
                    var html = ''; // '<option value="" selected>select tier</option>';
                    for (var i = 0; i < data.length; i++) {
                        if(table == 'tbl_tier'){
                            name = data[i].Tier_Name;
                        }else{
                            name = data[i].zone_name;
                        }
                        html += '<option value="'+data[i].id+'">'+name+'</option>';
                    }
                    $('#'+id).html(html);
                }
            });
        }
});