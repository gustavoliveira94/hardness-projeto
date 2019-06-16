<?php
include '../mpdf60/mpdf.php';
include '../classes/produtos.class.php';
include '../classes/venda.class.php';

$html = "<h2 style='font-family: Helvetica; width: 100%; text-align: center'>Produtos mais vendidos</h2>";
$v = $venda->getItemVendaQtd();
$html = $html . "
            <table style='width: 100%; background-color: #ccc; font-family: Helvetica;'>
                <thead>
                  <tr>
                    <th>ID Produto</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                  </tr>
                </thead>";
foreach ($v as $index => $vendas) {
    $p = $produto->getProdutosID($vendas[0]);
    ?>
    <?php
    $html = $html . "
                <tbody>
                  <tr>
                    <td style='text-align: center;'>{$vendas[0]}</td>
                    <td style='text-align: center;'>{$p[2]}</td>
                    <td style='text-align: center; padding: 5px 0;'>{$vendas[1]}</td>
                  </tr>
                </tbody>";
}
?>
    <?php
    $html = $html .
    "</table>";

   $mpdf = new mPDF();
   $mpdf->SetDisplayMode('fullpage');
   $mpdf->WriteHTML( $html);
   $mpdf->Output();

  exit;