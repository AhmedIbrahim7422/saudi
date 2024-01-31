PhoneFormat();
function PhoneFormat() {
    var phones = [{ "mask": "(###) ###-####" }];
    $('#Phone').inputmask({
        mask: phones,
        greedy: false,
        definitions: { '#': { validator: "[0-9]", cardinality: 1 } }
    });
    $('#Fax').inputmask({
        mask: phones,
        greedy: false,
        definitions: { '#': { validator: "[0-9]", cardinality: 1 } }
    });
    $('#Fromphone').inputmask({
        mask: phones,
        greedy: false,
        definitions: { '#': { validator: "[0-9]", cardinality: 1 } }
    });
    $('#Tophone').inputmask({
        mask: phones,
        greedy: false,
        definitions: { '#': { validator: "[0-9]", cardinality: 1 } }
    });
}
$(document).on('change', '.uploadPDF', function () {
    //debugger;
    //alert(this.id);
    var id = this.id;
    var arrayoFID = id.split('-');
    var index = arrayoFID[1];
    // alert(index);
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    var rv = -1;

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
    {
        if (isNaN(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))))) {
            //For IE 11 >
            pdffile = document.getElementById(id).files[0];
            if (String(pdffile) != "undefined") {
                $("#ButtonsUploadDiv").data("UploadNumber", index);
                if (pdffile.type == "application/pdf") {
                    pdffile_url = URL.createObjectURL(pdffile);
                    $("#viewer-" + index).attr('src', pdffile_url);
                    $("#frameDiv-" + index).data("frameScr", pdffile_url);
                    $("#framebtnDiv-" + index).data("frameScr", pdffile_url);
                    $("#viewer-" + index).css("display", "none");
                    $("#viewerImg-" + index).css("display", "none");
                    $("#framebtnDiv-" + index).css("display", "none");
                    $('#blah-' + index).attr('src', "");
                    $('#blah-' + index).css("display", "none");
                    $('#ImgbtnDiv-' + index).css("display", "none");
                    $("#viewerModelQuestion").attr('src', pdffile_url);
                    $("#viewerModelQuestion").css("display", "block");
                    $("#blahModelQuestion").css("display", "none");
                    $("#myModalQuestion").modal();
                    $("#ButtonsUploadDiv").data("FileType", "PDF");
                } else {
                    if (pdffile.type == "image/png" || pdffile.type == "image/jpeg" || pdffile.type == "image/jpg") {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#blah-' + index).attr('src', e.target.result);
                            $("#viewer-" + index).attr('src', "");
                            $('#blah-' + index).css("display", "none");
                            $("#viewer-" + index).css("display", "none");
                            $("#viewerImg-" + index).css("display", "none");
                            $('#ImgbtnDiv-' + index).css("display", "none");
                            $("#framebtnDiv-" + index).css("display", "none");
                            $("#ImgbtnDiv-" + index).data("frameScr", e.target.result);
                            $("#blahModelQuestion").attr('src', e.target.result);
                            $("#viewerModelQuestion").css("display", "none");
                            $("#blahModelQuestion").css("display", "block");
                            $("#myModalQuestion").modal();
                            $("#ButtonsUploadDiv").data("FileType", "Image");
                        }
                        reader.readAsDataURL(document.getElementById(id).files[0]);
                    } else {
                        $("#UploadErrorModal").modal();
                        $('#blah-' + index).css("display", "none");
                        $("#viewer-" + index).css("display", "none");
                        $("#viewerImg-" + index).css("display", "none");
                        $("#uploadPDF-" + index).val('');
                        $('#framebtnDiv-' + index).css("display", "none");

                    }
                }
            } else {
                $('#blah-' + UploadNumber).css("display", "none");
                $("#viewer-" + UploadNumber).css("display", "none");
                $("#viewerImg-" + UploadNumber).css("display", "none");
                $("#uploadPDF-" + UploadNumber).val('');
            }
        }
        else {
            //For < IE11
            e.preventDefault();
            var ownername = $("#crdname").val();
            var Amount = $("#crdamount").val();
            debugger;
            if (result == "") {
                $("#btnorder").attr("disabled", "disabled");
                $("#CustomerName").text(ownername);
                $("#PaidAmount").text(Amount);
                $("#CreditCardConfirm").css("display", "inline-block");
                $("#CreditCardConfirm").removeAttr("disabled");
                $("#CreditConfirmModal").modal();

            }
            return false;
        }
    } else {
        pdffile = document.getElementById(id).files[0];
        if (String(pdffile) != "undefined") {
            $("#ButtonsUploadDiv").data("UploadNumber", index);
            if (pdffile.type == "application/pdf") {
                pdffile_url = URL.createObjectURL(pdffile);
                $("#viewer-" + index).attr('src', pdffile_url);
                $("#frameDiv-" + index).data("frameScr", pdffile_url);
                $("#framebtnDiv-" + index).data("frameScr", pdffile_url);
                $("#viewer-" + index).css("display", "none");
                $("#viewerImg-" + index).css("display", "none");
                $("#framebtnDiv-" + index).css("display", "none");
                $('#blah-' + index).attr('src', "");
                $('#blah-' + index).css("display", "none");
                $('#ImgbtnDiv-' + index).css("display", "none");
                $("#viewerModelQuestion").attr('src', pdffile_url);
                $("#viewerModelQuestion").css("display", "block");
                $("#blahModelQuestion").css("display", "none");
                $("#myModalQuestion").modal();
                $("#ButtonsUploadDiv").data("FileType", "PDF");
            } else {
                if (pdffile.type == "image/png" || pdffile.type == "image/jpeg" || pdffile.type == "image/jpg") {

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah-' + index).attr('src', e.target.result);
                        $("#viewer-" + index).attr('src', "");
                        $('#blah-' + index).css("display", "none");
                        $("#viewer-" + index).css("display", "none");
                        $("#viewerImg-" + index).css("display", "none");
                        $('#ImgbtnDiv-' + index).css("display", "none");
                        $("#framebtnDiv-" + index).css("display", "none");
                        $("#ImgbtnDiv-" + index).data("frameScr", e.target.result);
                        $("#blahModelQuestion").attr('src', e.target.result);
                        $("#viewerModelQuestion").css("display", "none");
                        $("#blahModelQuestion").css("display", "block");
                        $("#myModalQuestion").modal();
                        $("#ButtonsUploadDiv").data("FileType", "Image");
                    }

                    reader.readAsDataURL(document.getElementById(id).files[0]);
                } else {
                    $("#UploadErrorModal").modal();
                    $('#blah-' + index).css("display", "none");
                    $("#viewer-" + index).css("display", "none");
                    $("#viewerImg-" + index).css("display", "none");
                    $("#uploadPDF-" + index).val('');
                    $('#framebtnDiv-' + index).css("display", "none");

                }
            }
        } else {
            $('#blah-' + index).css("display", "none");
            $("#viewer-" + index).css("display", "none");
            $("#viewerImg-" + index).css("display", "none");
        }
    }


});
$(document).on('click', '#CancelBtn', function () {
    var UploadNumber = $("#ButtonsUploadDiv").data("UploadNumber");// = $("#" + this.id).attr("src");
    $('#blah-' + UploadNumber).css("display", "none");
    $("#viewer-" + UploadNumber).css("display", "none");
    $("#viewerImg-" + UploadNumber).css("display", "none");
    $("#uploadPDF-" + UploadNumber).val('');
});
$(document).on('click', '#AgreeFormbtn', function () {
    var UploadNumber = $("#ButtonsUploadDiv").data("UploadNumber");// = $("#" + this.id).attr("src");
    var FileType = $("#ButtonsUploadDiv").data("FileType");// = $("#" + this.id).attr("src");
    if (FileType == "Image") {
        $('#blah-' + UploadNumber).css("display", "block");
        $('#ImgbtnDiv-' + UploadNumber).css("display", "block");
    } else {
        $('#viewer-' + UploadNumber).css("display", "none");
        $('#viewerImg-' + UploadNumber).css("display", "block");
        $('#framebtnDiv-' + UploadNumber).css("display", "block");
        $('#ImgbtnDiv-' + UploadNumber).css("display", "none");

        var scr = $("#viewerImg-0").attr("src");
        $('#viewerImg-' + UploadNumber).attr('src', scr);
    }

});

