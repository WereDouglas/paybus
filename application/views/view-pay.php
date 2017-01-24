<?php require_once(APPPATH . 'views/inner-css.php'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" />
<style>
    body {
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 13px;
        background-color:#FFFFFF;
    }   

</style>
<div class="page-content">
    <div class="row">
        <form id="station-form" parsley-validate novalidate role="form" class="form-horizontal" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/payment/create'  method="post">
            <div class="col-sm-5 col-md-6" >
                <div  id="printableArea" >

                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select route</label>
                    <div class="form-group">

                        <div class="col-md-6 col-sm-5 col-xs-12">
                            <input class="easyui-combobox form-control" name="routeID" id="routeID" style="width:100%;height:26px" data-options="
                                   url:'<?php echo base_url() ?>index.php/route/lists',
                                   method:'get',
                                   valueField:'id',
                                   textField:'name',
                                   multiple:false,
                                   panelHeight:'auto'
                                   ">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">

                            <span class="col-sm-3"> Date:</span> <span class="col-sm-9">   <input class="easyui-datebox" name="date" id="date" value="<?php echo date('d-m-Y'); ?>"/></span>  

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" placeholder="Passenger name"  class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="text" name="contact" id="contact" placeholder="Contact No."  class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-10">
                            <input type="text" name="email" placeholder="Email" id="email"  class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <span id="loading"  name ="loading"><img src="<?= base_url(); ?>images/loading.gif" alt="loading......" /></span>                                   
                        </div>
                    </div>                       
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-default" type="submit">SUBMIT</button>
                <input type="button" class="btn btn-default  printdiv-btn btn-primary icon-ok" value="print" />


            </div>
    </div>

</form>


</div><!--/row-->           
</div><!--/page-content end--> 
<!-- Modal -->

<?php require_once(APPPATH . 'views/inner-js.php'); ?>

<script>
    $(document).ready(function () {
        $('#loading').hide();

        var payment = 0;

        $('#contact').blur(function () {

            //$("#tenantname").val($("input[name=tenant]").val());
            // $("#dater").val($("input[name=date]").val());
            payment = parseInt($("#sum").val());
            $("#words").val(toWords(payment));
            var routeID = $("input[name=routeID]").val();
            var date = $("input[name=date]").val();
            if (routeID !== null) {           // show loader 
                $('#loading').show();
                $.post("<?php echo base_url() ?>index.php/payment/details", {
                    routeID: routeID, date: date
                }, function (response) {
                    //#emailInfo is a span which will show you message
                    $('#loading').hide();
                    setTimeout(finishAjax('loading', escape(response)), 400);
                });
            }

            function finishAjax(id, response) {
                $('#' + id).html(unescape(response));
                $('#' + id).fadeIn();
            }
        });


    });

    $(document).on('click', '.printdiv-btn', function (e) {
        e.preventDefault();

        var $this = $(this);
        //  var originalContent = $('body').html();
        var printArea = $this.parents('.printableArea').html();

        $('body').html(printArea);
        window.print();
        $('body').html(printArea);
    });


</script>
<script>
    var th = ['', 'thousand', 'million', 'billion', 'trillion'];
    var dg = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
    var tn = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
    var tw = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

    function toWords(s) {
        s = s.toString();
        s = s.replace(/[\, ]/g, '');
        if (s != parseFloat(s))
            return 'not a number';
        var x = s.indexOf('.');
        if (x == -1)
            x = s.length;
        if (x > 15)
            return 'too big';
        var n = s.split('');
        var str = '';
        var sk = 0;
        for (var i = 0; i < x; i++) {
            if ((x - i) % 3 == 2) {
                if (n[i] == '1') {
                    str += tn[Number(n[i + 1])] + ' ';
                    i++;
                    sk = 1;
                } else if (n[i] != 0) {
                    str += tw[n[i] - 2] + ' ';
                    sk = 1;
                }
            } else if (n[i] != 0) { // 0235
                str += dg[n[i]] + ' ';
                if ((x - i) % 3 == 0)
                    str += 'hundred ';
                sk = 1;
            }
            if ((x - i) % 3 == 1) {
                if (sk)
                    str += th[(x - i - 1) / 3] + ' ';
                sk = 0;
            }
        }

        if (x != s.length) {
            var y = s.length;
            str += 'point ';
            for (var i = x + 1; i < y; i++)
                str += dg[n[i]] + ' ';
        }
        return str.replace(/\s+/g, ' ');
    }
</script>
