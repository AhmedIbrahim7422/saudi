

var OverNight = false;
$(document).on('blur', '#ZipCodefdxfrom', function (event) {
    var ZipCode = $("#ZipCodefdxfrom").val();
    getZipFedex(ZipCode, $("#cityIdFedexFrom"), $("#stateIdFedexFrom"), $("#ZipCodefdxfrom"), $("#InvalidZipFrom"));
});
$(document).on('blur', '#ZipCodefdxTo', function (event) {
    var ZipCode = $("#ZipCodefdxTo").val();
    getZipFedex(ZipCode, $("#cityIdFedexTo"), $("#stateIdFedexTo"), $("#ZipCodefdxTo"), $("#InvalidZipTo"));
});
function getZipFedex(_zipCodeVal, ddlCity, ddlState, ziptxt, zipspn) {
    debugger;
    if (!isNaN(_zipCodeVal) && _zipCodeVal != "" && _zipCodeVal.length == 5) {

        $.ajax({

            url: '/ExpeditedRequest/GetZipCodeLocation',
            async: false,
            cache: true,
            data: { zipCode: _zipCodeVal }


        }).success(function (result) {


            debugger;

            if (result != 0) {
                debugger;
                ddlCity.val(result[0]);
                ddlState.val(result[1]);
                zipspn.css("display", "none");
            }
            else {
                ddlCity.val('');
                ddlState.val('');
                zipspn.css("display", "block");
            }

        })

    }
}

