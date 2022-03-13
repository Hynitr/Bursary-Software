$(document).ready(function () {
  //------------- register new intake ------------//
  $("#prg").click(function () {
    var pname = $("#pname").val();
    var adid = $("#adid").val();
    var clss = $("#clss").val();
    var fst = $("#fst").val();
    var snd = $("#snd").val();
    var trd = $("#trd").val();

    if (adid == null || adid == "") {
      $(toastr.error("Kindly input student/pupil admission no"));
    } else {
      if (pname == null || pname == "") {
        $(toastr.error("Kindly input the student/pupil name"));
      } else {
        $(toastr.error("Loading... Please wait"));

        $.ajax({
          type: "post",
          url: "functions/init.php",
          data: {
            pname: pname,
            clss: clss,
            fst: fst,
            snd: snd,
            trd: trd,
            adid: adid,
          },
          success: function (data) {
            $(toastr.error(data)).html(data);
          },
        });
      }
    }
  });

  //---------- edit fee record ------//
  $("#uplprg").click(function () {
    var uplpname = $("#pname").val();
    var upladid = $("#adid").val();
    var uplclss = $("#clss").val();
    var uplfst = $("#fst").val();
    var uplsnd = $("#snd").val();
    var upltrd = $("#trd").val();
    var stid = $("#stid").val();

    if (adid == null || adid == "") {
      $(toastr.error("Kindly input student/pupil admission no"));
    } else {
      if (pname == null || pname == "") {
        $(toastr.error("Kindly input the student/pupil name"));
      } else {
        $(toastr.error("Loading... Please wait"));

        $.ajax({
          type: "post",
          url: "functions/init.php",
          data: {
            uplpname: uplpname,
            uplclss: uplclss,
            uplfst: uplfst,
            uplsnd: uplsnd,
            upltrd: upltrd,
            upladid: upladid,
            stid: stid,
          },
          success: function (data) {
            $(toastr.error(data)).html(data);
          },
        });
      }
    }
  });

  //--------- paid fee -------------//
  $("#paid").click(function () {
    var std = $("#std").val();
    var trm = $("#trm").val();
    var fee = $("#fee").val();
    var mdd = $("#mdd").val();
    var descr = $("#descr").val();
    var pde = $("#pdet").val();
    var cls = $("#cls").val();
    var pdat = $("#pdat").val();

    if (std == null || std == "") {
      $(toastr.error("Kindly select a student/pupil"));
    } else {
      if (fee == null || fee == "") {
        $(toastr.error("Kindly input the paid fee"));
      } else {
        $.ajax({
          type: "post",
          url: "functions/init.php",
          data: {
            std: std,
            trm: trm,
            fee: fee,
            cls: cls,
            mdd: mdd,
            descr: descr,
            pde: pde,
            pdat: pdat,
          },
          success: function (data) {
            $(toastr.error(data)).html(data);
          },
        });
      }
    }
  });

  //--------- edit paid fee -------------//
  $("#edpaid").click(function () {
    var edstd = $("#edstd").val();
    var edtrm = $("#edtrm").val();
    var edfee = $("#edfee").val();
    var edmdd = $("#edmdd").val();
    var eddescr = $("#eddescr").val();
    var edfst = $("#edfst").val();
    var edpde = $("#edpdet").val();
    var edcls = $("#edcls").val();
    var edpdate = $("#edpdate").val();

    if (edstd == null || edstd == "") {
      $(toastr.error("Kindly select a student/pupil"));
    } else {
      if (edfee == null || edfee == "") {
        $(toastr.error("Kindly input the paid fee"));
      } else {
        $.ajax({
          type: "post",
          url: "functions/init.php",
          data: {
            edstd: edstd,
            edtrm: edtrm,
            edfee: edfee,
            edcls: edcls,
            edmdd: edmdd,
            eddescr: eddescr,
            edfst: edfst,
            edpde: edpde,
            edpdate: edpdate,
          },
          success: function (data) {
            $(toastr.error(data)).html(data);
          },
        });
      }
    }
  });

  //------------- Pay intake ----------//
  $("#payspill").click(function () {
    var std = $("#std").val();
    var fee = $("#fee").val();
    var mdd = $("#mdd").val();
    var pdet = $("#pdet").val();

    if (fee == null || fee == "") {
      $(toastr.error("Kindly input the paid fee"));
    } else {
      if (pdet == null || pdet == "") {
        $(toastr.error("Kindly write a short description for this payment"));
      } else {
        $.ajax({
          type: "post",
          url: "functions/init.php",
          data: {
            std: std,
            fee: fee,
            mdd: mdd,
            pdet: pdet,
          },
          success: function (data) {
            $(toastr.error(data)).html(data);
          },
        });
      }
    }
  });

  //--------- update session -----------//
  $("#upds").click(function () {
    var ursfr = "FGS";

    $("#ModalCenter").modal("show");
    $(toastr.error("Loading... Please wait"));

    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: { ursfr: ursfr },
      success: function (data) {
        $(toastr.error(data)).html(data);
      },
    });
  });

  //--------- update session term -----------//
  $("#updt").click(function () {
    var trm = $("#trm").val();
    var ursf = "FGS";

    $(toastr.error("Loading... Please wait"));

    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: { trm: trm, ursf: ursf },
      success: function (data) {
        $(toastr.error(data)).html(data);
      },
    });
  });

  //----- custom fee -----//
  $("#cuspaid").click(function () {
    var cusfee = $("#cusfee").val();
    var cusamt = $("#cusamt").val();
    var cuspedt = $("#cuspdet").val();

    if (cusfee == "") {
      $(toastr.error("Kindly create a custom fee name"));
    } else {
      if (cusamt == "") {
        $(toastr.error("Custom fee amount can not be empty"));
      } else {
        if (cuspedt == "") {
          $(toastr.error("Please enter a description for this fee"));
        } else {
          $(toastr.error("Loading... Please wait"));
          $.ajax({
            type: "post",
            url: "functions/init.php",
            data: { cusfee: cusfee, cusamt: cusamt, cuspedt: cuspedt },
            success: function (data) {
              $(toastr.error(data)).html(data);
            },
          });
        }
      }
    }
  });

  //----- input custom fee -----//
  $("#cinpaid").click(function () {
    var cinmdd = $("#cinmdd").val();
    var cinfee = $("#cinfee").val();
    var cinstd = $("#cinstd").val();
    var cfee = $("#cfee").val();
    var mddr = $("#mddr").val();
    var cusdate = $("#cusdate").val();


    if (cinfee == "") {
      $(toastr.error("Kindly input fee paid"));
    } else {
      $(toastr.error("Loading... Please wait"));
      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: {
          cinmdd: cinmdd,
          cinfee: cinfee,
          cinstd: cinstd,
          cfee: cfee,
          mddr: mddr,
          cusdate: cusdate,
        },
        success: function (data) {
          $(toastr.error(data)).html(data);
        },
      });
    }
  });

  //--------- EXPENSES TRACKER ------//
  $("#exreg").click(function () {
    var exname = $("#exname").val();
    var examt = $("#examt").val();
    var extype = $("#extype").val();
    var expay = $("#expay").val();
    var exdesc = $("#exdesc").val();
    var qty = $("#qty").val();

    if (examt == "") {
      $(toastr.error("Kindly input expenses fee"));
    } else {
      if (qty == "") {
        $(toastr.error("Kindly input the quantity of items"));
      } else {
        $(toastr.error("Loading... Please wait"));
        $.ajax({
          type: "post",
          url: "functions/init.php",
          data: {
            exname: exname,
            examt: examt,
            extype: extype,
            expay: expay,
            exdesc: exdesc,
            qty: qty,
          },
          success: function (data) {
            $(toastr.error(data)).html(data);
          },
        });
      }
    }
  });
});
