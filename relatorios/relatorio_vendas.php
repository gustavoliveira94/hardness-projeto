<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
<!-- Icones -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
<!-- Fontes -->
<link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">

<?php 
include '../mpdf60/mpdf.php';
include '../classes/produtos.class.php';
include '../classes/venda.class.php';
include '../classes/user.class.php';
?>
<!-- <?php
    $v = $venda->getAllVenda();
    $mes = $venda->getVendaMes(@$_GET['mes']);
    if (!@$_GET['mes']) {
      foreach ($v as $index => $valor) {
        @$total = $valor[3] + $total;
        echo $total;
      }
    } else {
      foreach ($mes as $index => $valor) {
        @$total = $valor[3] + $total;
        echo $total;
      }
    }
    $html = "
    <h2 style='font-family: Helvetica; width: 100%; text-align: center'>Controle de Vendas</h2>
    <table style='font-family: Helvetica; text-align: center'>
<thead>
  <tr>
    <th>Valor Total das Vendas: R$ </th>
    <th>" . number_format(substr(@$total, 0, 5), 2, ',', '.') . "</th>
  </tr>
</thead>
</table>";
    $html = $html .
      "<table style='width: 100%; background-color: #ccc; font-family: Helvetica;'>
        <thead>
          <tr>
            <th>ID Venda</th>
            <th>Data da Venda</th>
            <th>ID Cliente</th>
            <th>Valor Total</th>
          </tr>
        </thead>";
    if (!@$_GET['mes']) {
      foreach ($v as $index => $vendas) {
        $u = $user->getClienteID($vendas[1]);
        $html = $html . "
        <tbody>
          <tr>
            <td style='text-align: center;'>{$vendas[0]}</td>
            <td style='text-align: center;'>{$vendas[1]}</td>
            <td style='text-align: center;'>{$vendas[2]}</td>
            <td style='text-align: center; padding: 5px 0;'>R$" . number_format(substr($vendas[3], 0, 4), 2, ',', '.') . "</td>
          </tr>
        </tbody>";
      }
    } else {
      foreach ($mes as $index => $vendas) {
        $u = $user->getClienteID($vendas[1]);
        $html = $html . "
        <tbody>
          <tr>
            <td style='text-align: center;'>{$vendas[0]}</td>
            <td style='text-align: center;'>{$vendas[1]}</td>
            <td style='text-align: center;'>{$vendas[2]}</td>
            <td style='text-align: center; padding: 5px 0;'>R$" . number_format(substr($vendas[3], 0, 4), 2, ',', '.') . "</td>
          </tr>
        </tbody>";
      }
    }
    ?>
        <?php
        $html = $html .
          "</table>";

        $mpdf = new mPDF();
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        $mpdf->Output();

        exit;