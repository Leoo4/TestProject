<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="description" content="example"/>
    <meta name="author" content="example"/>
    <title>Graficas Calificaciones</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="js/jquery.min.js"></script>
  </head>
  <body>
    <?php 
      include('excelreader.php'); 
      include('exercises.php'); 
    ?>
    <h2>Activity 1</h2>
    <div id="chart1" style="width:100%; height:400px;"></div>
    </br></br>

    <h2>Activity 2</h2>
    <div id="chart2" style="width:100%; height:400px;"></div>
    </br></br>

    <h2>Activity 3</h2>
    <h3>Student with best qualification</h3>
    <h4><?php echo ($dataStudents[$indexBestQualification][0]." ".$dataStudents[$indexBestQualification][1]." ".$dataStudents[$indexBestQualification][2]) ?></h4>
    </br></br>

    <h2>Activity 4</h2>
    <h3>Student with worst qualification</h3>
    <h4><?php echo ($dataStudents[$indexWorstQualification][0]." ".$dataStudents[$indexWorstQualification][1]." ".$dataStudents[$indexWorstQualification][2]) ?></h4>
    </br></br>

    <h2>Activity 5</h2>
    <h3>Average qualification obtained by all students: <?php echo $averageQualification ?></h3>

  </body>
  <script>
    $(document).ready( function () {
     // Here we call the functions that makes the chart for activity 1 and 2.
      Activity1();
      Activity2();
    });
    //function 1: Creates a column chart (bar) with the information obtained from Exercises.php.
    function Activity1() { 
      var myChart = new Highcharts.chart('chart1', {
        chart: {
          type: 'column'
        },
        title: {
          text: 'Qualifications'
        },
        xAxis: {
          categories: [<?php echo $names ?>]
        },
        yAxis: {
          title: {
            text: ''
          }
        },
        series: [{
          name: 'Qualifications Obtained',
          data: [<?php echo join($grades, ',') ?>]
        }]
      });
    }
    //function 2: Creates a line chart with the information obtained from Exercises.php.
    function Activity2(){
      var myChart2 = new Highcharts.chart('chart2', {
        chart: {
          type: 'line'
        },
        title: {
          text: 'Average qualifications'
        },
        subtitle: {
          text: ''
        },
        xAxis: {
          categories: ['Group 1','Group 2','Group 3']
        },
        yAxis: {
          title: {
            text: ''
          }
        },
        series: [{
          name: 'Qualifications Obtained',
          data: [<?php echo $averageGroup1 ?>,<?php echo $averageGroup2 ?>,<?php echo $averageGroup3 ?>]
        }]
      });
    }

  </script>
  </html>