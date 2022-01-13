$(document).ready(function(){
    $(document).on("submit", "#hub_form", function(e) {
        e.preventDefault();
        var hub_name = $('#hub_name').val();

        $.ajax({
            type: "POST",
            url: "dm_api/Hub/save_data",
            data: {
                hub_name: hub_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log("Res:"+data);
                if(data == 1){
                    //alert("Recoed Saved Successfully!");
                    successTost("Record Saved Successfully!");
                    $('#hub_form').trigger("reset");
                }else{
                   // alert("Problem in Save Data!");
                    errorTost("Problem in Save Data!");
                }
            }
        });
    });
});