<?php require_once(APPPATH . 'views/inner-css.php'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" />
<style>
    body {
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 12px;
        background-color:#FFFFFF;
    }   

</style>
<div class="page-content">
    <div class="row">
        <div class="col-md-12">          
            <section>

                <?php $months = array(1 => "January", 2 => "February", 3 => "March", 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December"); ?>
                <div class="row">
                    <?php  if ($this->session->userdata('sessionID') == "admin")  { ?>
                        <div class="col-md-3" style="margin-top:3px;">
                            <label>Company</label>
                            <div class=" form-group">
                                <input class="easyui-combobox form-control" name="companyID" id="companyID"  data-options="
                                       url:'<?php echo base_url() ?>index.php/company/lists',
                                       method:'get',
                                       valueField:'id',
                                       textField:'name',
                                       multiple:false,
                                       panelHeight:'auto'
                                       ">
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-md-3">
                        <div class=" form-group">
                            <label>Day</label>
                            <select class="form-control"  name="date" id="date" >
                                <option value=""></option>
                                <?php
                                for ($m = 1; $m <= 32; $m++)
                                    echo "<option value='$m'>" . $m . "</option>"
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" form-group">
                            <label>Month</label>
                            <select class="form-control"  name="month" id="month" >
                                <option value=""></option>
                                <?php
                                for ($m = 1; $m <= 12; $m++)
                                    echo "<option value='$m'>" . $months[$m] . "</option>"
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" form-group">
                            <label>Year</label>
                            <select class="form-control" name="year" id="year" >
                                <?php
                                for ($y = date('Y'); $y >= 1902; $y--)
                                    echo "<option value='$y'>$y</option>"
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top:5px;">
                        <button type="button" class="btn btn-info btn-small" id="generate" >generate</button>
                        <input type="button" name="exportExcel" id="exportExcel" onclick="ExportToExcel('dynamic-table')" value="Export to Excel">
                        <input type="button" class="btn btn-default  printdiv-btn btn-primary icon-ok" value="print" />

                    </div>
                </div>


            </section>

            <h3 class="content-header"><font class="blue">Daily reports</font></h3>
            <div class="table-responsive scroll">
                <span id="loading_card" name ="loading_card"><img src="<?= base_url(); ?>images/loading.gif" alt="loading............" /></span>


            </div><!--/table-responsive-->
        </div><!--/block-web--> 
    </div><!--/col-md-12--> 
</div><!--/row-->           
</div><!--/page-content end--> 

<!-- /sidebar chats -->  
<?php require_once(APPPATH . 'views/inner-js.php'); ?>
<script src="<?= base_url(); ?>js/table2excel.js"></script>

<script type="text/javascript">
                            function ExportToExcel(datatable) {
                                var month = $("#month").val();
                                var year = $("#year").val();
                                var date = $("#date").val();
                                var companyID = $("input[name=companyID]").val();

                                var htmltable = document.getElementById('dynamic-table');
                                var html = htmltable.outerHTML;
                                window.open('data:application/vnd.ms-excel,' + ';filename=' + month + ' ' + year + '.xlsx;' + encodeURIComponent(html));
                                var result = "data:application/vnd.ms-excel,";
                                this.href = result;
                                this.download = month + ".xls";
                                return true;
                            }


</script>


<script type="text/javascript">
    $(document).ready(function ()
    {


        $('#loading_card').hide();
        $("#generate").on("click", function (e) {

            $('#loading_card').show();

            var month = $("#month").val();
            var year = $("#year").val();
            var date = $("#date").val();
            var companyID = $("input[name=companyID]").val();

            if (year.length > 0) {

                $.post("<?php echo base_url() ?>index.php/payment/daily_report", {month: month, year: year, date: date, companyID: companyID}
                , function (response) {
                    //#emailInfo is a span which will show you message

                    $('#loading_card').hide();
                    setTimeout(finishAjax('loading_card', escape(response)), 200);

                }).fail(function (e) {
                    console.log(e);
                }); //end change
            } else {
                alert("Please insert missing information");

                $('#loading_card').hide();
            }

            function finishAjax(id, response) {
                $('#' + id).html(unescape(response));
                $('#' + id).fadeIn();
            }
        })




    });
    $(document).on('click', '.printdiv-btn', function (e) {
        e.preventDefault();

        printData();
    });
    function printData()
    {
        var divToPrint = document.getElementById("dynamic-table");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }


</script>

