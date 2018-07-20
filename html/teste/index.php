<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="60">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relárorio de Monitoramento</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/tools.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
  </head>
<body>
<div class="container-fluid">
  <div class="row">  <!-- Painel superior -->
    <div>...</div>
    <?php include'graficos.php' ?>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <?php include'alertas.php' ?>  
  </div>
</div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

  <!-- Google Graficos -->
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <!-- Graficos piechart -->
  <script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  google.setOnLoadCallback(drawVisualization);


  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Bens', 'Quantidade'],
      ['Rastreando', <?php echo $ContComSinal ?>],
      ['Desligado',  <?php echo $ContDesligado ?>],
      ['Sem Sinal',  <?php echo $ContSemSinal ?>]
      ]);

    var options = {
      title: 'Bens Rastreados(Status do Sinal)'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }


  function drawVisualization() {
    var data = google.visualization.arrayToDataTable([
      ['Fabricantes', 'TK 103', 'CRX 1', 'H02', 'ST200'],
      ['Modelos',  <?php echo $ContTK ?>, <?php echo $ContCRX ?>, <?php echo $ContH ?>, <?php echo $ContST ?>]
      ]);

    var options = {
      title : 'Rastreadores Cadastrados',
      vAxis: {title: "Quantidade"},
      hAxis: {title: ""},
      seriesType: "bars",
      series: {5: {type: "line"}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }

  </script>
  <!-- Fim Google Graficos -->


  </body>
</html>