/*=========================================================================================
    File Name: custom-chart.js
    ----------------------------------------------------------------------------------------
    Item Name: Buskey - Consulting Business Template
    Version: 1.0
    Author: Validthemes
    Author URL: http://www.themeforest.net/user/validthemes
==========================================================================================*/

$(function ($) {
  'use strict';

/*====  Line chart for business growth =====*/
var ctx = document.getElementById("lineChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["2002", "2003", "2007", "2012", "2016", "2021"],
        datasets: [{
            label: 'Business Growth',
            data: [3, 5, 12, 8, 11, 28],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(18, 115, 235, 0.5)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(18, 115, 235, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
/*====  End line chart =====*/


});