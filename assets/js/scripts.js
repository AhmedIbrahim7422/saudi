$(function () {
    // mask

    /**
     * ======================
     * 
     * -------- contact step- 
     * 
     * ======================
     */

    // $(document).on('click','input[type=checkbox]'  ,function() {
    //     $('input[type=checkbox]').removeAttr('checked');
    //     $(this).attr('checked', 'checked');
    // });


    // /**
    //  * ======================
    //  * 
    //  * -------- contact step- 
    //  * 
    //  * ======================
    //  */

    // /**
    //  * Global Variables
    //  */
    var
        // //contact
        firstname = $('#firstname-orderform'),
        lastname = $('#lastname-orderform'),
        company_name = $('#company-orderform'),
        address = $('#address-orderform'),
        tel = $('#tel-orderform'),
        city = $('#city-orderform'),
        state = $('#state-orderform'),
        zipcode = $('#zipcode-orderform'),
        email_address = $('#email-orderform'),
        //shipping
        Shipping = $('.shipping-orderform:checked').val(),
        //shipping
        subDocument = [],
        //payment
        paymentChoice = 1,
        creditNumber = $('#cardNumber'),
        creditName = $('#cardOwner'),
        creditMonth = $('#cardMonth'),
        creditYear = $('#cardYear')
    /**
     * jQuery Mask activation and functions
     */
    options = {
        onComplete: function (cep) {
            $.ajax({
                url: connect2.ajax_url,//wrong url to test Bad request
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    ZipCode_No: zipcode.val().toString(),
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
                        zipcode.parent().append('<div class="lable-error" style="display:block;font-size:10px;position: absolute;color: red;left: 5px;bottom: -2px;">please Enter a valid zipcode</div>');
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
    $(document).on('click', '.shipping-orderform', function () {
        if ($(this).is(':checked')) {
            Shipping = $(this).val();
        }
    });

    /**
     * Auto complete User data from .NET API
     */
    function autoCompleteUserData() {
        $.ajax({
            url: connect2.ajax_url,
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

    $('#tel-orderform').mask('(000) 000-0000', {
        translation: {
            'Z': {
                pattern: /[0-9]/
            },
            placeholder: "(000) 000-0000"
        }
    });
    $('#zipcode-orderform').mask('00000', options);
    $('#cardNumber').mask('0000 0000 0000 0000', {});

    // proceed button
    $(document).on('click', '#procees-order', function () {
        // console.log(connect_object.ajax_url);
        validateContact()
    });

    function validateContact() {
        if (firstname.val() == "") {
            alert('firstname field is required')
        }
        else if (lastname.val() == "") {
            alert('lastname field is required')
        }
        else if (address.val() == "") {
            alert('address field is required')
        }
        else if (tel.val() == "") {
            alert('tel field is required')
        }
        else if (city.val() == "") {
            alert('city field is required')
        }
        else if (state.val() == "") {
            alert('state field is required')
        }
        else if (zipcode.val() == "") {
            alert('zipcode field is required')
        }
        else if (email_address.val() == "") {
            alert('email_address field is required')
        } else if (Shipping == "" || Shipping == null || Shipping == undefined) {
            alert('please choose a shippping method')
        } else {
            $.ajax({
                url: connect2.ajax_url,
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
                    zipcode: zipcode.val(),
                    city: city.val(),
                    state: state.val(),
                    email: email_address.val(),
                    shipping: Shipping,
                    action: "validate_contact_info"
                },
                success: function (response) {
                    console.log(response);
                    // 
                    if (response.error == "") {
                        // window.location.href = response.url;
                    } else {
                        alert(response.message);
                    }

                }
            }).fail(function () {
                alert('Bad request');
            });
        }
    }


    // /**
    //  * ======================
    //  * 
    //  * --------- credit card- 
    //  * 
    //  * ======================
    //  */

    $(document).on('click', '.payment-method-check-box', function () {
        paymentChoice = $(this).val();
    });

    $(document).on('click', '.confirm-purchase', function () {
        if (paymentChoice == "") {
            alert('Please choose payment method.')
        }
        if (paymentChoice == 1) {
            if (creditName.val() == "") {
                alert('Holder Name field is required')
            } else if (creditNumber.cleanVal() == "") {
                alert('Credit Number field is required')
            } else if (creditNumber.cleanVal().length != 16) {
                alert('Credit Number must be 16 digits.')
            } else if (creditMonth.val() == "") {
                alert('Month field is required')
            } else if (creditYear.val() == "") {
                alert('Year field is required')
            } else {
                console.log(creditNumber.cleanVal().length);
                $.ajax({
                    url: connect2.ajax_url,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        paymentChoice: paymentChoice,
                        creditNumber: creditNumber.cleanVal(),
                        creditName: creditName.val(),
                        creditMonth: creditMonth.val(),
                        creditYear: creditYear.val(),
                        action: "payme2nt_proc11ess"
                    },
                    success: function (response) {
                        console.log(response);
                        // 
                        if (response.Aproved == true) {
                            if (response.payment == "1") {
                                // window.location.href = response.url;
                                $('#payinfoDiv').hide();
                                $('#fedex-tickets').append('<iframe id="pdf_to_file" name="pdf_to_file" class="col-md-6" src="' + response.fedex_file_path_from + '" width="800" height="400"></iframe>');
                                $('#fedex-tickets').append('<iframe id="pdf_to_file" name="pdf_to_file" class="col-md-6" src="' + response.fedex_file_path_to + '" width="800" height="400"></iframe>');
                            } else {
                                alert(response.message);
                                window.location.href = '/';
                            }
                        } else {
                            alert(response.EXact_Message);
                        }

                    }
                }).fail(function (result) {
                    console.log(result);
                });
            }
        } else {
            $.ajax({
                url: connect2.ajax_url,
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
                    // 
                    if (response.Aproved == true) {
                        // window.location.href = response.url;
                        $('#payinfoDiv').hide();
                        $('#fedex-tickets').append('<iframe id="pdf_to_file" name="pdf_to_file" class="col-md-6" src="' + response.fedex_file_path_from + '" width="800" height="400"></iframe>');
                        $('#fedex-tickets').append('<iframe id="pdf_to_file" name="pdf_to_file" class="col-md-6" src="' + response.fedex_file_path_to + '" width="800" height="400"></iframe>');
                    } else {
                        alert(response.EXact_Message);
                    }

                }
            }).fail(function (result) {
                console.log(result);
            });
        }
    });


    var caseId = 0,
        dataSelected,
        arabVal,
        haveArab,
        subDocument = [],
        stateId,
        serviceFee = 0,
        timeTotal = 0,
        countVal;

    /**
     * handling cases
     */
    $(document).on('change', '.sub-document ', function () {
        subDocument.push({ "subId": $(this).data('sub'), "subCount": $(this).val() });
        var parent = $(this).parents('.ques');
        if (parent.is(":last-child")) {
            $('.submit-case-document').show();
        } else {
            parent.hide();
            parent.next().show();
        }
    });
    $(document).on('change', '.document-state-select', function () {
        stateId = $(this).val();
        var parent = $(this).parents('.ques');
        if (parent.is(":last-child")) {
            $('.submit-case-document').show();
        } else {
            parent.hide();
            parent.next().show();
        }
    });
    $(document).on('change', '.document-count-select', function () {
        countVal = $(this).val();
        var parent = $(this).parents('.ques');
        if (parent.is(":last-child")) {
            // $('.submit-case-document').show();
        } else {
            parent.hide();
            parent.next().show();
        }
        dataSelected = {
            DocumentCaseId: caseId,
            HaveArabChamber: haveArab,
            IsArabChamber: arabVal,
            Count: countVal,
            ArabChamberCount: (arabVal == "true") ? countVal : 0,
            ProductList: null,
            SubDocumentId: null,
            StateId: stateId,
            StateName: null,
            InvoiceList: null,
            ArroundTimeId: null,
            ArroundTimeName: null,
            SubDocList: subDocument,
            AkinJumpCount: null,
            action: "get_services_ajax"
        };

        $.ajax({
            method: "POST",
            headers: {

            },
            url: connect2.ajax_url,
            data: dataSelected,
            success: function (data) {
                console.log(data);
                subDocument = [];
                $('.submit-case-document').hide();
                $('.submit-case-document').prop('disabled', false);
                data["Services"];
                $.each(data["Services"], function (index, value) {
                    if (value != null) {
                        serviceFee += parseFloat(value.TotalFee);
                        timeTotal += parseInt(value.Time);
                        $('.modal-service-table-body').append(`
                            <tr>
                                <td>${value.Name}</td>
                                
                                <td class="yellCol">
                                    $${value.Fee}
                                </td>
                                <td align="center" class="yellCol">
                                    ${(value.DonotUseCount == true && value.Count > 0 ? '× 1' : "× " + value.Count)} =
                                </td>
                                <td class="yellCol">
                                    $${value.TotalFee}
                                </td>
                                
                                <td class="greenCol"> ${(value.Time == 0 ? " - " : value.Time == 1 ? value.Time + " business day" : value.Time > 1 ? value.Time + " business days" : "")}</td>
                            </tr>
                        `);
                    }
                });
                $('.modal-service-table-body').append(`
                    <tr><td><b>Total </b></td>
                    <td></td>
                    <td></td>


                    
                    <td><b>$${serviceFee}</b></td>
                    

                    <td class=""> ${timeTotal} business days</td></tr>
                `);
                $('.cases-questions').children().hide();
                $('.service-table-in-popup').show();
                $('.submit-agree-on-services').show();

            }
        });
    });
    $(document).on('click', '.arab-champer-input', function () {
        arabVal = $(this).val();
        var parent = $(this).parents('.ques');
        if (parent.is(":last-child")) {
            $('.submit-case-document').show();
        } else {
            parent.hide();
            parent.next().show();
        }
    });

    $('.modal').on('hide.bs.modal', function () {
        console.log('this in hidden');
        $('.ques').hide();
        $('.service-table-in-popup').hide();
        $('.modal-service-table-body').html('');
        $(this).find('.cases-questions').children().first().show();
        $('.submit-agree-on-services').hide();
        $('.submit-case-document').hide();
        serviceFee = 0;
        timeTotal = 0;
    });
    $('.modal').on('show.bs.modal', function () {
        countVal = 1; // this for commercial case
        $('input[type=checkbox]').removeAttr('checked');
        $('input[type=radio]').removeAttr('checked');
        $('select').val('0');
        $('.ques').hide();
        console.log('this in shown');
        $('.service-table-in-popup').hide();
        $('.modal-service-table-body').html('');
        $(this).find('.cases-questions').children().first().show();
        $('.submit-agree-on-services').hide();
        $('.submit-case-document').hide();
        serviceFee = 0;
        timeTotal = 0;
    });


    $(document).on('click', '.order-handle-case', function () {
        caseId = $(this).data('case-id');
        haveArab = $(this).data('case-arab');
        $('.modal-title').html($(this).data('case-name'));
    });

    $(document).on('click', '.submit-case-document', function () {
        $(this).attr('disabled');
        $(this).prop('disabled', 'disabled');
        dataSelected = {
            DocumentCaseId: caseId,
            HaveArabChamber: haveArab,
            IsArabChamber: arabVal,
            Count: countVal,
            ArabChamberCount: (arabVal == "true") ? countVal : 0,
            ProductList: null,
            SubDocumentId: null,
            StateId: stateId,
            StateName: null,
            InvoiceList: null,
            ArroundTimeId: null,
            ArroundTimeName: null,
            SubDocList: subDocument,
            AkinJumpCount: null,
            action: "get_services_ajax"
        };

        $.ajax({
            method: "POST",
            headers: {

            },
            url: connect2.ajax_url,
            data: dataSelected,
            success: function (data) {
                console.log(data);
                subDocument = [];
                $('.submit-case-document').hide();
                $('.submit-case-document').prop('disabled', false);
                data["Services"];
                $.each(data["Services"], function (index, value) {
                    if (value != null) {
                        serviceFee += parseFloat(value.TotalFee);
                        timeTotal += parseInt(value.Time);
                        $('.modal-service-table-body').append(`
                            <tr>
                                <td>${value.Name}</td>
                                
                                <td class="yellCol">
                                    $${value.Fee}
                                </td>
                                <td align="center" class="yellCol">
                                    ${(value.DonotUseCount == true && value.Count > 0 ? '× 1' : "× " + value.Count)} =
                                </td>
                                <td class="yellCol">
                                    $${value.TotalFee}
                                </td>
                                
                                <td class="greenCol"> ${(value.Time == 0 ? " - " : value.Time == 1 ? value.Time + " business day" : value.Time > 1 ? value.Time + " business days" : "")}</td>
                            </tr>
                        `);
                    }
                });
                $('.modal-service-table-body').append(`
                    <tr><td><b>Total </b></td>
                    <td></td>
                    <td></td>


                    
                    <td><b>$${serviceFee}</b></td>
                    

                    <td class=""> ${timeTotal} business days</td></tr>
                `);
                $('.cases-questions').children().hide();
                $('.service-table-in-popup').show();
                $('.submit-agree-on-services').show();

            }
        });
    });

    $(document).on('keypress', function (e) {
        if (e.which == '13') {
            e.preventDefault();
        }
    });

    $(document).on('click', '.button-view-details', function () {
        $(this).addClass('clicked')
        let allHideBtn = document.querySelectorAll(".hide-details")
        if (allHideBtn) {
            allHideBtn.forEach( (item) =>{
                if (!$(item).hasClass("clicked")) {                    
                    console.log($(item))
                    $('.service-table-container').hide()
                    $(item).toggleClass("hide-details");
                    let text = $(item).text();
                    $(item).text(
                        text == "View details" ? "Hide details" : "View details");
                }
            })
        }
        
        $('.doctyp-div').css('background-color', '#f2f2f2')
        $(this).closest('.doctyp-div').find('.service-table-container').slideToggle()

        if ($(this).text() == "Hide details") {
            $('.doctyp-div').css('background-color', '#f2f2f2')
        } else {
            $(this).closest('.doctyp-div').css('background-color', '#fff9d0')
        }
        $(this).toggleClass("hide-details");
        $(this).removeClass('clicked')
        let text = $(this).text();
        $(this).text(
            text == "View details" ? "Hide details" : "View details");

    })
    let prsonal = $(".individual-radio")
    if (prsonal.length > 0) {
        $(document).on('click', prsonal, function(){
            let ischecked = prsonal.is(':checked')
            if (ischecked) {
                $("#company_of22").prop('disabled', true);
                $("#company_of22").val(null)
            } else{
                $("#company_of22").prop('disabled', false);
            }
        })
    }

    $(".search-btn").on('click', ChangeCountry)
    function ChangeCountry() {
        var countrySelected = $("#Countries").val();
        if (countrySelected != "") {
            location.href = "/location/" + countrySelected+"/";
        } else {
            alert("Please Select Country");
        }
    }

})