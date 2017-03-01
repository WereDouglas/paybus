<div id="page-wrapper" class="page-wrapper-cls">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">WELCOME TO PAY BUS</h1>
                Username:<span class=" blue_border"> <?php echo $this->session->userdata('name'); ?></span><br>
                Company: <?php echo $this->session->userdata('company'); ?><br>
                Email: <?php echo $this->session->userdata('email'); ?><br>
                Role: <?php echo $this->session->userdata('role'); ?><br>
                Permission: <?php echo $this->session->userdata('permission'); ?><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">

                </div>
            </div>
        </div>

        <div class="row">

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>