$(document).on('click', '.uploadedpdfdiv', function () {
    $('#exampleModal').modal('hide');
    var scr = $("#" + this.id).data("frameScr");// = $("#" + this.id).attr("src");
    $('#viewerModel').attr('src', scr);
    $('#blahModel').css("display", "none");
    $('#viewerModel').css("display", "inline-block");
    $("#myModal").modal();
});
$(document).on('click', '.uploadedImgdiv', function () {
    $('#exampleModal').modal('hide');
    var scr = $("#" + this.id).data("frameScr");// = $("#" + this.id).attr("src");
    $('#blahModel').attr('src', scr);
    $('#viewerModel').css("display", "none");
    $('#blahModel').css("display", "block");
    $("#myModal").modal();
});
$(document).ready(function () {
    var counter = 0;

    $('#addUpload').click(function () {
        counter = counter + 1;
        var uploadControl = '<br/><input type="file" class="uploadPDF" name="UplaodControl' + counter + '"  id="uploadPDF-' + counter + '" accept="application/pdf,.jpg,.jpeg,.png"/>';
        $('#UploadFiles').append(uploadControl);

    });
    $('#ContinueUploadId').click(function (e) {
        var Isvalid = true;
        if ($('#Country').val() != "" && $('#Count').val() != "") {
            $(".uploadPDF").each(function (key, value) {
                if (this.value == "") { Isvalid = false; }
            });
            if (Isvalid) {
                e.preventDefault();
                $("#divLockPassword").modal();
                $('#upldocDiv').css("display", "none");
                $('#ordrfrmDiv').css("display", "block");
                if ($(".uploadedImg").length == 1) {
                    if ($(".uploadedImg").attr('src') != "") {
                        var ua = window.navigator.userAgent;
                        var msie = ua.indexOf("MSIE ");
                        var rv = -1;
                        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
                        {
                            if (isNaN(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))))) {
                                //For IE 11 >
                                $(".folder").attr('src', $(".uploadedImg").attr('src'));

                            } else {
                                $('.viewlnk').hide();
                            }
                        } else {
                            $(".folder").attr('src', $(".uploadedImg").attr('src'));
                        }
                    }
                }
                $(".files")('');
                $(".files-div").each(function () {
                    //alert(this.innerHTML);
                    $(".files").append('<div class="upldimg-popup col-md-6 mb-4">' + this.innerHTML + '</div>');
                });
                //$('.uploadedpdfdiv').css("display", "none");
                //$('.uploadedImgdiv').css("display", "none");
                $(".uploadedpdf").unbind("click");
                $(".uploadedImg").unbind("click");
                $("#informdata-id").hide();
                $("#procdbtn-id").show();
            } else {
                //  $("#diverror").modal();
                var ua = window.navigator.userAgent;
                var msie = ua.indexOf("MSIE ");
                var rv = -1;
                if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
                {
                    if (isNaN(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))))) {
                        //For IE 11 >

                    }
                    else {
                        //For < IE11
                        e.preventDefault();

                    }
                    return false;
                }
            }
        }
        else {
            // $("#diverror").modal();
        }
    });
    function validateEmail(email) {
        console.log('123 Email');
        var emailReg = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
        if (!emailReg.test(email)) {
            return false;
        } else {
            return true;
        }
    }
    $('#ContinueOrderId').click(function (e) {
        //&& $("#CompanyName").val() != ""
        if (validateEmail($("#Email").val()) && $("#Address").val() != "" && $("#ZipCode").val() != "" && $("#ZipCode").val() != "99999" && $("#State").val() != "" && $("#City").val() != "" && $("#FirstName").val() != "" && $("#LastName").val() != "" && $("#Phone").val() != "") {
            e.preventDefault();
            $('#ordrfrmDiv').css("display", "none");
            $('#fedxtrkDiv').css("display", "block");
            $('.orderFormRequestModel')('');
            $(".orderFormRequest").appendTo($(".orderFormRequestModel"));
            $(".orderFormRequest :input").attr("disabled", true);
            $("#ContinueOrderId").hide();
            var Signature = $("#Signature").val();
            Signature = Signature.replace(new RegExp('/', 'g'), " ");
            $('.sgntxt').text(Signature);
            $(".ordstps-div").css("display", "block");

        } else {
            $("#diverror").modal();
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");
            var rv = -1;
            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
            {
                if (isNaN(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))))) {
                    //For IE 11 >

                }
                else {
                    //For < IE11
                    e.preventDefault();

                }
                return false;
            }
        }
    });
    $('#EditFormbtn').click(function () {
        $('#fedxtrkDiv').css("display", "none");
        $('#ordrfrmDiv').css("display", "block");
        $('#payinfoDiv').css("display", "none");
        $("#informdata-id").hide();
        $("#procdbtnDiv").show();
        $(".orderFormRequest").show();
        $(".orderFormRequest").appendTo($(".orderFormRequestRow"));
        $(".orderFormRequest :input").attr("disabled", false);
        $("#ContinueOrderId").show();

    });
    $('#BackFedexFormbtn').click(function () {
        $('#fedxtrkDiv').css("display", "none");
        $('#ordrfrmDiv').css("display", "block");
        $('#payinfoDiv').css("display", "none");
        $('#upldocDiv').css("display", "none");
        $(".orderFormRequest").appendTo($(".orderFormRequestRow"));
        $(".orderFormRequest :input").attr("disabled", false);
        $("#ContinueOrderId").show();

    });
    $('#BackOrderId').click(function () {
        $('#fedxtrkDiv').css("display", "none");
        $('#ordrfrmDiv').css("display", "none");
        $('#payinfoDiv').css("display", "none");
        $('#upldocDiv').css("display", "block");
        $(".orderFormRequest").appendTo($(".orderFormRequestRow"));
        $(".orderFormRequest :input").attr("disabled", false);
        $("#ContinueOrderId").show();
        $(".uploadedpdf").bind("click");
        $(".uploadedImg").bind("click");
        // $('.uploadedpdfdiv').css("display", "block");
        //$('.uploadedImgdiv').css("display", "block");

    });
    $('#BackPaymentId').click(function () {
        $('#fedxtrkDiv').css("display", "block");
        $('#ordrfrmDiv').css("display", "none");
        $('#payinfoDiv').css("display", "none");
        $('#upldocDiv').css("display", "none");
        //$("#divmodelfedex").appendTo($("#divmodelfedexbody"));
    });
    $('#ContinueFedexId').click(function (e) {
        if ($("input[name='fedextype']:checked").val()) {
            //alert($("input[name='fedextype']:checked").val());
            if ($("input[name='fedextype']:checked").val() == 0) {
                $("#ViewFedex").css("display", "none");
                var valid = true;
                $("#uploadPDFEnvelop").each(function (key, value) {
                    if (this.value == "") {
                        $("#diverror").modal();
                        valid = false;
                    }
                });
                if (valid == true) {
                    e.preventDefault();
                    $('#fedxtrkDiv').css("display", "none");
                    $('#payinfoDiv').css("display", "block");
                    $('#ViewFedex').hide();
                } else {
                    var ua = window.navigator.userAgent;
                    var msie = ua.indexOf("MSIE ");
                    var rv = -1;
                    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
                    {
                        if (isNaN(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))))) {
                            //For IE 11 >

                        }
                        else {
                            //For < IE11
                            e.preventDefault();

                        }
                        return false;
                    }
                }
            } else {
                e.preventDefault();
                $("#ViewFedex").css("display", "block");
                var divmodelfedex = $("#divmodelfedex")();
                $("#fedexLabelDivModel").append(divmodelfedex);
                $('#fedxtrkDiv').css("display", "none");
                $('#payinfoDiv').css("display", "block");

                //alert($("#divmodelfedexbody")());
                //$("#divmodelfedexbody").appendTo($("#fedexLabelDivModel"));

            }
        } else {
            $("#diverror").modal();
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");
            var rv = -1;
            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
            {
                if (isNaN(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))))) {
                }
                else {
                    //For < IE11
                    e.preventDefault();

                }
                return false;
            }
        }
    });
});
function zipCodeEntered() {
    var zipCode = $("#ZipCode").val();
    //alert('fger');
    if (zipCode.length == 5) {
        if (zipCode != 99999) {
            $("#stateDiv").show();
            $('#State').prop('required', true);
            $("#cityDiv").show();
            //   $("#Country").val('155');
            //debugger;
            $.ajax({
                dataType: "html",
                url: '/ExpeditedRequest/GetZipCodeLocation/?zipCode=' + zipCode,
                success: function (result) {
                    //debugger;
                    if (result != 0) {
                        var obj = jQuery.parseJSON(result);
                        $("#City").val(obj[0]);
                        $("#State").val(obj[1]);
                        $("#ZipCodeNotFound").hide();

                    }
                    else {
                        $("#City").val('');
                        $("#State").val('');
                        $("#ZipCodeNotFound").show();

                    }

                }
            });
        }
        else {
            $("#City").val('');
            $("#State").val('');
            $("#ZipCodeNotFound").hide();
            $("#stateDiv").hide();
            $("#cityDiv").hide();
            //    $("#Country").val('');


        }
    } else {
        $("#City").val('');
        $("#State").val('');
        $('#State').prop('required', false);
        $("#ZipCodeNotFound").show();
    }
}
$(document).on("change", "#Country", function () {
    GetFeeData();
})
$(document).on("change", "#Count", function () {
    GetFeeData();
})
function GetFeeData() {
    var Count = $("#Count").val();
    var Country = $("#Country").val();
    if (Count != "" && Count != 0 && Country != "") {
        $.get("/ExpeditedRequest/GetFee?countryId=" + Country + "&count=" + Count, function (data) {
            if (data == null) {
                alert("Please choose country and fedral document count");
            }
            else {
                $("#TotalFeeLabel").text("$" + data[0] + " x " + Count + " = $" + data[1]);
                $("#amountPay").text("$" + data[2]);
                $("#crdamount").val("$" + data[2]);
                $("#TotalFeeDiv").removeClass('d-none');
                $("#Upload").removeClass("d-none");
                $("#UploadFiles")("");
                //$("#MultiDocInnerDiv")("");
                $.get("/ExpeditedRequest/GetShippingData?countryId=" + Country, function (Shipping) {
                    if (Shipping != null) {
                        //alert(Shipping);
                        $(".regdayofweek").text(Shipping[0]);
                        $(".regDay").text(Shipping[1]);
                        $(".regmon").text(Shipping[2]);
                        $(".plustwodayofweek").text(Shipping[3]);
                        $(".plustworegDay").text(Shipping[4]);
                        $(".plustwomon").text(Shipping[5]);
                        $(".plusonedayofweeky").text(Shipping[6]);
                        $(".plusoneregDay").text(Shipping[7]);
                        $(".plusonemon").text(Shipping[8]);

                        //$("#ShippingOption")("");
                        //$("#ShippingOption").append(ShippingHtml);
                    }
                });

                for (var i = 1; i < Count; i++) {
                    var CounterOfUploadDocument = i + 1;
                    var uploadControl = '<li class="row input-list-item">'
                        +'<label class="form-control-lable w-100 col-md-6" > Upload Document <span class="badge badge-warning p-1" > ' + CounterOfUploadDocument + '</span ></label > '
                        +'<div class="data files-div col-md-6">'
                        +'<input type="file" required class="uploadPDF" id="uploadPDF-' + i + '" name="UplaodControl' + i + '" accept="application/pdf,.jpg,.jpeg,.png" />'
                        +'<div class="hvrbox">'
                        +'<img id = "blah-' + i + '" src = "#" alt = "your image" class="uploadedImg upldimg hvrbox-layer_bottom img-fluid" style = "display: none; " />'
                        +'<div style="clear:both" class="uploadedpdf hvrbox-layer_bottom" id="frameDiv-' + i + '" data-frameScr="">'
                        +'<iframe id="viewer-' + i + '" frameborder="0" class="uploadedpdf" scrolling="no" style="display: none;overflow:hidden;"></iframe>'
                        +'<img src="~/Images/PDF.png" class="img-fluid pdfl-img" id="viewerImg-' + i + '" style="display: none;" />'
                        +'</div>'
                        +'<div id="framebtnDiv-' + i + '" style="display: none;" data-frameScr="" class="uploadedpdfdiv">'
                        +'<a href="javascript:void(0)" class="vpdf-lnk btn btn-warning"> View PDF</a>'
                        +'</div>'
                        +'<div class="hvrbox-layer_top uploadedImgdiv" style="display: none;" id="ImgbtnDiv-' + i + '" data-frameScr="">'
                        +'<div class="hvrbox-text">'
                        +'<button type="button" class="btn btn-warning">Enlarge</button>'
                        +'</div>'
                        +'</div>'
                        +'</div >'
                        +'</div></li>';
                    $('#UploadFiles').append(uploadControl);
                }
                if (Count > 1) {
                    $("#singleDoc").addClass("d-none");
                    $("#MultiDoc").removeClass("d-none");
                } else {
                    $("#singleDoc").removeClass("d-none");
                    $("#MultiDoc").addClass("d-none");
                }
            }
        });
    } else {
        $("#TotalFeeDiv").addClass("d-none");
        $("#Upload").addClass("d-none");

        //$("#TotalFeeDiv").hide();
        //$("#Upload").hide();
    }
}
function GetCustomerData() {
    var zipCode = $("#ZipCode").val();
    var email = $("#Email").val();
    $.get("/ExpeditedRequest/GetStateAndCity/" + zipCode + "?email=" + email, function (data) {
        if (data == null) {
            alert("Please Enter Valid ZipCode");
        } else {
            $("#State").val(data.State);
            $("#City").val(data.City);
            $("#Phone").val(data.Phone);
            $("#Address").val(data.Address);
            $("#CompanyName").val(data.Company);
            $("#FirstName").val(data.Name);
            $("#LastName").val(data.LastName);
            changeCreditCardName();
        }
    });
}
$(document).on('blur', '#FirstName',
    function (event) {
        changeCreditCardName();
        return false;
    });
