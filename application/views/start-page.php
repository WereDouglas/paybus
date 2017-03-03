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
                        name: 'Buses',
                        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                    }, {
                        name: 'Cars',
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
                    text: 'Browser market shares at a specific website, 2014'
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