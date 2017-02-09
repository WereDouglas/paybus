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
        <div class="col-md-12">
            <div class="block-web">
                <div class="header">
                    <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                       <h3 class="content-header">Payments</h3>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <div class="alert alert-info" id="status"></div>
                <div class="porlets-content">


                    <div class="table-responsive scroll">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                     <th>Contact</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th class="hidden-phone">Bus</th>
                                    <th class="hidden-phone">Seat</th>
                                    <th class="hidden-phone">Cost</th>                                   
                                    <th class="hidden-phone">Route</th>
                                     <th class="hidden-phone">Bar code</th> 
                                    <th class="hidden-phone">Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (is_array($clients) && count($clients)) {
                                    foreach ($clients as $loop) {
                                        ?>  
                                        <tr class="odd">
                                            <td>
                                                <?php echo $loop->id; ?>
                                            </td>
                                            <td>
                                                <?php echo $loop->date; ?>
                                            </td>
                                             <td id="contact:<?php echo $loop->id; ?>" contenteditable="true">
                                                <?php echo $loop->contact; ?>
                                            </td>
                                            <td id="name:<?php echo $loop->id; ?>" contenteditable="true">
                                                <?php echo $loop->name; ?>
                                            </td>

                                            <td id="email:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->email; ?></td>
                                            <td>
                                                <?php echo $loop->bus; ?>
                                            </td>
                                            <td id="seat:<?php echo $loop->id; ?>" contenteditable="true">
                                                <?php echo $loop->seat; ?>
                                            </td>
                                            <td ><?php echo $loop->cost; ?></td>
                                              <td ><?php echo $loop->route; ?></td> 
                                               <td ><?php echo $loop->barcode; ?></td> 
                                            <td class="edit_td">
                                                <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/payment/delete/" . $loop->id; ?>"><li class="fa fa-trash-o">Delete</li></a>

                                            </td> 

                                        </tr>
                                        <?php
                                    }
                                }
                                ?>

                            </tbody>

                        </table>
                    </div><!--/table-responsive-->
                </div><!--/porlets-content-->


            </div><!--/block-web--> 
        </div><!--/col-md-12--> 
    </div><!--/row-->           
</div><!--/page-content end--> 

<!-- /sidebar chats -->  
<?php require_once(APPPATH . 'views/inner-js.php'); ?>
<script>
    $(document).ready(function () {
        $("#status").hide();
        $(function () {
            //acknowledgement message
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function () {
                var field_id = $(this).attr("id");
                var value = $(this).text();
                $.post('<?php echo base_url() . "index.php/payment/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {
                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });

        });
    });

</script>
