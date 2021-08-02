<!DOCTYPE html>
<html>
<body>
<div id="graph2"></div>
</body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var datas =  <?php echo json_encode($datas) ?>;
    var posts =  <?php echo json_encode($posts) ?>;
    Highcharts.chart('graph2', {
        title: {
            text: 'Post Vs Timeline Chart'
        },
        xAxis: {
            categories: [2017,2018,2019,2020,2021,2022,2023]
        },
        yAxis: {
            title: {
                text: 'Number of New Posts and Users'
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
        series: [
            {
            name: 'New Users',
            data: datas
            },
            {
                name: 'New posts',
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
