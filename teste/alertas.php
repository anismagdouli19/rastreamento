<div class="row-fluid">
  <div class="col-md-12">    
    <?php
    mysql_connect("localhost", "root", "horus4321");
    mysql_select_db("tracker");

    $imei = $_POST["nrImeiConsulta"];
    $resBem       = mysql_query("SELECT * FROM bem ORDER BY date DESC");
    $resLocAtual  = mysql_query("SELECT * FROM gprmc ORDER BY date DESC ");

    $ContComSinal = 0;
    $ContSemSinal = 0;
    $ContDesligado = 0;

    $ContCRX = 0;
    $ContST = 0;
    $ContTK = 0;
    $ContH = 0;

/*      echo '<table class="table table-striped table-bordered table table-condensed table-hover">';
        echo '<caption class="cor2">Lista de Bens rastreados</caption>';
        echo '<thead><tr>';
        echo '<th>DATA</th>';
        echo '<th>IMEI</th>';
        echo '<th>NOME</th>';
        echo '<th>MOVIMENTO</th>';
        echo '<th>MOD. RASTREADOR</th>';
        echo '<th>STATUS</th>';
        echo '</tr></thead>';
        echo '<tr>';
*/

    while($dataBem = mysql_fetch_assoc($resBem)) { 
      if($dataBem['movimento'] == 'S')
        $movimento = 'Sim';
      else
        $movimento = 'Não';  
/*
          echo '<td>' . $dataBem['date'] . '</td>';
          echo '<td>' . $dataBem['imei'] . '</td>';
          echo '<td>' . $dataBem['name'] . '</td>';
          echo '<td><span class="badge">' . $movimento . '</span></td>';
          echo '<td>' . $dataBem['modelo_rastreador'] . '</td>';
          echo '<td>' . $dataBem['status_sinal'] . '</td>';
          echo '</tr>';
*/
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

    // DADOS DA ULTIMA LOCALIZAÇÃO
    echo '<table class="table table-bordered table-condensed table-hover">';
    echo '<caption class="cor2 titulo">ULTIMOS DADOS COLETADOS</caption>';
    echo '<thead><tr>';
    echo '<th>DATA</th>';
    echo '<th>IMEI</th>';
    echo '<th>NOME</th>';
    echo '<th>ENDEREÇO</th>';
    echo '<th>LIGADO</th>';
    echo '<th>BATERIA</th>';
    echo '</tr></thead>';
    echo '<tr>';

    while($dataLocAtual = mysql_fetch_assoc($resLocAtual)) {
      if($dataLocAtual['speed'] !== '0')
        $movimento = 'Sim';
      else
        $movimento = 'Não';  

      if($dataLocAtual['ligado'] == 'S'){
        $ligado = 'Sim';
        $clss0 = 'class="success"';
      } else {
        $ligado = 'Não';
        $clss0 = 'class="danger"';
      }


      if ($dataLocAtual['voltagem_bateria'] == '0'){
        $bateria = 'Desligado';
        $clss1 = 'class="danger"';
      }else if ($dataLocAtual['voltagem_bateria'] == '1'){
        $bateria = 'Baixa';
        $clss1 = 'class="warning"';
      }else if ($dataLocAtual['voltagem_bateria'] == '2'){
        $bateria = 'Atenção';
        $clss1 = 'success';
      }else if ($dataLocAtual['voltagem_bateria'] == '3'){
        $bateria = 'Normal';
        $clss1 = 'class="success"';
      }
        
      echo '<td class="success">' . $dataLocAtual['date'] . '</td>';
      echo '<td class="success">' . $dataLocAtual['imei'] . '</td>';
      echo '<td class="success">' . $dataLocAtual['name'] . '</td>';
      echo '<td class="success">' . $dataLocAtual['address'] . '</td>';
      echo '<td '. $clss0 . '>' . $ligado . '</span></td>';
      echo '<td '. $clss1 . '>' . $bateria . '</span></td>';
      echo '</tr>';

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
  </div>
</div>