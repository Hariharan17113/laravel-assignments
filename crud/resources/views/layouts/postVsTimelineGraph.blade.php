<!DOCTYPE html>
<html>
<body>
<div id="graph2"></div>
</body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var posts =  <?php echo json_encode($posts) ?>;

    Highcharts.chart('graph2', {
        title: {
            text: 'Post Vs Timeline Chart'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Number of New Posts'
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
            name: 'New Posts',
            data: posts
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
</html>