function validatePhonefdx(txtPhone, spn) {
    debugger;
    var phone = txtPhone.val();
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(phone)) {
        spn.css("display", "none");
    }
    else {
        spn.css("display", "inline-block");
        spn.text("Please specify a valid phone");
    }
}
function CheckValidateFedex() {
    debugger;
    var valid = false;
    var Address = $("#AddressFedexFrom").val();
    var ZipCode = "";
    var State = $("#stateIdFedexFrom").val();
    var City = $("#cityIdFedexFrom").val();
    var CompanyName = $("#CompanyFedexFrom").val();
    var PersonName = $("#SenderPersonName").val();
    var PhoneNumber = $("#PhoneFedexFrom").val();
    var Address2 = $("#AddressFedexTo").val();
    var ZipCode2 = "";
    var State2 = $("#stateIdFedexTo").val();
    var City2 = $("#cityIdFedexTo").val();
    var CompanyName2 = $("#CompanyFedexTo").val();
    var PersonName2 = $("#ContactNameFedexTo").val();
    var PhoneNumber2 = $("#PhoneFedexTo").val();

    if ($("#chxfedex1").is(":checked") || $("#chxfedexOver").is(":checked")) {
        ZipCode = $("#ZipCodefdxfrom").val();
        validatePhonefdx($("#PhoneFedexFrom"), $("#InvalidphoneFrom"));
        ZipCode2 = $("#ZipCodefdxTo").val();
        validatePhonefdx($("#PhoneFedexTo"), $("#InvalidphoneTo"));
    }


    if ($("#chxfedex1").is(":checked") == false && $("#chxfedexOver").is(":checked") == false) {
        valid = false;
    }
    else {
        if (($("#chxfedex1").is(":checked") == true || $("#chxfedexOver").is(":checked") == true) && (Address == "" || ZipCode == "" || ZipCode == "99999" || State == "" || City == "" || PersonName == "" || PhoneNumber == "")) {
            $("#hidFedex").val("");
            $("#diverrorfedex").modal();
            $("#spntxt").text("Check Your Data");
            $("#chxfedexOver").prop('checked', false);
            $("#chxfedex1").prop('checked', false);

            valid = false;
        }
        if ((Address2 == "" || ZipCode2 == "" || ZipCode2 == "99999" || State2 == "" || City2 == "" || PersonName2 == "" || PhoneNumber2 == "")) {
            $("#hidFedex").val("");
            $("#diverrorfedex").modal();
            $("#spntxt").text("Check Your Data");
            $("#chxfedexOver").prop('checked', false);
            $("#chxfedex1").prop('checked', false);

            valid = false;
        }
        else {

            if ($("#InvalidphoneFrom").css("display") != "none" || $("#InvalidphoneTo").css("display") != "none") {
                valid = false;
            }
            else {
                $.ajax({

                    url: '/ExpeditedRequest/ValidateFedexAddress?Address=' + Address + '&ZipCode=' + ZipCode + '&State=' + State + '&City=' + City + '&CompanyName=' + CompanyName + '&PersonName=' + PersonName + '&PhoneNumber=' + PhoneNumber + '&Address2=' + Address2 + '&ZipCode2=' + ZipCode2 + '&State2=' + State2 + '&City2=' + City2 + '&CompanyName2=' + CompanyName2 + '&PersonName2=' + PersonName2 + '&PhoneNumber2=' + PhoneNumber2 + '&OverNight=' + OverNight,

                    async: false,
                    cache: true,
                }).success(function (result) {
                    debugger;
                    if (result.indexOf("false") >= 0 && result.indexOf("&") >= 0) {
                        $("#hidFedex").val("");
                        $("#diverrorfedex").modal();
                        $("#spntxt").text(result.split('&')[1]);
                        $("#chxfedexOver").prop('checked', false);
                        $("#chxfedex1").prop('checked', false);
                        valid = false;
                    }
                    else if (result == "False") {
                        $("#diverrorfedex").modal();
                        $("#spntxt").text("Invalid Fedex, can't create fedex");
                        valid = false;
                    }
                    else {
                        valid = true;
                        $.ajax({
                            url: '/ExpeditedRequest/FedexModel',
                            data: {},
                            async: false,
                            cache: true,
                        }).success(function (data) {
                            $("#fedexModel")(data);
                        })
                        $.ajax({
                            url: '/ExpeditedRequest/getShipDate',
                            async: false,
                            cache: true,
                            data: {}
                        }).success(function (result) {
                            $("#divmodelfedex").find("#pshipdate").text("Ship Date : " + result.split('&')[0]);
                            $("#divmodelfedex").find("#pshipdate2").text("Ship Date : " + result.split('&')[0]);
                            $("#divmodelfedex").find("#shipretdate").text(result.split('&')[1]);
                            $("#divmodelfedex").find("#shipretdate1").text(result.split('&')[1]);
                        })
                        $("#divmodelfedex").find("#spnnamesend").text(PersonName);
                        $("#divmodelfedex").find("#spncompsend").text(CompanyName);
                        $("#divmodelfedex").find("#spnaddresssend").text(Address);
                        $("#divmodelfedex").find("#spnphonesend").text(PhoneNumber);
                        $("#divmodelfedex").find("#spnnamereceipt").text(PersonName2);
                        $("#divmodelfedex").find("#spncompreceipt").text(CompanyName2);
                        $("#divmodelfedex").find("#spnaddressreceipt").text(Address2);
                        $("#divmodelfedex").find("#spnphonereceipt").text(PhoneNumber2);
                        $("#divmodelfedex").find("#spnzipcodereceipt").text(ZipCode2);
                        $("#divmodelfedex").find("#spnaddress2send").text(City + " " + State + " " + ZipCode);
                        $("#divmodelfedex").find("#spnaddress2receipt").text(City2 + " " + State2 + " " + ZipCode2);
                        $("#divmodelfedex").find("#spnstatereceipt").text(State2 + " - US");
                        if (OverNight) {
                            $(".fedexPriceInDemo").text("$ 30.00");
                        } else {
                            $(".fedexPriceInDemo").text("$ 11.00");
                        }
                    }


                });

            }

        }
    }
    return valid;
}
function RemoveShipping() {
    if ($("#hidFedex").val() == "1" || $("#hidFedex").val() == "2") {
        var BothShip = false;
        if ($("#hidFedex").val() == "2") {
            BothShip = true;
        }
        removefedxcharge(BothShip, "");

    }
    emptyFedex(0);
    $('#chxfedex1').removeAttr("checked");
    $('#chxfedexOver').removeAttr("checked");

    $("#fdxview").css("display", "none");
    $("#fdxship1").css("display", "none");
}
$(document).on("click", "#chxfedex0", function () {
    debugger;
    OverNight = false;
    var previousValue = $(this).attr('previousValue');
    var name = $(this).attr('name');
    if (previousValue == 'checked') {
        //$("#divfdxshipparent").css("display", "block");
        //$("#fdxship1").css("display", "none");
        $("#shiptypesdiff").css("display", "none");
        $(this).removeAttr('checked');
        $(this).attr('previousValue', false);
        $("#uploadPDFEnvelop").attr("required", true);
        $("#ShippingWithOutFedexShaduleDate").css("display", "none");

    }
    else {
        RemoveShipping();
        $("#shiptypesdiff").css("display", "block");
        //$("#divfdxshipparent").css("display", "none");
        $("input[name=" + name + "]:radio").attr('previousValue', false);
        $(this).attr('previousValue', 'checked');
        $("#uploadPDFEnvelop").attr("required", false);
        $("#ShippingFedexShaduleDate").hide();
        $("#ShippingWithOutFedexShaduleDate").css("display", "block");

    }

})

