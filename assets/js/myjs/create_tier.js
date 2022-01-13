$(document).ready(function(){
    //function to save data
    $(document).on("submit", "#tier_form", function(e) {
        e.preventDefault();
        var tier_name = $('#tier_name').val();
        var tier_weight = $('#tier_weight').val();
        var amount = $('#amount').val();

        $.ajax({
            type: "POST",
            url: "dm_api/Tier/save_data",
            data: {
                tier_name: tier_name,
                tier_weight: tier_weight,
                amount: amount,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log("Res:"+data);
                if(data == 1){
                    //alert("Recoed Saved Successfully!");
                    successTost("Record Saved Successfully!");
                    $('#tier_form').trigger("reset");
                }else{
                    //alert("Problem in Save Data!");
                    errorTost("Problem in Save Data!");
                }
            }
        });
    });
});