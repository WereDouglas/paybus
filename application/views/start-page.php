<link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME ICONS STYLES-->
<link href="<?= base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
<?php
 $jan = 0;$feb = 0;    $mar = 0;    $apr = 0;    $may = 0;    $jun = 0;$jul = 0;$aug = 0;$sept = 0;$oct = 0;$nov = 0;$dec = 0;
  
if (is_array($payments_year) && count($payments_year)) {
     foreach ($payments_year as $loop) {

        if (date("m", strtotime($loop->date)) == "1") {
             $jan = $jan + 1;
        }
         if (date("m", strtotime($loop->date)) == "2") {
             $feb = $feb + 1;
        }
        if (date("m", strtotime($loop->date)) == "3") {
            $mar = $mar + 1;
        }
         if (date("m", strtotime($loop->date)) == "4") {
             $apr = $apr + 1;
        }
         if (date("m", strtotime($loop->date)) == "5") {
             $may = $may + 1;
        }
         if (date("m", strtotime($loop->date)) == "6") {
             $jun = $jun + 1;
        }
         if (date("m", strtotime($loop->date)) == "7") {
             $jul = $jul + 1;
        }
         if (date("m", strtotime($loop->date)) == "8") {
             $aug = $aug + 1;
        }
         if (date("m", strtotime($loop->date)) == "9") {
             $sep = $sep + 1;
        }
         if (date("m", strtotime($loop->date)) == "10") {
             $oct = $oct + 1;
        }
         if (date("m", strtotime($loop->date)) == "11") {
             $nov = $jan + 1;
        }        
         if (date("m", strtotime($loop->date)) == "12") {
             $dec = $dec + 1;
        }

       
    }
    // echo $march.'<br>';
      //  echo $jan.'<br>';
}
?>  
<head>
    <script type="text/javascript" src="<?= base_url(); ?>js/jquery.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#container').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Monthly Ticket sales'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Tickets (No)'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                        name: '<?php echo $this->session->userdata('company'); ?>',
                        data: [<?php echo $jan;?>, <?php echo $feb;?>, <?php echo $mar;?>, <?php echo $apr;?>, <?php echo $may;?>,<?php echo $jun;?>,<?php echo $jul;?>, <?php echo $aug;?>,<?php echo $sept;?>, <?php echo $oct;?>,<?php echo $nov;?>, <?php echo $dec;?>]
                    }, {
                        name: 'Average ticket sales',
                        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                    }]
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#container2').highcharts({
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: 'Ticket Sale Count Distribution'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Browser share',
                        data: [
                            ['Firefox', 45.0],
                            ['IE', 26.8],
                            {
                                name: 'Chrome',
                                y: 12.8,
                                sliced: true,
                                selected: true
                            },
                            ['Safari', 8.5],
                            ['Opera', 6.2],
                            ['Others', 0.7]
                        ]
                    }]
            });
        });
    </script>


</head>
<body>
    <div class="page-content">
       
            <div class="row alert">
                <div class="col-md-12">
                    <?php
                    if (is_array($sum_today) && count($sum_today)) {
                        foreach ($sum_today as $loop) {
                            $total_today = $loop->cost;
                        }
                    }
                    ?>  

                    <h4 class="page-head-line"><font class="orange">Welcome</font> <?php echo $this->session->userdata('role'); ?>  <?php echo $this->session->userdata('name'); ?></h4>
                    <a href="#" class="btn btn-default"><?php echo 'ROUTES ' . ' ' . count($routes); ?></a>
                    <a href="#" class="btn btn-primary"><?php echo 'BUSES ' . count($buses); ?></a>
                    <a href="#" class="btn btn-success"><?php echo 'PAYMENTS ' . count($payments_today); ?></a>
                    <a href="#" class="btn btn-info"><?php echo 'DRIVERS ' . count($drivers); ?></a>
                    <a href="#" class="btn btn-warning"><?php echo 'TOTAL TODAY ' . number_format($total_today); ?></a>
                    <hr>  
                      </div>
                    <div class="col-md-12">

                        <div class="alert alert-info">
                            <strong>COMPANY:</strong><?php echo $this->session->userdata('company'); ?> 
                            Email: <?php echo $this->session->userdata('email'); ?> 

                            Permission: <?php echo $this->session->userdata('permission'); ?> 
                        </div>

                    </div>


                </div>
          

            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

    <script src="<?= base_url(); ?>js/highcharts.js"></script>
    <script src="<?= base_url(); ?>js/modules/exporting.js"></script>
    <script src="<?= base_url(); ?>js/highcharts-3d.js"></script>
    <div class="row">
        <div class="col-md-6">
            <div id="container" style="min-width: 210px; height: 400px; margin: 0 auto">

            </div>

        </div>
        <div class="col-md-6">
            <div id="container2" style="min-width: 210px; height: 400px; margin: 0 auto">

            </div>

        </div>
    </div>

</body>
</html>