$(document).on("click", "#chxfedex2", function () {
    if ($(this).is(":checked") == true) {
        RemoveShipping();
    }
});
$(document).on("click", "#chxfedex1", function (event) {
    debugger;
    OverNight = false;
    var previousValue = $(this).attr('previousValue');
    var name = $(this).attr('name');
    if (previousValue == 'checked') {
        RemoveShipping();
        $("#ShippingFedexShaduleDate").hide();
        $("#ShippingWithOutFedexShaduleDate").css("display", "none");
        $("#ShippingFedexShaduleDateOver").hide();
        //$("#ShippingFedexShaduleDate").css("display", "none");
        //$("#ShippingWithOutFedexShaduleDate").css("display", "none");
        //$("#ShippingFedexShaduleDateOver").css("display", "none");
        debugger;
        $("#shiptypesdiffparent").css("display", "block");
        $("#divfdxshipparent").css("display", "block");
        $("#divfdxshipparentOver").css("display", "block");
        $("#shiptypesdiff").css("display", "none");
        $("#fdxship1").css("display", "none");
        $("#fdxshipOver").css("display", "none");
        $(this).removeAttr('checked');
        $(this).attr('previousValue', false);

    }
    else {

        setTimeout(function () {
            $("#spinner").css("display", "block");
            if ($("#ZipCode").val() == "99999") {
                $("#diverrorfedex").modal();
                $("#spntxt").text("can't create Fedex Tracking to Out USA");
                RemoveShipping();
                $("input[name=" + name + "]:radio").attr('previousValue', false);
                $("#chxfedex1").removeAttr('checked');
                $("#chxfedexOver").removeAttr('checked');
            }
            else {

                if (FedexChecked(2, true)) {
                    if (ShowDymo(2)) {
                        $("input[name=" + name + "]:radio").attr('previousValue', false);
                        $("#chxfedex1").attr('previousValue', 'checked');
                    }
                    else {
                        $("input[name=" + name + "]:radio").attr('previousValue', false);
                        $("#chxfedex1").removeAttr('checked');
                    }
                }
                else {
                    debugger;
                    $("input[name=" + name + "]:radio").attr('previousValue', false);
                    $("#chxfedex1").removeAttr('checked');
                }

            }
            setTimeout(function () { $("#spinner").css("display", "none"); }, 3000);
        }, 100);

    }


});
$(document).on("click", "#chxfedexOver", function (event) {
    debugger;
    OverNight = true;
    var previousValue = $(this).attr('previousValue');
    var name = $(this).attr('name');
    if (previousValue == 'checked') {
        RemoveShipping();
        $("#ShippingFedexShaduleDate").hide();
        $("#ShippingWithOutFedexShaduleDate").css("display", "none");
        $("#ShippingFedexShaduleDateOver").hide();
        //     $("#ShippingFedexShaduleDate").css("display", "none");
        //$("#ShippingWithOutFedexShaduleDate").css("display", "none");
        //$("#ShippingFedexShaduleDateOver").css("display", "none");
        debugger;
        $("#shiptypesdiffparent").css("display", "block");
        $("#divfdxshipparent").css("display", "block");
        $("#divfdxshipparentOver").css("display", "block");
        $("#shiptypesdiff").css("display", "none");
        $("#fdxship1").css("display", "none");
        $("#fdxshipOver").css("display", "none");
        $(this).removeAttr('checked');
        $(this).attr('previousValue', false);

    }
    else {

        setTimeout(function () {
            $("#spinner").css("display", "block");
            if ($("#ZipCode").val() == "99999") {
                $("#diverrorfedex").modal();
                $("#spntxt").text("can't create Fedex Tracking to Out USA");
                RemoveShipping();
                $("input[name=" + name + "]:radio").attr('previousValue', false);
                $("#chxfedex1").removeAttr('checked');
                $("#chxfedexOver").removeAttr('checked');
            }
            else {

                if (FedexChecked(2, true)) {
                    if (ShowDymo(2)) {
                        $("input[name=" + name + "]:radio").attr('previousValue', false);
                        $("#chxfedexOver").attr('previousValue', 'checked');
                    }
                    else {
                        $("input[name=" + name + "]:radio").attr('previousValue', false);
                        $("#chxfedexOver").removeAttr('checked');
                    }
                }
                else {
                    debugger;
                    $("input[name=" + name + "]:radio").attr('previousValue', false);
                    $("#chxfedexOver").removeAttr('checked');
                }

            }
            setTimeout(function () { $("#spinner").css("display", "none"); }, 3000);
        }, 100);

    }


});

