$(document).ready(function(){
    //function to save data
    $(document).on("submit", "#user_form", function(e) {
        e.preventDefault();
        var full_name = $('#full_name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirm_pass = $('#confirm_pass').val();
        var phone_number = $('#phone_number').val();
        var address = $('#address').val();
        var user_type = $('#user_type').val();
        var country = $('#country_options').val();
        var hubs = $('#hubs').val();
        var tabs = $('#tabs').val();

        if(password != confirm_pass){
            $('#confirm_pass').val('');
            $('#confirm_pass').focus();
            errorTost("Entered Confirm Password Not Matched!");
           
        }else{
        

        $.ajax({
            type: "POST",
            url: "dm_api/User/save_data",
            data: {
                full_name: full_name,
                email: email,
                password: password,
                phone_number: phone_number,
                address: address,
                user_type: user_type,
                country: country,
                hubs: hubs,
                tabs: tabs,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log("Res:"+data);
                if(data == 1){
                   // alert("Recoed Saved Successfully!");
                   $('#user_form').trigger("reset");
                    successTost("Record Saved Successfully!");
                }else if(data == 2){
                    errorTost("Entered email already registered!");

                }else{
                    //alert("Problem in Save Data!");
                    errorTost("Problem in Save Data!");
                }
            }
        });
    }
    });
});