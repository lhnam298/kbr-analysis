<canvas id="myChart1" style="max-height: 800px;"></canvas>
<canvas id="myChart2" style="max-height: 800px;"></canvas>

<script>
var ctx = document.getElementById("myChart1");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($label); ?>,
        datasets: [
          {
            yAxisID: 'posts-num',
            label: '投稿数',
            type: 'bar',
            data: <?php echo json_encode($count); ?>,
            backgroundColor: '#3e95cd',
          },
          {
            yAxisID: 'posts-num',
            label: '投稿数（期間累計）',
            type: 'line',
            fill: false,
            data: <?php echo json_encode($sum); ?>,
            backgroundColor: '#8e5ea2',
            borderColor: '#8e5ea2',
            options: {
                scales: {
                    yAxisID: [{
                        ticks: {
                            display: false
                        }
                    }]
                },
            },
        }]
    },
    options: {
        scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero:true
                },
                position: 'left',
                id: 'posts-num',
                scaleLabel: { display: true, labelString: '投稿数' }
              }
            ]
        },
        legend: { position: 'bottom'},
        tooltips: {
          enabled: false
        },
        events: false,
        animation: {
          onComplete: function () {
            var ctx = this.chart.ctx;
            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, 'normal', Chart.defaults.global.defaultFontFamily);
            ctx.fillStyle = this.chart.config.options.defaultFontColor;
            ctx.textAlign = 'center';
            ctx.textBaseline = 'bottom';
            this.data.datasets.forEach(function (dataset) {
              for (var i = 0; i < dataset.data.length; i++) {
                if (dataset.type === 'bar') continue;
                var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model;
                ctx.fillText(dataset.data[i], model.x, model.y - 5);
              }
            });
          }
        }
    }
});
</script>

<script>
var ctx = document.getElementById("myChart2");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($label); ?>,
        datasets: [
          {
            label: '投稿数',
            yAxisID: 'post-num',
            data: <?php echo json_encode($count); ?>,
            backgroundColor: '#8e5ea2',
          },
          {
            label: 'いいね数（平均）',
            yAxisID: 'like-num',
            data: <?php echo json_encode($avg); ?>,
            backgroundColor: '#3e95cd',
          }
        ]
    },
    options: {
        scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero:true
                },
                position: 'left',
                id: 'post-num',
                scaleLabel: { display: true, labelString: '投稿数' },
                gridLines: {
                  display:false
                }
              },
              {
                ticks: {
                  beginAtZero:true
                },
                position: 'right',
                id: 'like-num',
                scaleLabel: { display: true, labelString: 'いいね数' },
                gridLines: {
                  display:false
                }
              }
            ]
        },
        legend: { position: 'bottom' },
        tooltips: {
          enabled: false
        },
        events: false,
        animation: {
          onComplete: function () {
            var ctx = this.chart.ctx;
            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, 'normal', Chart.defaults.global.defaultFontFamily);
            ctx.fillStyle = this.chart.config.options.defaultFontColor;
            ctx.textAlign = 'center';
            ctx.textBaseline = 'bottom';
            this.data.datasets.forEach(function (dataset) {
              for (var i = 0; i < dataset.data.length; i++) {
                var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model;
                ctx.fillText(dataset.data[i], model.x, model.y - 5);
              }
            });
          }
        }
    }
});
</script>
