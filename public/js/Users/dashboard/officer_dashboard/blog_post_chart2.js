var ctx2 = document.getElementById('doughnut').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Innovation', 'Knowledge', 'New-technology', 'Production'],

        datasets: [{
            label: 'Users',
            data: [21, 42, 68, 45],
            backgroundColor: [

                '#deeaee',
                '#9bf4d5',
                '#346357',
                '#c94c4c'

            ],
            borderColor: [

                '#deeaee',
                '#9bf4d5',
                '#346357',
                '#c94c4c'
            ],
            borderWidth: 1
        }]

    },
    options: {
        responsive: true
    }

});

$(window).resize(function(){
  var width = $('#doughnut').width();
  var height = $('#doughnut').height();
  myChart.canvas.width = width;
  myChart.canvas.height = height;
  myChart.resize();
});