function ShowEditLabel() {
    var valid = true;
    if ($("#fdxview").css("display") == "none") {

        if ($("#Address").val() == "" || $("#ZipCode").val() == "" || $("#ZipCode").val() == "99999" || $("#FirstName").val() == "" || $("#LastName").val() == "") {
            $("#diverrorfedex").modal();
            $("#spntxt").text("Fill Your Data");
            $(".rdbtn-btn").prop('checked', false);
        }
        else {

            $("#fdxview").css("display", "block");
            var Address = $("#Address").val();
            var ZipCode = $("#ZipCode").val();
            var State = $("#State").val();
            var City = $("#City").val();
            var CompanyName = $("#CompanyName").val();
            var PersonName = "";
            if ($("#LastName").length > 0) {
                PersonName = $("#FirstName").val() + " " + $("#LastName").val();
            }
            else {
                PersonName = $("#FirstName").val();
            }
            var PhoneNumber = $("#Phone").val();
            $("#CompanyFedexFrom").val(CompanyName);
            $("#SenderPersonName").val(PersonName);
            $("#ZipCodefdxfrom").val(ZipCode);
            getZipFedex(ZipCode, $("#cityIdFedexFrom"), $("#stateIdFedexFrom"), $("#ZipCodefdxfrom"), $("#InvalidZipFrom"));
            $("#PhoneFedexFrom").val(PhoneNumber);
            $("#AddressFedexFrom").val(Address);

            $("#CompanyFedexTo").val(CompanyName);
            $("#ContactNameFedexTo").val(PersonName);
            $("#ZipCodefdxTo").val(ZipCode);
            getZipFedex(ZipCode, $("#cityIdFedexTo"), $("#stateIdFedexTo"), $("#ZipCodefdxTo"), $("#InvalidZipTo"));
            $("#PhoneFedexTo").val(PhoneNumber);
            $("#AddressFedexTo").val(Address);
        }
    }

    return valid;
}
function ShowDymo(fedextype) {
    debugger;

    if (CheckValidateFedex() == true) {
        debugger;
        ShowEditLabel();
        $("#divmodelfedex").appendTo("#divmodelfedexbody");
        $("#divmodelfedex").css("display", "block");
        $("#divFedex").addClass("fedmdl-div");
        $("#btnincomefedex").css("display", "block");
        $("#btnreturnfedex").css("display", "block");

        $("#divmodelfedex").find("#divdemofrom").css("display", "inline-block")
        $("#fdxtr1").css("display", "inline-block");
        $("#fdxtr2").css("display", "inline-block");
        $("#fdxfls1").css("display", "none");
        $("#fdxfls2").css("display", "none");
        //$("#divFedex").find("#divdemoto").css("width", "50%");

        $("#divFedex").modal();
        if (OverNight) {
            $("#divfdxshipparent").css("display", "none");

        } else {
            $("#divfdxshipparentOver").css("display", "none");

        }
        return true;
    }
    else {

        if ($("#hidFedex").val() == "1" || $("#hidFedex").val() == "2") {
            var BothShip = false;
            if ($("#hidFedex").val() == "2") {
                BothShip = true;
            }
            removefedxcharge(BothShip, "");

        }
        $("#fdxship1").css("display", "none");

        return false;

    }
}


