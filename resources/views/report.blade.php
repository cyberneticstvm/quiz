@php
$chart = {
        type: 'bar',
        data: {
         labels: [2012, 2013, 2014, 2015, 2016],
         datasets: [{
            label: 'Raisins', data: [12, 6, 5, 18, 12]}, {
            label: 'Bananas', data: [4, 8, 16, 5, 5]
         }]
        }
};
@endphp
<img src="https://quickchart.io/chart?c={{ urlencode($chart) }}"/>