$(function () {

    $( document ).ajaxStart(function() {

        $("#loadingDiv").remove();

        $("body").append("<div id='loadingDiv'><div class='loader'>Loading...</div></div>");

        $("#loadingDiv").show();


      });



      $( document ).ajaxComplete(function() {

        $("#loadingDiv").remove();

      });



    $('.select2d').select2();



    $('#rdCredit').on('click', function () {



        if ($(this).is(':checked')) {

            $(".check-Content").hide();

            $(".rdCredit").show();

        }

    });

    $('#rdBillirdBilling').on('click', function () {



        if ($(this).is(':checked')) {

            $(".check-Content").hide();

            $(".rdBillirdBilling").show();

        }

    });

    $('#rdCheck').on('click', function () {

  

        if ($(this).is(':checked')) {

            $(".check-Content").hide();

            $(".rdCheck").show();

        }

    });



    $('.box-check').click(function(){

        if($(this).is(':checked')){

            $('.edit-btn').show();

        }

     

    })

    $('.box-check2').click(function(){

        if($(this).is(':checked')){

            $('.edit-btn').hide();

        }



    })



    /**

     * ======================

     * 

     * -------- contact step- 

     * 

     * ======================

     */



    /**

     * Global Variables

     */

     var 

     //contact

     firstname = $('#firstname_of22'),

     lastname = $('#lastname_of22'),

     company_name = $('#company_of22'),

     address = $('#address_of22'),

     tel = $('#tel_of22'),

     city = $('#city_of22'),

     state = $('#state_of22'),

     zipcode = $('#zipcode_of22'),
     cityEdit = $('#city_edit'),

     stateEdit = $('#state_of22edit'),

     zipcodeEdit = $('#zipcode_of22edit'),

     email_address = $('#email_address_of22'),


     //shipping

     shipping = null,

     //shipping

     subDocument = [],

     //payment

     paymentChoice = 1,

     outUsa = 0,

     creditNumber = $('#card-number-of22'),

	 cvv = $('#cvv-of22'),

     creditName = $('#owner-of22'),

     creditMonth = $('#month-of22'),

     creditYear = $('#year-of22'),

     /**

      * jQuery Mask activation and functions

      */

     options = {

         onComplete: function (cep) {
console.log(typeof zipcode.val().toString());
             $.ajax({

                 url: orderform.ajax_url,//wrong url to test Bad request

                 method: 'POST',

                 headers: {

                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                 },

                 data: {

                     ZipCode_No: zipcode.val(),

                     action: "autocomplete_zipcode"

                 },

                 statusCode: {

                     200: function () {

                         console.log("Good request status 200 is OK response");

                     },

                     404: function () {

                         alert('Sorry, somthing went wrong Please Reload Page and Try Again::404');

                     },

                     422: function (errors) {

                         // var response = data;

                         alert(errors.responseJSON.message + "\n Missing Data");

                     },

                     500: function () {

                         console.log('Sorry, somthing went wrong Please Reload Page and Try Again::500');

                     }

 

                 },

                 success: function (data) {

                     var response = data.ZipCodeData;

                     if (data.Succeeded === true) {

                         city.val(response.CityName);
                         var states = ["Puerto Rico", "Alaska", "Hawaii"]
                         if (states.indexOf(response.StateName) !== -1) {
                            $('.portorico').hide();
                        } else {
                            $('.portorico:not(.fedex-types-container)').show();
                        }
                         state.val(response.StateName);

                         zipcode.removeAttr('style');

                         $('.lable-error').remove();

                     } else {

                         // $(this).after('<h6>this zipcode is not correct</h6>');

                         city.val('');

                         state.val('');

                         zipcode.val('');

                         zipcode.css("border", "1px solid #FF0000", 'position', 'relative');

                         $('.lable-error').remove();

                         zipcode.parent().append('<div class="lable-error" style="display:block;font-size:10px;position: absolute;color: red;left: 5px;bottom: -0px;">please Enter a valid zipcode</div>');

                     }

 

                     // alert(response2.data.office_name + " " + response2.data.office_address + " " + response2.data.office_zipcode);

                 }

             });

             if (email_address.val() != "") {

                 autoCompleteUserData();

             }

         },

         onKeyPress: function (cep, event, currentField, options) {

 

         },

         onChange: function (cep) {

 

         },

         onInvalid: function (val, e, f, invalid, options) {

             var error = invalid[0];

             console.log("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);

         }

     };
     optionsEdit = {

         onComplete: function (cep) {

             $.ajax({

                 url: orderform.ajax_url,//wrong url to test Bad request

                 method: 'POST',

                 headers: {

                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                 },

                 data: {

                     ZipCode_No: zipcodeEdit.val().toString(),

                     action: "autocomplete_zipcode"

                 },

                 statusCode: {

                     200: function () {

                         console.log("Good request status 200 is OK response");

                     },

                     404: function () {

                         alert('Sorry, somthing went wrong Please Reload Page and Try Again::404');

                     },

                     422: function (errors) {

                         // var response = data;

                         alert(errors.responseJSON.message + "\n Missing Data");

                     },

                     500: function () {

                         console.log('Sorry, somthing went wrong Please Reload Page and Try Again::500');

                     }

 

                 },

                 success: function (data) {

                     var response = data.ZipCodeData;

                     if (data.Succeeded === true) {

                         cityEdit.val(response.CityName);

                         stateEdit.val(response.StateName);

                         zipcodeEdit.removeAttr('style');

                         $('.lable-error').remove();

                     } else {

                         // $(this).after('<h6>this zipcode is not correct</h6>');

                         cityEdit.val('');

                         stateEdit.val('');

                         zipcodeEdit.val('');

                         zipcodeEdit.css("border", "1px solid #FF0000", 'position', 'relative');

                         $('.lable-error').remove();

                         alert('please Enter a valid zipcode');

                     }

 

                     // alert(response2.data.office_name + " " + response2.data.office_address + " " + response2.data.office_zipcode);

                 }

             });

             if (email_address.val() != "") {

                 autoCompleteUserData();

             }

         },

         onKeyPress: function (cep, event, currentField, options) {

 

         },

         onChange: function (cep) {

 

         },

         onInvalid: function (val, e, f, invalid, options) {

             var error = invalid[0];

             console.log("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);

         }

     };

 

     /**

      * add shipping value to variable Shipping

      */

     

     

     /**

      * Auto complete User data from .NET API

      */

     function autoCompleteUserData() {

         $.ajax({

             url: orderform.ajax_url,

             method: 'POST',

             headers: {

                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

             },

             data: {

                 email: email_address.val(),

                 zipCode: zipcode.val(),

                 action: "autocomplete_user_data"

             },

             success: function (response) {

                 console.log(response.ContactInformation);

                 // 

                 if (response.ContactInformation != null || response.IsExist != false) {

                     // This will be unused until the international fedx

                     // var countryAuto = (response.ContactInformation.Country != null) ? response.ContactInformation.Country : "United States";

                     // country_name.val(countryAuto);

                     firstname.val(response.ContactInformation.Firstname);

                     lastname.val(response.ContactInformation.Lastname);

                     company_name.val(response.ContactInformation.Companyname);

                     address.val(response.ContactInformation.Address);

                     email_address.val(response.ContactInformation.Email);

                     tel.val(response.ContactInformation.Phone);

                     zipcode.val(response.ContactInformation.ZipCode);

                 }

                 isExist = response.IsExist;

             }

         }).fail(function () {

             alert('Bad request');

         });

     }

 

     tel.mask('(000) 000-0000', {

         translation: {

             'Z': {

                 pattern: /[0-9]/

             },

             placeholder: "(000) 000-0000"

         }

     });

     zipcode.mask('00000', options);
     zipcodeEdit.mask('00000', optionsEdit);

     creditNumber.mask('0000 0000 0000 0000', {});

     cvv.mask('00000', {});



     

     // proceed button

     $(document).on('click', '.nxtbtnof22', function() {

         // console.log(connect_object.ajax_url);

         if ($(this).data('currentstep') == 1) {

             validateContact();

         } else if ($(this).data('currentstep') == 2) {

            validateShipping();

         }

     });

     



     $(document).on('click', '.backbtnof22', function() {

        var sessionStep,

            parent = $(this).parents('.order-form-22'),

            target = $('.' + $(this).data('back'));

        if (parent.prev().length > 0) {
            
            if ($(this).data('back') == 'the-order-form-fields') {
    
               sessionStep = 1;
    
            } else if ($(this).data('back') == 'the-shipping-option-inputs') {
    
               sessionStep = 2;
    
            }
    
            $.ajax({
    
               url: orderform.ajax_url,
    
               method: 'POST',
    
               headers: {
    
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    
               },
    
               data: {
    
                   sessionStep: sessionStep,
    
                   action: "update_current_step"
    
               },
    
               success: function (response) {
    
                console.log(response);
                   parent.hide();
    
                   target.show();
    
               }
    
           }).fail(function () {
    
               alert('Bad request');
    
           });
        } else {
            window.location.href = "/";
        }


     });

 

     function validateContact() {

        $('.fedex-type-to-get-value').prop('checked', false);
        $('.fedex-types-container').hide();
        $('.content-Info').find('.alert').remove()
        var isContactFormValid = true

         if (firstname.val() == "") {

            isContactFormValid = false;
            $('.content-Info').find('input, select').css('border', '1px solid #ced4da') 
            firstname.css('border', '1px solid red')
            firstname.css('margin-bottom', '0px')
             
             firstname.parent().append(`<div class="alert alert-danger" role="alert">first name field is required</div>`)

         }

         if (lastname.val() == "") {

            isContactFormValid = false;
            $('.content-Info').find('input, select').css('border', '1px solid #ced4da') 
            lastname.css('border', '1px solid red')
            lastname.css('margin-bottom', '0px')
             
             lastname.parent().append(`<div class="alert alert-danger" role="alert">last name field is required</div>`)

         }

         if (address.val() == "") {

            isContactFormValid = false;
            $('.content-Info').find('input, select').css('border', '1px solid #ced4da') 
            address.css('border', '1px solid red')
            address.css('margin-bottom', '0px')
             
             address.parent().append(`<div class="alert alert-danger" role="alert">address field is required</div>`)

         }

         if (tel.val() == "") {

            isContactFormValid = false;
            $('.content-Info').find('input, select').css('border', '1px solid #ced4da') 
            tel.css('border', '1px solid red')
            tel.css('margin-bottom', '0px')
             
             tel.parent().append(`<div class="alert alert-danger" role="alert">tel field is required</div>`)

         }

         if (city.val() == "") {

            isContactFormValid = false;
            $('.content-Info').find('input, select').css('border', '1px solid #ced4da') 
            city.css('border', '1px solid red')
            city.css('margin-bottom', '0px')
             
             city.parent().append(`<div class="alert alert-danger" role="alert">city field is required</div>`)

         }

         if (state.val() == "" && outUsa == 0) {

            isContactFormValid = false;
            $('.content-Info').find('input, select').css('border', '1px solid #ced4da') 
            state.css('border', '1px solid red')
            state.css('margin-bottom', '0px')
             
             state.parent().append(`<div class="alert alert-danger" role="alert">state field is required</div>`)

         }

         if (zipcode.val() == "" && outUsa == 0) {

            isContactFormValid = false;
            $('.content-Info').find('input, select').css('border', '1px solid #ced4da') 
            zipcode.css('border', '1px solid red')
            zipcode.css('margin-bottom', '0px')
             
             zipcode.parent().append(`<div class="alert alert-danger" role="alert">zipcode field is required</div>`)

         }
         
         if (outUsa == 1 && $('#country_of22').find('option:selected').val() == "") {

            isContactFormValid = false;
            $('.content-Info').find('input, select').css('border', '1px solid #ced4da') 
            $('#country_of22').css('border', '1px solid red')
            $('#country_of22').css('margin-bottom', '0px')
             
             $('#country_of22').parent().append(`<div class="alert alert-danger" role="alert">country field is required</div>`)
             
         }

         if (email_address.val() == "") {

            isContactFormValid = false;
            $('.content-Info').find('input, select').css('border', '1px solid #ced4da') 
            email_address.css('border', '1px solid red')
            email_address.css('margin-bottom', '0px')
             
             email_address.parent().append(`<div class="alert alert-danger" role="alert">email field is required</div>`)

         } 
         if (isContactFormValid) {
            
            $('.content-Info').find('input, select').css('border', '1px solid #ced4da')
            $('.content-Info').find('.form-control').css('margin-bottom', '18px')
             $('.firstname-edit').val(firstname.val() + " " + lastname.val());
             $('.companyName-edit').val(company_name.val());
             $('.address-edit').val(address.val());
             $('.city-edit').val(city.val());
             $('.state-edit').val(state.val());
             $('.zipcode-edit').val(zipcode.val());
             $('.phone-edit').val(tel.val());
             $.ajax({

                 url: orderform.ajax_url,

                 method: 'POST',

                 headers: {

                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                 },

                 

                 data: {

                     firstname: firstname.val(),

                     lastname: lastname.val(),

                     company_name: company_name.val(),

                     address: address.val(),

                     tel: tel.val(),

                     zipcode: (zipcode.val() == "") ? "99999" : zipcode.val(),

                     city: city.val(),

                     state: state.val(),

                     email: email_address.val(),
                     reference: $('#reference').val(),

                     outUsa: outUsa,
                     address2: $('#address2_of22').val(),
                     country: $('#country_of22').find('option:selected').val(),
                     countryCode: $('#country_of22').find('option:selected').data('code'),

                     action: "validate_contact_info"

                 },

                 success: function (response) {

                     

                     if (response.currentStep == 2) {

                        //from address

                        $('.senderfromfirstname').html(firstname.val());

                        $('.senderfromlastname').html(lastname.val());

                        $('.spncompsend').html(company_name.val());

                        $('.senderfromstreetaddress').html(address.val());

                        $('.senderfromphone').html(tel.val());

                        $('.senderfromzipcode').html(zipcode.val());

                        $('.senderfromcity').html(city.val());

                        $('.senderfromstate').html(state.val());

                        $('.senderfromemailaddress').html(email_address.val());



                        // to address

                        $('.sendertofirstname').html(firstname.val());

                        $('.sendertolastname').html(lastname.val());

                        $('.sendertostreetaddress').html(address.val());

                        $('.sendertophone').html(tel.val());

                        $('.sendertozipcode').html(zipcode.val());

                        $('.sendertocity').html(city.val());

                        $('.sendertostate').html(state.val());

                        $('.sendertoemailaddress').html(email_address.val());



                         $('.the-order-form-fields').hide();

                         $('.the-shipping-option-inputs').show();

                         $('.single_envelope').html(response.rate_from[0]);

                         $('.double_envelopes').html(response.rate_from[0] * 2);

                         $('.single_envelope_next').html(response.rate_from[1]);

                         $('.double_envelopes').html(response.rate_from[1] * 2);

                     } else {

                         alert(response.data);

                     }

                     

                 }

             }).fail(function () {

                 alert('Bad request');

             });

         }

     }

     function validateShipping() {

        var shippingChecker = $('.fedex-type-to-get-value:checked')
        var shippingArray = [];
        var internationalFlage = false;

         console.log(shipping, "shipping");

         if (shippingChecker.length == 0) {

             alert('Please Choose Shipping Method.')

         } else {

            shippingChecker.each(function() {
                if (shipping == 'international' && !$(this).hasClass('international-outusa')) {
                    internationalFlage = true;
                }
                shippingArray.push($(this).val())
            })
            if (internationalFlage) {
                if ($('[name="nameinternational"]').val() == "") {
                    alert('name field is required');
                } else if ($('[name="companyNameinternational"]').val() == "") {
                    alert('company name field is required');
                } else if ($('[name="addressinternational"]').val() == "") {
                    alert('address field is required');
                } else if ($('[name="cityinternational"]').val() == "") {
                    alert('city field is required');
                } else if ($('[name="countryinternational"]').val() == "") {
                    alert('country field is required');
                } else if ($('[name="zipcodeinternational"]').val() == "") {
                    alert('zipcode field is required');
                } else if ($('[name="phoneinternational"]').val() == "") {
                    alert('phone field is required');
                } else {
                    $.ajax({

                        url: orderform.ajax_url,
        
                        method: 'POST',
        
                        headers: {
        
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        
                        },
        
                        data: {
        
                        shipping: shippingArray,
                        nameinternational: $('[name="nameinternational"]').val(),
                        companyNameinternational: $('[name="companyNameinternational"]').val(),
                        addressinternational: $('[name="addressinternational"]').val(),
                        addressinternational2: $('[name="addressinternational2"]').val(),
                        cityinternational: $('[name="cityinternational"]').val(),
                        internationalAddress51: $('[name="internationalAddress51"]').val(),
                        countryinternational: $('[name="countryinternational"]').val(),
                        countryCode: $('[name="countryCode"]').val(),
                        zipcodeinternational: ($('[name="zipcodeinternational"]').val() == "") ? "99999" : $('[name="zipcodeinternational"]').val(),
                        phoneinternational: $('[name="phoneinternational"]').val(),
        
                        action: "validate_shipping"
        
                        },
        
                        success: function (response) {
        
                            
        
                            if (response.currentStep == 3) {
        
                                if (response.feeFedex == 0) {
        
                                    $('.feeFedex-hide').show();
        
                                    $('.feeFedex-show').hide();
        
                                    $('.feeService-at-credit-of22').html(response.feeService.toFixed(2))
        
                                    $('.feeFedex-at-credit-of22').html(response.feeFedex.toFixed(2))
        
                                    $('.feeHandeling-at-credit-of22').html(response.feeHandeling.toFixed(2))
        
                                    $('.totalFee-at-credit-of22').html(response.feeService.toFixed(2) + response.feeFedex.toFixed(2) + response.feeHandeling.toFixed(2))
        
                                    $('.the-shipping-option-inputs').hide();
        
                                    $('.the-payment-form-fields').show();
        
                                } else {
        
                                    $('#spnbilling').hide();
        
                                    $('#spnCheck').hide();
        
                                    $('.feeFedex-hide').hide();
        
                                    $('.feeFedex-show').show();
        
                                    $('.feeService-at-credit-of22').html(response.feeService.toFixed(2))
        
                                    $('.feeFedex-at-credit-of22').html(response.feeFedex.toFixed(2))
        
                                    $('.feeHandeling-at-credit-of22').html(response.feeHandeling.toFixed(2))
        
                                    $('.totalFee-at-credit-of22').html(response.feeService.toFixed(2) + response.feeFedex.toFixed(2) + response.feeHandeling.toFixed(2))
        
                                    $('.the-shipping-option-inputs').hide();
        
                                    $('.the-payment-form-fields').show();
        
                                }
        
                                
        
                            } else {
        
                                alert(response.message);
        
                            }
        
                            
        
                        }
        
                     }).fail(function () {
        
                         alert('Bad request');
        
                     });
                }
            } else {
                $.ajax({

                    url: orderform.ajax_url,
    
                    method: 'POST',
    
                    headers: {
    
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    
                    },
    
                    data: {
    
                    shipping: shippingArray,
                    nameinternational: $('[name="nameinternational"]').val(),
                    companyNameinternational: $('[name="companyNameinternational"]').val(),
                    addressinternational: $('[name="addressinternational"]').val(),
                    addressinternational2: $('[name="addressinternational2"]').val(),
                    cityinternational: $('[name="cityinternational"]').val(),
                    internationalAddress51: $('[name="internationalAddress51"]').val(),
                    countryinternational: $('[name="countryinternational"]').val(),
                    countryCode: $('[name="countryCode"]').val(),
                    zipcodeinternational: ($('[name="zipcodeinternational"]').val() == "") ? "99999" : $('[name="zipcodeinternational"]').val(),
                    phoneinternational: $('[name="phoneinternational"]').val(),
    
                    action: "validate_shipping"
    
                    },
    
                    success: function (response) {
    
                        
    
                        if (response.currentStep == 3) {
    
                            if (response.feeFedex == 0) {
    
                                $('.feeFedex-hide').show();
    
                                $('.feeFedex-show').hide();
    
                                $('.feeService-at-credit-of22').html(response.feeService.toFixed(2))
    
                                $('.feeFedex-at-credit-of22').html(response.feeFedex.toFixed(2))
    
                                $('.feeHandeling-at-credit-of22').html(response.feeHandeling.toFixed(2))
    
                                $('.totalFee-at-credit-of22').html(response.feeService.toFixed(2) + response.feeFedex.toFixed(2) + response.feeHandeling.toFixed(2))
    
                                $('.the-shipping-option-inputs').hide();
    
                                $('.the-payment-form-fields').show();
    
                            } else {
    
                                $('#spnbilling').hide();
    
                                $('#spnCheck').hide();
    
                                $('.feeFedex-hide').hide();
    
                                $('.feeFedex-show').show();
    
                                $('.feeService-at-credit-of22').html(response.feeService.toFixed(2))
    
                                $('.feeFedex-at-credit-of22').html(response.feeFedex.toFixed(2))
    
                                $('.feeHandeling-at-credit-of22').html(response.feeHandeling.toFixed(2))
    
                                $('.totalFee-at-credit-of22').html(response.feeService.toFixed(2) + response.feeFedex.toFixed(2) + response.feeHandeling.toFixed(2))
    
                                $('.the-shipping-option-inputs').hide();
    
                                $('.the-payment-form-fields').show();
    
                            }
    
                            
    
                        } else {
    
                            alert(response.message);
    
                        }
    
                        
    
                    }
    
                 }).fail(function () {
    
                     alert('Bad request');
    
                 });
            }
            console.log(shippingArray);
             

         }

     }

 

     $(document).on('click', '.shipping-option-of22', function () {



        if ($(this).is(':checked')) {

            shipping = $(this).val();

            console.log(shipping, 'shipping');

            if (shipping == "own") {
                setTimeout(() => {
                    $('.the-shipping-option-inputs').find('.nxtbtnof22').click();
                    
                }, 200);
            }

        }

    });



     

     /**

      * ======================

      * 

      * --------- credit card- 

      * 

      * ======================

      */

 

     $(document).on('click', '.payment-method-input_of22', function () {

         paymentChoice = $(this).val();

     });

     $(document).on('click', '#rdCredit', function () {

         $('.handling-of22').show();

     });

     $(document).on('click', '#rdBillirdBilling', function () {

         $('.handling-of22').hide();

     });

     $(document).on('click', '#rdCheck', function () {

         $('.handling-of22').hide();

     });

     

     $(document).on('click', '.confirm-purchase-of22', function () {

         console.log(creditNumber.cleanVal(), creditMonth.val(), creditYear.val(), 'value credit')

         if (paymentChoice == "" || paymentChoice == undefined || paymentChoice == null) {

                 alert('Please choose payment method.')

         } else {

             if (paymentChoice == 1) {
                var isPaymentFormValid = true

                $('.the-payment-form-fields').find('.alert').remove()
                $('.the-payment-form-fields').find('input, select').css('border', '1px solid #ced4da') 
                $('.the-payment-form-fields').find('input, select').css('margin-bottom', '18px')
            
            
    
                 if (creditName.val() == "") {
    
                    isPaymentFormValid = false;
                    creditName.css('border', '1px solid red')
                    creditName.css('margin-bottom', '0px')
                    
                    creditName.parent().append(`<div class="alert alert-danger" role="alert">Holder Name field is required.</div>`)

    
                 }
                 if (creditNumber.cleanVal() == "") {
    
                     isPaymentFormValid = false;
                    creditNumber.css('border', '1px solid red')
                    creditNumber.css('margin-bottom', '0px')
                    
                    creditNumber.parent().append(`<div class="alert alert-danger" role="alert">Credit Number field is required.</div>`)
    
                } else if (creditNumber.cleanVal().length != 16) {
    
                     isPaymentFormValid = false;
                    creditNumber.css('border', '1px solid red')
                    creditNumber.css('margin-bottom', '0px')
                    
                    creditNumber.parent().append(`<div class="alert alert-danger" role="alert">Credit Number must be 16 digits.</div>`)
    
                 }
                 if (cvv.val() == "") {
    
                     isPaymentFormValid = false;
                    cvv.css('border', '1px solid red')
                    cvv.css('margin-bottom', '0px')
                    
                    cvv.parent().append(`<div class="alert alert-danger" role="alert">Cvv field is required.</div>`)
    
                 } 
                 if (creditMonth.val() == "") {
    
                     isPaymentFormValid = false;
                    creditMonth.css('border', '1px solid red')
                    creditMonth.css('margin-bottom', '0px')
                    
                    creditMonth.parent().append(`<div class="alert alert-danger" role="alert">Month field is required.</div>`)
    
                 } 
                 if (creditYear.val() == "") {
    
                     isPaymentFormValid = false;
                    creditYear.css('border', '1px solid red')
                    creditYear.css('margin-bottom', '0px')
                    
                    creditYear.parent().append(`<div class="alert alert-danger" role="alert">Year field is required.</div>`)
    
                 } 
                 if (isPaymentFormValid) {
                    $('.the-payment-form-fields').find('input, select').css('border', '1px solid #ced4da')
                    $('.the-payment-form-fields').find('input, select').css('margin-bottom', '18px')
    
                    $(this).hide();
                    $('.loader-on-finish.order').show()
                     $.ajax({
    
                         url: orderform.ajax_url,
    
                         method: 'POST',
    
                         headers: {
    
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    
                         },
    
                         data: {
    
                             paymentChoice: paymentChoice,
    
                             creditNumber: creditNumber.cleanVal(),
    
                             cvv: cvv.val(),
    
                             creditName: creditName.val(),
    
                             creditMonth: creditMonth.val(),
    
                             creditYear: creditYear.val(),
    
                             action: "payme2nt_proc11ess"
    
                         },
    
                         success: function (response) {
    
                             console.log(response);
                             $('.confirm-purchase-of22').show();
                             // 
    
                             if (response.isdouble == true) {
    
                                if (confirm(response.EXact_Message)) {
    
                                    $.ajax({
    
                                        url: orderform.ajax_url,
    
                                        method: 'POST',
    
                                        headers: {
    
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    
                                        },
    
                                        data: {
    
                                            paymentChoice: paymentChoice,
    
                                            creditNumber: creditNumber.cleanVal(),
    
                                            cvv: cvv.val(),
    
                                            creditName: creditName.val(),
    
                                            creditMonth: creditMonth.val(),
    
                                            creditYear: creditYear.val(),
    
                                            doubleOrderTrue: true,
    
                                            action: "payme2nt_proc11ess"
    
                                        },
    
                                        success: function (response) {
    
                                            console.log(response);
                                            $('.loader-on-finish.order').hide()
                                            // 
    
                                            if (response.isdouble == true) {
    
                                               if (confirm(response.EXact_Message)) {
    
                                                   console.log('yes');
    
                                               } else {
    
                                                   console.log('no');
    
                                               }
    
                                            } else {
    
                                               if (response.Aproved == true) {
    
                                                   if (response.payment == "1") {
    
                                                       // window.location.href = response.url;
    
                                                       $('.the-payment-form-fields').hide();
    
                                                       $('#fedex-tickets').append('<iframe id="pdf_to_file" name="pdf_to_file" class="col-md-6" src="'+response.fedex_file_path_from+'" width="800" height="400"></iframe>');
    
                                                       $('#fedex-tickets').append('<iframe id="pdf_to_file" name="pdf_to_file" class="col-md-6" src="'+response.fedex_file_path_to+'" width="800" height="400"></iframe>');
    
    
    
                                                       window.location.reload(); 
    
                                                   } else {

    
                                                       window.location.reload(); 
    
                                                   }
    
                                               } else {
    
                                                   alert(response.EXact_Message);
    
                                                   window.location.reload(); 
    
                                               }
    
                                           }
    
                                        }
    
                                    }).fail(function (result) {
                                        $('.loader-on-finish.order').hide()
                                       alert("Process Failed.");
    
                                        console.log(result);
    
                                    });
    
                                } else {
    
                                    console.log('no');
    
                                }
    
                             } else {
    
                                if (response.Aproved == true) {
    
                                    if (response.payment == "1") {
    
                                        // window.location.href = response.url;
    
                                        $('.the-payment-form-fields').hide();
    
                                        $('#fedex-tickets').append('<iframe id="pdf_to_file" name="pdf_to_file" class="col-md-6" src="'+response.fedex_file_path_from+'" width="800" height="400"></iframe>');
    
                                        $('#fedex-tickets').append('<iframe id="pdf_to_file" name="pdf_to_file" class="col-md-6" src="'+response.fedex_file_path_to+'" width="800" height="400"></iframe>');
    
    
    
                                        window.location.reload(); 
    
                                    } else {
    
                                        
    
                                        window.location.reload(); 
    
                                    }
    
                                } else {
    
                                    alert(response.EXact_Message);
    
                                    window.location.reload(); 
    
                                }
    
                            }
    
                         }
    
                     }).fail(function (result) {
                        $('.loader-on-finish.order').hide()
                        alert("Process Failed.");
    
                         console.log(result);
    
                     });
    
                 }
    
             } else {
                $('.loader-on-finish.order').show()
                 $.ajax({
    
                     url: orderform.ajax_url,
    
                     method: 'POST',
    
                     headers: {
    
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    
                     },
    
                     data: {
    
                         paymentChoice: paymentChoice,
    
                         action: "payme2nt_proc11ess"
    
                     },
    
                     success: function (response) {
    
                         console.log(response);
    
                         if (response.isdouble == true) {
    
                            if (confirm(response.EXact_Message)) {
    
                                console.log('yes');
    
                            } else {
    
                                console.log('no');
    
                            }
    
                         } else {
    
    
    
                             if (response.Aproved == true) {
    
                                window.location.reload();
    
                                //  $('.the-payment-form-fields').hide();
    
                                //  $('#fedex-tickets').append('<iframe id="pdf_to_file" name="pdf_to_file" class="col-md-6" src="'+response.fedex_file_path_from+'" width="800" height="400"></iframe>');
    
                                //  $('#fedex-tickets').append('<iframe id="pdf_to_file" name="pdf_to_file" class="col-md-6" src="'+response.fedex_file_path_to+'" width="800" height="400"></iframe>');
    
                             } else {
    
                                    alert(response.EXact_Message);
    
                                    window.location.reload();                              
    
                             }
    
                         }
    
                         // 
    
                         
    
                     }
    
                 }).fail(function (result) {
    
                     console.log(result);
    
                 });
    
             }
         }


     });

     $(document).on('click', '#myown_shipping', function() {
         $('.fedex-types-container').find('input').prop('checked', false);
        //  $('.fedex-types-container').find('input').val(null);
         $('.internationall-address-container').hide();
         $('.fedex-types-container').hide();
         $('.fedex-shipping-from').hide();
         $('.fedex-shipping-to').hide();
     })
     $(document).on('click', '#use-owr-shipping', function() {
        shipping = null;
        $('#myown_shipping').prop('checked', false)
        $('.fedex-types-container').show();
     })
     $(document).on('click', '#shippingFromUserChoice', function() {
        if($(this).is(':checked')) {
            $('.fedex-shipping-from').show();
        } else {
            $('.fedex-shipping-from').hide();
            $('.fedex-shipping-from').find('input').prop('checked', false);
        }
     })
     $(document).on('click', '#shippingToUserChoice', function() {
        if($(this).is(':checked')) {
            $('.fedex-shipping-to').show();
        } else {
            $('.fedex-shipping-to').hide();
            $('.fedex-shipping-to').find('input').prop('checked', false);
        }
     })
     $(document).on('click', '.international-choice', function() {
        $('.internationall-address-container').show();
     })
     $(document).on('click', '.fedex-to-choice', function() {
        if ($(this).is(':checked')) {
            $('.internationall-address-container').hide();
            var getFedexTo = $(this).val();
            console.log(getFedexTo);
            if (getFedexTo == '2dayto') {
                $('.receive-date-1-day').hide()
                $('.receive-date-2-day').show()
            } else {
                $('.receive-date-2-day').hide()
                $('.receive-date-1-day').show()
            }
            $('.popup-fedex').show();
        }
     })

     $(document).on('click', '.edit-address', function () {
        $('.popup-fedex').find('input').prop('readonly', false);
        $('.btns-1').hide();
        $('.btns-2').show();
     })
     $(document).on('click', '.cancel', function () {
        $('.popup-fedex').find('input').prop('readonly', true);
        $('.btns-1').show();
        $('.btns-2').hide();
     })
     $(document).on('click', '.confirm-edit', function () {
        var firstname = $('.firstname-edit').val();
        var companyName = $('.companyName-edit').val();
        var address = $('.address-edit').val();
        var city = $('.city-edi').val();
        var state = $('.state-edit').val();
        var zipcode = $('.zipcode-edit').val();
        var phone = $('.phone-edit').val();

        if (firstname === '') {
            alert('Please fille firstname field.')
        } else if (companyName === '') {
            alert('Please fille company name field.')
        } else if (address === '') {
            alert('Please fille address field.')
        } else if (city === '') {
            alert('Please fille city field.')
        } else if (state === '') {
            alert('Please fille state field.')
        } else if (zipcode === '') {
            alert('Please fille zipcode field.')
        } else if (phone === '') {
            alert('Please fill phone field');
        } else {
            $.ajax({
                url: orderform.ajax_url,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    firstname: $('.firstname-edit').val(),
                    companyName: $('.companyName-edit').val(),
                    address: $('.address-edit').val(),
                    city: $('.city-edi').val(),
                    state: $('.state-edit').val(),
                    zipcode: $('.zipcode-edit').val(),
                    phone: $('.phone-edit').val(),
                    action: "add_return_shipping"
                },
                success: function (response) {
                    $('.popup-fedex').find('input').prop('readonly', true);
                    $('.btns-1').show();
                    $('.btns-2').hide();
                }
            }).fail(function (result) {
                console.log(result);
            });
        }
     })
     $(document).on('click', '.close-popup', function () {
        $('.popup-fedex').hide();
     })
     $(document).on('click', '.confirm-ticket', function () {
        $('.popup-fedex').hide();
     })
    $(document).on('click', '#outUsaCheckBox', function () {
        if ($(this).is(':checked')) {
            outUsa = 1;
            $('.outUSA').show()
            $('.inUSA').hide()
            $('.additional-innusa').hide()
            $('#city_of22').prop('readonly', false)
            $('#city_of22').removeAttr('disabled')
            zipcode.mask('0000000000');
        } else {
            outUsa = 0;
            $('.inUSA').show()
            $('.outUSA').hide()
            $('#city_of22').prop('readonly', true)
            $('#city_of22').attr('disabled')
            zipcode.mask('00000', options);
        }
    })

});