$(document).on("click", "#btnFedexok", function () {
    debugger;
    HideShipping();
    var BothShip = false;

    if ($("#chxfedex1").is(":checked") == true) {
        $("#hidFedex").val("2");
        BothShip = true;
        OverNight = false;
    }
    if ($("#chxfedexOver").is(":checked") == true) {
        $("#hidFedex").val("2");
        BothShip = true;
        OverNight = true;
    }
    var Count = $("#Count").val();
    $.ajax({
        url: '/ExpeditedRequest/AddFedexShipping',
        data: { Count: Count },
        async: false,
        cache: true,
    }).success(function (result) {
        debugger;
        if ($('#rdCredit').is(":checked") == false) {
            $('#rdCredit').attr("checked", "checked");
            $('#rdCredit').trigger("click");

        }
        $("#crdamount").val(result.split('&')[1]);
        $("#amountPay").text(result.split('&')[1]);
        $(".TotalFeeLabel").text(result.split('&')[1]);
        var handlingFee = Number(result.split('&')[0].replace('$', ''));
        if ((handlingFee * .05) % 1 === 0) {
            $(".Creditfee").text("$ " + handlingFee * .05 + ".00");
        } else {
            $(".Creditfee").text("$ " + handlingFee * .05);
        }
        $('.FedexfeeLabel').show();
        if (OverNight) {
            $("#shippingamount").text("$25.00");
            $(".Fedexfee").text("$50.00");
            $("#ShippingFedexShaduleDateOver").removeAttr('hidden');
            $("#ShippingFedexShaduleDate").attr('hidden');
            $("#ShippingFedexShaduleDateOver").removeAttr('style');


        } else {
            $("#shippingamount").text("$11.00");
            $("#ShippingFedexShaduleDate").removeAttr('hidden');
            $("#ShippingFedexShaduleDateOver").attr('hidden');
            $("#ShippingFedexShaduleDate").removeAttr('style');

            $(".Fedexfee").text("$20.00");
        }
        $('.payt-typ').css("display", "none");
        $("#ShippingWithOutFedexShaduleDate").css("display", "none");
    });
});
function ResetCard() {
    $("#txtcredit").css("display", "none");
    $("#CreditNo").css("display", "block");
    $("#divexp").css("display", "none");
    $("#divname").css("display", "none");
    //$(".prompt").css("display", "none");
    $("#divback").css("display", "none");
    $("#divscr").css("display", "none");
    $("#CreditNo").val("");
    $(".face.front.invalid").css('background-image', "url(/wp-content/themes/saudi-theme/assets/images/credittypes/generic-front.png),url(/wp-content/themes/saudi-theme/assets/images/credittypes/card-front-background.png)");


}
//$(document).on("click", "#PaymentMethodRadio1", function (event) {


//    if ($('#PaymentMethodRadio1').is(':checked')) {


//        if ($("#PaymentMethodRadio1").val() == "1") {
//            //   alert('hiiii');
//            $("#Savebutton").val("Pay & Print Request");