$(document).on('blur', '#LastName',
    function (event) {
        changeCreditCardName();
        return false;
    });
function changeCreditCardName() {
    var ownername = $("#FirstName").val();
    var Lastname = $("#LastName").val();
    var FullName = ownername + " " + Lastname;
    $("#crdname").val(FullName);
    document.getElementById('svgname').innerHTML = FullName;
    document.getElementById('svgnameback').innerHTML = FullName;
}
$(document).on("click", "#CancelPayment", function () {
    $("#CreditTodayCheckerModal").modal('hide');
})
$(document).on("click", "#btnorder", function (evt) {
    evt.preventDefault();
    var form = $("#orderForm");
    //debugger;
    if ($("#ZipCodeNotFound").css("display") == "none") {
        //debugger;
        if ($("#rdCredit").is(":checked") == true) {

            TodayPayment();
            return false;
        }
        else {

            $("#AuthenticationNumber").val("");
            $(".orderFormRequest").appendTo($(".orderFormRequestRow"));
            setContactInfo();
            $("#orderForm").submit();

        }
    }
    else {

        return false;
    }
});
function TodayPayment() {
    var _zipCode = $("#ZipCode").val();
    var _email = $("#Email").val();
    var Count = $("#Count").val();
    var Country = $("#Country").val();
    var ShippingMethodID = $("#hidFedex").val();
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    var rv = -1;
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
    {
        if (isNaN(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))))) {
            //For IE 11 >
            $.ajax({
                url: '/ExpeditedRequest/CheckUserPayCreditRequestToday',
                data: {
                    zipCode: _zipCode, Email: _email
                    , countryId: Country, DocumentCount: Count,
                    ShippingMethodID: ShippingMethodID
                },
                async: false,//WHY??
                cache: false,
                dataType: "html",
                success: function (result) {
                    var ownername = $("#crdname").val();
                    var Amount = $("#crdamount").val();
                    //debugger;
                    if (result == "") {
                        $("#btnorder").attr("disabled", "disabled");
                        $("#CustomerName").text(ownername);
                        $("#PaidAmount").text(Amount);
                        $("#CreditCardConfirm").css("display", "inline-block");
                        $("#CreditCardConfirm").removeAttr("disabled");
                        $("#CreditConfirmModal").modal();

                    }

                    else {

                        $("#CreditToday")(result);
                        $("#CreditTodayCheckerModal :button").prop('disabled', false);
                        $("#CreditTodayCheckerModal").modal();


                    }
                }, error: function (xhr, status) {
                    alert(status);
                }
            });

        }
        else {
            //For < IE11
            e.preventDefault();
            var ownername = $("#crdname").val();
            var Amount = $("#crdamount").val();
            //debugger;
            if (result == "") {
                $("#btnorder").attr("disabled", "disabled");
                $("#CustomerName").text(ownername);
                $("#PaidAmount").text(Amount);
                $("#CreditCardConfirm").css("display", "inline-block");
                $("#CreditCardConfirm").removeAttr("disabled");
                $("#CreditConfirmModal").modal();

            }
            return false;
        }
        return false;
    } else {
        $.ajax({
            url: '/ExpeditedRequest/CheckUserPayCreditRequestToday',
            data: {
                zipCode: _zipCode, Email: _email
                , countryId: Country, DocumentCount: Count,
                ShippingMethodID: ShippingMethodID
            },
            async: false,//WHY??
            cache: false,
            dataType: "html",
            success: function (result) {
                var ownername = $("#crdname").val();
                var Amount = $("#crdamount").val();
                //debugger;
                if (result == "") {
                    $("#btnorder").attr("disabled", "disabled");
                    $("#CustomerName").text(ownername);
                    $("#PaidAmount").text(Amount);
                    $("#CreditCardConfirm").css("display", "inline-block");
                    $("#CreditCardConfirm").removeAttr("disabled");
                    $("#CreditConfirmModal").modal();

                }

                else {

                    $("#CreditToday")(result);
                    $("#CreditTodayCheckerModal :button").prop('disabled', false);
                    $("#CreditTodayCheckerModal").modal();


                }
            }, error: function (xhr, status) {
                alert(status);
            }
        });

    }
}
$(document).on("click", "#ContinueWithPayment", function () {
    $("#btnorder").attr("disabled", "disabled");
    $("#CreditTodayCheckerModal :button").prop('disabled', true);
    $("#CreditTodayCheckerModal").modal('hide');
    Pay();
})
function Pay() {
    //debugger; 
    setContactInfo();
    var Cardno = $("#crdnumber").val();
    var DollarAmount = $("#crdamount").val();
    var Month = $("#drpmonth").val();
    var Year = $("#drpyear").val();
    var HolderName = $("#crdname").val();
    var Count = $("#Count").val();
    var Country = $("#Country").val();
    var ShippingMethodID = $("#hidFedex").val();
    $.ajax({
        url: '/ExpeditedRequest/CheckCreditCardRequest?Cardno=' + Cardno + '&DollarAmount=' + DollarAmount + '&Month=' + Month + '&Year=' + Year + '&HolderName=' + HolderName + '&DocumentCount=' + Count + '&ShippingMethodID=' + ShippingMethodID,
        async: false,
        cache: false,
        success: function (result) {
            if (result == "False") {
                $("#divCreditError").modal();
            }
            else if (result == "") {
                $("#divCreditError").modal();
            }
            else {
                $("#AuthenticationNumber").val(result.split('&')[0]);
                $(".orderFormRequest").appendTo($(".orderFormRequestRow"));
                $("#orderForm").submit();
            }
        }
    });
}
function setContactInfo() {
    //alert("here in contact");
    var Address = $("#Address").val();
    var ZipCode = $("#ZipCode").val();
    var State = $("#State").val();
    var City = $("#City").val();
    var CompanyName = $("#CompanyName").val();
    var LastName = $("#LastName").val();
    var FirstName = $("#FirstName").val();
    var PhoneNumber = $("#Phone").val();
    var Email = $("#Email").val();
    var Country = $("#Country").val();
    var Signature = $("#Signature").val();
    Signature = Signature.replace(new RegExp('/', 'g'), " ");
    $.ajax({
        url: '/ExpeditedRequest/SetContactInfoData',
        async: false,
        cache: false,
        data: {
            Address: Address, ZipCode: ZipCode,
            State: State, City: City, CompanyName: CompanyName,
            Firstname: FirstName, Lastname: LastName,
            PhoneNumber: PhoneNumber, Email: Email, Country: Country, Signature: Signature
        },
        success: function (result) {
            //alert("Good");
        }
    })

}
$(document).on("click", "#CreditCardConfirm", function () {
    $("#CreditCardConfirm").attr("disabled", "disabled");

    $("#CreditConfirmModal").modal('hide');
    Pay();
})
$(document).on("click", "#btnerrcredit", function () {
    $("#divCreditError").modal('hide');
    $("#btnorder").removeAttr("disabled");

})
$(document).on("click", "#CreditCardCancel", function () {
    $("#CreditConfirmModal").modal('hide');
    $("#btnorder").removeAttr("disabled");

})
$(document).on("click", "#rdCredit", function () {
    //debugger;
    if ($(this).is(":checked")) {
        $("#divcredit").css("display", "inline-block");
        $("#PaymentMethodID").val($(this).val());
    }
    else {
        $("#divcredit").css("display", "none");
        $("#PaymentMethodID").val("0");
    }

})
$(document).on("click", "#rdWirring", function () {
    //debugger;
    if ($(this).is(":checked")) {
        $("#divcredit").css("display", "none");
        $("#PaymentMethodID").val($(this).val());
        CheckFedexExist(2, "if you choose another payment method we can't create Fedex Tracking to you");
    }


})
$(document).on("click", "#rdBilling", function () {
    //debugger;
    if ($(this).is(":checked")) {
        $("#divcredit").css("display", "none");
        $("#PaymentMethodID").val($(this).val());
        CheckFedexExist(2, "if you choose another payment method we can't create Fedex Tracking to you");
    }
})
$(document).on("click", "#rdCheck", function () {
    //debugger;
    if ($(this).is(":checked")) {
        $("#divcredit").css("display", "none");
        $("#PaymentMethodID").val($(this).val());
        CheckFedexExist(2, "if you choose another payment method we can't create Fedex Tracking to you");
    }


})
function CheckFedexExist(x, txt) {
    //debugger;
    if ($('#chxfedex1').is(":checked")) {
        $("#spntxt").text(txt);
        $("#diverrorfedex").modal();
        RemoveShipping();
    }
    $("#divstartfedex").css("display", "none");
}