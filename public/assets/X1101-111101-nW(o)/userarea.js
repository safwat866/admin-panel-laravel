    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': csrftoken
             }
        });


    $("select.country").on('change',function(){
        var countryid = $("select#country").select2('val');
        $.ajax({
           url: baseurl+"/findcitiesbycountry",
           type: 'POST',
           dataType: "json",
           data: {
               countryid: countryid
             },
           success: function(data) {
               $('select.city').find('option:not(:first)').remove();
               if(data.length>0) {
               $.each(data, function(){
                   $('<option/>', {
                       'value': this.id,
                       'text': this.name
                   }).appendTo('select#city');
               });
            }else {
                $('select#city').append("<option value='other'>Other</option>");
            }
           }
         });
       
        });

        $("input#imageUpload").change(function(){

            var fileInput = $(this);
            if (fileInput.length && fileInput[0].files && fileInput[0].files.length) {
            var url = window.URL || window.webkitURL;
            var image = new Image();
            image.onload = function() {
          
            var profilepic =  $('#imageUpload').prop('files')[0];  
            var formdata = new FormData();
            formdata.append('file', profilepic);
            $.ajax({
                url: baseurl+"/updateuserpic",
                type: 'POST',
                dataType: "json",
                processData: false,
                contentType: false,
                data: formdata,
                success: function(data) {

                if(data.success == 'success'){
                    //  $("span#res").html("<div class='alert alert-success'><p class='text-success wel'><i class='fa fa-check'></i> Data updated successfully</p></div>");
                } else if(data.error = 'validation.mimes') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please select an image file',
                    });
                    return false;
                }
                }
            });
                };
             image.onerror = function() {
                Swal.fire({
                    title: 'Invalid Image',
                    text: 'Invalid Image File',
                });
                return false;
                };
            image.src = url.createObjectURL(fileInput[0].files[0]);
            }

    
            
        });
       

        $("button#savechanges").on('click',function(){
          
                var first_name = $("input#first_name").val();
                var last_name = $("input#last_name").val();
                var gender = $("select.gender").val();
                var dob = $("input#dob").val();
          
                var phone = $("input#phone").val();
                var nationality = $("select#nationality").select2('val');
                var address = $("input#address").val();
                var address2 = $("input#address2").val();
                var address3 = $("input#address3").val();
                var country = $("select#country").select2('val');
                var city = $("select#city").select2('val');
                var document = $("select#document").val();
                var docno = $("input#docno").val();
                var countrycode = $("select#countrycode").select2('val');

                

                if(first_name == ''){
                    $("span#firstname_error").html("First Name is required");
                    $("span#res").html("<p class='text-danger'>One of required field is empty please check</p>");
                    return false;
                } else {
                    $("span#firstname_error").empty();
                    $("span#res").empty();
                }

                if(last_name == ''){
                    $("span#lastname_error").html("Last Name is required");
                    $("span#res").html("<p class='text-danger'>One of required field is empty please check</p>");
                    return false;
                } else {
                    $("span#firstname_error").empty();
                    $("span#res").empty();
                }

                if(gender == ''){
                    $("span#gender_error").html("Gender is required");
                    $("span#res").html("<p class='text-danger'>One of required field is empty please check</p>");
                    return false;
                } else {
                    $("span#firstname_error").empty();
                    $("span#res").empty();
                }

                if(first_name == ''){
                    $("span#firstname_error").html("First Name is required");
                    $("span#res").html("<p class='text-danger'>One of required field is empty please check</p>");
                    return false;
                } else {
                    $("span#firstname_error").empty();
                    $("span#res").empty();
                }

                if(dob == ''){
                    $("span#dob_error").html("Date of Birth is required");
                    $("span#res").html("<p class='text-danger'>One of required field is empty please check</p>");
                    return false;
                } else {
                    $("span#firstname_error").empty();
                    $("span#res").empty();
                }

                if(countrycode == ''){
                    $("span#countrycode").html("Country code is required");
                    $("span#res").html("<p class='text-danger'>One of required field is empty please check</p>");
                    return false;
                } else {
                    $("span#countrycode").empty();
                    $("span#res").empty();
                }


                if(phone == ''){
                    $("span#phone_error").html("Phone is required");
                    $("span#res").html("<p class='text-danger'>One of required field is empty please check</p>");
                    return false;
                } else {
                    $("span#firstname_error").empty();
                    $("span#res").empty();
                }

                if(nationality == ''){
                    $("span#nationality_error").html("Nationality is required");
                    $("span#res").html("<p class='text-danger'>One of required field is empty please check</p>");
                    return false;
                } else {
                    $("span#firstname_error").empty();
                    $("span#res").empty();
                }

                if(country == ''){
                    $("span#country_error").html("Country is required");
                    $("span#res").html("<p class='text-danger'>One of required field is empty please check</p>");
                    return false;
                } else {
                    $("span#country_error").empty();
                    $("span#res").empty();
                }

                if(city == ''){
                    $("span#city_error").html("City is required");
                    $("span#res").html("<p class='text-danger'>One of required field is empty please check</p>");
                    return false;
                } else {
                    $("span#city_error").empty();
                    $("span#res").empty();
                }

            

            $.ajax({
               url: baseurl+"/updateuserinfo",
               type: 'POST',
               dataType: "json",
               data: {
                   first_name: first_name,
                   last_name:last_name,
                   gender:gender,
                   dob:dob,
                   phone:phone,
                   nationality:nationality,
                   address:address,
                   address2:address2,
                   addres3:address3,
                   country:country,
                   city:city,
                   document:document,
                   docno:docno,
                   countrycode:countrycode,
                 },
               success: function(data) {
                console.log(data);
                if(data.success == 'success'){ 
                    $("span#res-success").html("<div class='alert alert-success'><p class='text-success wel'><i class='fa fa-check'></i> Data updated successfully</p></div>");
                }
               }
             });
           
            });