//        }
//        var x = $("#txtZipCode").val();
//        if (x != "" && x != "99999") {
//            $("#divstartfedex").css("display", "block");
//        }
//        $("#Creditdiv").css("display", "block");
//        $("#billingConditions").css("display", "none");
//        $("#wirringConditions").css("display", "none");
//        $("#billingConditions").removeClass("Conditionscss");
//        $("#wirringConditions").removeClass("Conditionscss");
//        $("#checkConditions").css("display", "none");
//        var ownername = $("#txtFirstName").val();
//        var Lastname = $("#txtLatName").val();
//        var FullName = ownername + " " + Lastname;
//        ResetCard();
//        $("#CreditCardOwner").val(FullName);

//    }

//});

function FedexChecked(fedextype, checked) {
    if (checked) {
        if ($("#Address").val() == "" || $("#ZipCode").val() == "" || $("#ZipCode").val() == "99999" || $("#FirstName").val() == "" || $("#LastName").val() == "") {
            $("#diverrorfedex").modal();
            $("#spntxt").text("Fill Your Data");
            $(".rdbtn-btn").prop('checked', false);
            return false;

        }
        else {
            var Address = $("#Address").val();
            var ZipCode = $("#ZipCode").val();
            var State = $("#State").val();
            var City = $("#City").val();
            var CompanyName = $("#CompanyName").val();
            var PersonName = "";
            if ($("#LastName").length > 0) {
                PersonName = $("#FirstName").val() + " " + $("#LastName").val();
            }
            else {
                PersonName = $("#FirstName").val();
            }
            var PhoneNumber = $("#Phone").val();
            $("#CompanyFedexTo").val(CompanyName);
            $("#ContactNameFedexTo").val(PersonName);
            $("#ZipCodefdxTo").val(ZipCode);
            $("#PhoneFedexTo").val(PhoneNumber);
            $("#AddressFedexTo").val(Address);
            $("#cityIdFedexTo").val(City);
            $("#stateIdFedexTo").val(State);
            $("#CompanyFedexFrom").val(CompanyName);
            $("#SenderPersonName").val(PersonName);
            $("#ZipCodefdxfrom").val(ZipCode);
            $("#PhoneFedexFrom").val(PhoneNumber);
            $("#AddressFedexFrom").val(Address);
            $("#cityIdFedexFrom").val(City);
            $("#stateIdFedexFrom").val(State);
            getZipFedex(ZipCode, $("#cityIdFedexFrom"), $("#stateIdFedexFrom"), $("#ZipCodefdxfrom"), $("#InvalidZipFrom"));
            getZipFedex(ZipCode, $("#cityIdFedexTo"), $("#stateIdFedexTo"), $("#ZipCodefdxTo"), $("#InvalidZipTo"));
            return true;

        }
    }
    else {
        RemoveShipping();
        return false;

    }
}

