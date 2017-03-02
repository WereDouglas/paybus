<?php require_once(APPPATH . 'views/inner-css.php'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" />
<style>
    body {
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        background-color:#FFFFFF;
    }   

</style>
<div class="page-content">
    <div class="row">
        <div class="col-md-12">          
                <section>
                    <?php $months = array(1 => "January", 2 => "February", 3 => "March", 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December"); ?>
                    <div class="row">
                          <div class="col-md-2">
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
                        <div class="col-md-2">
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
                        <div class="col-md-2">
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
                        <div class="col-md-6" style="margin-top:35px;">
                            <button type="button" class="btn btn-info btn-small" id="generate" >generate</button>
                            <input type="button" class="btn btn-info btn-small" onclick="ExportToExcel('datatable')" value="Export to Excel">
                            <input type="button" class="btn btn-info btn-small" onclick="printDiv('printableArea')" value="print" />
                            <input type="button" id="excel" class="btn btn-info btn-small"  value="Excel" />


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
                                    var htmltable = document.getElementById('card');
                                    var html = htmltable.outerHTML;
                                    window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
                                }
                                function printDiv(divName) {
                                    var printContents = document.getElementById(divName).innerHTML;
                                    var originalContents = document.body.innerHTML;

                                    document.body.innerHTML = printContents;

                                    window.print();

                                    document.body.innerHTML = originalContents;
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

            if (year.length > 0) {

                $.post("<?php echo base_url() ?>index.php/payment/daily_report", {month: month, year: year,date:date}
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



</script>

