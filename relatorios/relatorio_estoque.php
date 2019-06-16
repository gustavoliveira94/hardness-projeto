<?php
include '../mpdf60/mpdf.php';
include '../classes/produtos.class.php';
include '../classes/venda.class.php';

$html = "<h2 style=' font-family: Helvetica; width: 100%; text-align: center'>Controle de Estoque</h2>";
$est = $produto->getEstoque0();
  $html = $html . "<table style='font-family: Helvetica; text-align: center'>
<thead>
  <tr>
    <th>Total de produtos sem estoque: </th>
    <th>{$est}</th>
  </tr>
</thead>
</table>";
  $html = $html . "<table style='width: 100%; background-color: #ccc; font-family: Helvetica;'>
                <thead>
                  <tr>
                    <th>ID Produto</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                  </tr>
                </thead>";
  $e = $produto->getAllEstoque();
  foreach ($e as $index => $estoque) {
    $p = $produto->getProdutosID($estoque[4]);
    $html = $html . "
                <tbody>
                <tr>
                    <td style='text-align: center;'>{$p[0]}</td>
                    <td style='text-align: center;'>{$p[2]}</td>
                    <td style='text-align: center; padding: 5px 0;'>{$estoque[1]}</td>
                  </tr>
                </tbody>";
  }
  $html = $html . "
            </table>";

  $mpdf = new mPDF();
  $mpdf->SetDisplayMode('fullpage');
  $mpdf->WriteHTML($html);
  $mpdf->Output();

  exit;