$(document).on("click", "#btnfdxlose", function () {
    HideShipping();
    RemoveShipping();
})
$(document).on("click", "#btnFedexcancel", function () {
    debugger;
    $("#fdxtr1").css("display", "none");
    $("#fdxtr2").css("display", "none");
    $("#fdxfls1").css("display", "none");
    $("#fdxfls2").css("display", "none");
    $('#chxfedex1').removeAttr("checked");
    $('#chxfedex1').attr('previousValue', false);
    $('#chxfedexOver').removeAttr("checked");
    $('#chxfedexOver').attr('previousValue', false);
    HideShipping();
    RemoveShipping();

})
function removefedxcharge(BothShip, res) {
    var Count = $("#Count").val();
    $.ajax({

        url: '/ExpeditedRequest/RemoveFedexShipping',
        data: { Count: Count },
        async: false,
        cache: true,
    }).success(function (result) {
        $("#hidFedex").val(res);
        $("#crdamount").val(result.split('&')[1]);
        $("#amountPay").text(result.split('&')[1]);
        $(".TotalFeeLabel").text(result.split('&')[1]);
        var handlingFee = Number(result.split('&')[0].replace('$', ''));
        if ((handlingFee * .05) % 1 === 0) {
            $(".Creditfee").text("$ " + handlingFee * .05 + ".00");
        } else {
            $(".Creditfee").text("$ " + handlingFee * .05);
        }
        $('.FedexfeeLabel').hide();
        $("#shippingamount").text("$11.00");
        if ($("#ZipCode").val() != "99999") {
            $('.payt-typ').css("display", "block");
        }

    });

}
$(document).on("click", "#btnerrorship", function () {
    $("#diverrorfedex").modal('hide');
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
})
function emptyFedex(index) {
    debugger;
    var ZipCode;
    if (index == 0) {
        ZipCode = $("#ZipCodefdxFrom").val();
        $("#CompanyFedexFrom").val("");
        $("#SenderPersonName").val("");
        $("#ZipCodefdxfrom").val("");
        getZipFedex(ZipCode, $("#cityIdFedexFrom"), $("#stateIdFedexFrom"), $("#ZipCodefdxfrom"), $("#InvalidZipFrom"));
        $("#PhoneFedexFrom").val("");
        $("#AddressFedexFrom").val("");
        ZipCode = $("#ZipCodefdxTo").val();
        $("#CompanyFedexTo").val("");
        $("#ContactNameFedexTo").val("");
        $("#ZipCodefdxTo").val("");
        getZipFedex(ZipCode, $("#cityIdFedexTo"), $("#stateIdFedexTo"), $("#ZipCodefdxTo"), $("#InvalidZipTo"));
        $("#PhoneFedexTo").val("");
        $("#AddressFedexTo").val("");
    }
    else if (index == 1) {
        ZipCode = $("#ZipCodefdxFrom").val();
        $("#CompanyFedexFrom").val("");
        $("#SenderPersonName").val("");
        $("#ZipCodefdxfrom").val("");
        getZipFedex(ZipCode, $("#cityIdFedexFrom"), $("#stateIdFedexFrom"), $("#ZipCodefdxfrom"), $("#InvalidZipFrom"));
        $("#PhoneFedexFrom").val("");
        $("#AddressFedexFrom").val("");


    }
    else if (index == 2) {
        ZipCode = $("#ZipCodefdxTo").val();
        $("#CompanyFedexTo").val("");
        $("#ContactNameFedexTo").val("");
        $("#ZipCodefdxTo").val("");
        getZipFedex(ZipCode, $("#cityIdFedexTo"), $("#stateIdFedexTo"), $("#ZipCodefdxTo"), $("#InvalidZipTo"));
        $("#PhoneFedexTo").val("");
        $("#AddressFedexTo").val("");
    }
}
$(document).on("change", ".fdxtyp-btn", function () {
    if ($("#chxfedex0").is(":checked") == false) {
        $("#chxfedex0").trigger("click");
    }
})
function ShowEdit(fedextype) {

    debugger;
    $.ajax({
        url: '/ExpeditedRequest/FedexDemo',
        data: {},
        async: false,
        cache: true,
    }).success(function (data) {
        debugger;
        HideShipping();
        //   $("#fedexModel")('');
        $("#fedexDemo")(data); //_FedexDemo
        $("#fdexeditdiv").css("display", "block");
        //$("#fdexeditdiv").show();
        // $("#fdexeditdiv").appendTo("#fdxdivbody");
        //alert($("#fdexeditdiv"));
        $("#fdxdivbody").append($("#fdexeditdiv"));

        //$("#fdxdivbody").appendTo($("#fdexeditdiv").innerHTML());
        $("#fdxdata").addClass("fedmdl-div");
        $("#fdxdata").modal();
        if (fedextype == 2) {
            $("#divfedfrom").css("display", "block");
            $("#fdxincmdiv").css("display", "block");
            $("#feddevto").css("display", "none");
            $("#fdxretdiv").css("display", "none");
        }
        else if (fedextype == 1) {
            $("#divfedfrom").css("display", "none");
            $("#fdxincmdiv").css("display", "none");
            $("#feddevto").css("display", "block");
            $("#fdxretdiv").css("display", "block");
        }

    })

}
$(document).on("click", "#btnincomefedex", function () {
    ShowEdit(2);

})
$(document).on("click", "#btnreturnfedex", function () {
    debugger;
    ShowEdit(1);
})

