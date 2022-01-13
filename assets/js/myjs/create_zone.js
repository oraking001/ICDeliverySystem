$(document).ready(function(){
    $(document).on("submit", "#zone_form", function(e) {
        e.preventDefault();
        var zone_name = $('#zone_name').val();
        var zone_weight = $('#zone_weight').val();
        var amount = $('#amount').val();

        $.ajax({
            type: "POST",
            url: "dm_api/Zone/save_data",
            data: {
                zone_name: zone_name,
                zone_weight: zone_weight,
                amount: amount,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log("Res:"+data);
                if(data == 1){
                    //alert("Recoed Saved Successfully!");
                    successTost("Record Saved Successfully!");
                    $('#zone_form').trigger("reset");
                }else{
                    //alert("Problem in Save Data!");
                    errorTost("Problem in Save Data!");
                }
            }
        });
    });
});