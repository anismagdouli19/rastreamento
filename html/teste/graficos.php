  <?php
    mysql_connect("localhost", "root", "horus4321");
    mysql_select_db("tracker");

    $imei         = $_POST["nrImeiConsulta"];
    $resBem       = mysql_query("SELECT * FROM bem ORDER BY date DESC");
    $resLocAtual  = mysql_query("SELECT * FROM gprmc ORDER BY date ");

    $ContComSinal   = 0;
    $ContSemSinal   = 0;
    $ContDesligado  = 0;

    $ContCRX  = 0;
    $ContST   = 0;
    $ContTK   = 0;
    $ContH    = 0;

    while($dataBem = mysql_fetch_assoc($resBem)) { 
      if($dataBem['movimento'] == 'S')
        $movimento = 'Sim';
      else
        $movimento = 'Não';  

      if ($dataBem['status_sinal'] == 'R')
        $ContComSinal++;
      else if ($dataBem['status_sinal'] == 'S')
        $ContSemSinal++;
      else if ($dataBem['status_sinal'] == 'D')
        $ContDesligado++;

      if ($dataBem['modelo_rastreador'] == 'crx1')
        $ContCRX++;
      else if ($dataBem['modelo_rastreador'] == 'ST215H')
        $ContST++;
      else if ($dataBem['modelo_rastreador'] == 'tk103')
        $ContTK++;
      else if ($dataBem['modelo_rastreador'] == 'h02')
        $ContH++;
    }      
  ?>

  <div class="cor1 pull-left col-md-4" id="piechart" ></div>
  <div class="cor1 pull-right col-md-4" id="chart_div" ></div>
  <!-- Mensagens e Alertas -->
  <div class="container-fluid">
  <div class="panel panel-default col-md-4">
    <div class="panel-body">
      <table class="table table-condensed table-hover table-striped">
        <caption class="cor2">Status Geral</caption>
        <tr>
          <td><strong>Alerta:</strong></td>
          <td><strong>Normal</strong></td>
          <td><strong>Atenção</strong></td>
          <td><strong>Pane</strong></td>
        </tr>
        <tr>
          <td><strong>Bateria</strong></td>
          <td> 0 </td>
          <td> 0 </td>
          <td> 0 </td>
        </tr>
        <tr>
          <td><strong>Sinal GPS</strong></td>
          <td> 0 </td>
          <td> 0 </td>
          <td> 0 </td>
        </tr>
      </table>
    </div>
  </div>
  </div>

  