function HideShipping() {
    debugger;
    $("#divmodelfedex").appendTo("#fdxview");
    $("#divmodelfedex").css("display", "none");
    $("#divFedex").removeClass("fedmdl-div");
    $("#divFedex").modal('hide');
    $("#divFedex").css("display", "none");
    $('#CreditNo').prop('required', false);

    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
    $("#fedexModel")('');
    $(".divdemofrom")('');

    $(".divdemofrom")($("#divdemofrom")[0].outerHTML);
    $(".divdemofrom").find("#divdemofrom").css("display", "block");
    $(".divdemoto")('');
    $(".divdemoto")($("#divdemoto")[0].outerHTML);
    $(".divdemoto").find("#divdemoto").css("display", "block");
    $(".divdemofrom").find("#divdemofrom").css("width", "100%");
    $(".divdemoto").find("#divdemoto").css("width", "100%");
    $(".divdemofrom").find("#divdemofrom").css({ "border": "1px solid #dcd5d5", "padding": "5px 4px" });
    $(".divdemoto").find("#divdemoto").css({ "border": "1px solid #dcd5d5", "padding": "5px 4px" });

    var divFedex = $(".divdemoto p");
    //debugger;
    $(".divdemoto .column p,.divdemofrom .column p").addClass("fedxtxt-p");
    $(".divdemoto .column .segboa-p,.divdemofrom .column .segboa-p").addClass("segboatxt-p");
    $(".divdemoto .vertfrm-txt,.divdemofrom .vertfrm-txt").addClass("verfedx-txt");
    $(".divdemoto .numrght,.divdemofrom .numrght").addClass("numfdxrgt-txt");
    $(".divdemoto .numlft,.divdemofrom .numlft").addClass("numfdxlft-txt");
    $(".divdemoto .numdiv,.divdemofrom .numdiv").addClass("numfdx-spn");


    $(".divdemoto p,.divdemofrom p").css({ "font-size": "10px !important", "line-height": "13px !important" });
    $(".divdemoto .segboa-p").css({ "font-size": "25px !important", "margin-top": "0px", "margin-bottom": "7px" });
    $(".divdemoto .numrght").css("font-size", "14px");
    $("#btnincomefedex").css("display", "none");
    $("#btnreturnfedex").css("display", "none");
    $("#fdxship1").css("display", "block");

}
function FinishEdit() {
    debugger;
    $("#fdxdata").removeClass("fedmdl-div");
    $("#fdxdata").modal('hide');
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
    $("#fdexeditdiv").appendTo($("#fdxview"));
    $("#fdexeditdiv").css("display", "none");
    $("#fedexDemo")('');
    debugger;
    $("#divFedex").addClass("fedmdl-div");
    $("#divmodelfedex").appendTo("#divmodelfedexbody");
    $("#divmodelfedexbody").find("#divmodelfedex").css("display", "block");
    $("#btnincomefedex").css("display", "block");
    $("#btnreturnfedex").css("display", "none");
    if ($("#chxfedex1").is(":checked") || $("#chxfedexOver").is(":checked")) {
        $("#divmodelfedex").find("#divdemofrom").css("display", "inline-block");
        $("#divFedex").find("#divdemoto").css("width", "50%");
    }
    else {

        $("#divmodelfedex").find("#divdemofrom").css("display", "none")
        $(".fedmdl-div .modal-dialog").css("width", "50%");
        $("#divFedex").find("#divdemoto").css("width", "100%");
    }


    $("#divFedex").modal();
}
$(document).on("click", "#btnshipcancel", function () {

    $.ajax({
        url: '/ExpeditedRequest/FedexModel',
        data: {},
        async: false,
        cache: true,
    }).success(function (data) {
        //  alert("2")
        $("#fedexModel")(data);

    });

    FinishEdit();

});
$(document).on("click", "#btnshipFedex", function () {
    $("#spinner").css("display", "block");
    if (CheckValidateFedex() == true) {
        FinishEdit();

    }
    setTimeout(function () { $("#spinner").css("display", "none"); }, 3000);

});
