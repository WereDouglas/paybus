
         <?php require_once(APPPATH . 'views/header-page.php'); ?>
        <!-- /. SIDEBAR MENU (navbar-side) -->
        
           <!--\\\\\\\ contentpanel start\\\\\\-->
            <div id="page-wrapper" class="page-wrapper-cls">
                        <script language="javascript" type="text/javascript">
                            function resizeIframe(obj) {
                                obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
                                // obj.style.width = obj.contentWindow.document.body.scrollHeight + 'px';
                            }
                        </script>
                        <iframe id="frame" name="frame" frameborder="no" border="0" onload="resizeIframe(this)" scrolling="no"  style="padding: 10px; min-height:600px;" width="100%" class="span12" src="<?php echo base_url() . "index.php/home/start"; ?>"> </iframe>         


    
        </div>
    <!-- /. WRAPPER  -->
    <footer >
        &copy; 2017 Vuga-I | By : <a href="" target="_blank">Vuga-I</a>
    </footer>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?= base_url(); ?>assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?= base_url(); ?>assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?= base_url(); ?>assets/js/custom.js"></script>


</body>
</html>
