<!DOCTYPE html>
<html>
<body>
<div id="container"></div>
</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var datas =  <?php echo json_encode($datas) ?>;

    Highcharts.chart('container', {
        title: {
            text: 'User Vs Timeline Chart'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Number of New Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Users',
            data: datas
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
<div>@include('layouts.postVsTimelineGraph')</div>
</html>
