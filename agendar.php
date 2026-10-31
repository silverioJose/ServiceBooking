<?php 
    $pagina = "Agvendar";

    date_default_timezone_set('America/Sao_Paulo');

    $diaHoje  = (int)date('d');
    $mesAtual = (int)date('m');
    $anoAtual = (int)date('Y');

    $primeiroDiaTimestamp = mktime(0, 0, 0, $mesAtual, 1, $anoAtual);
    $ultimoDia   = date('t', $primeiroDiaTimestamp);
    $diaDaSemana = date('w', $primeiroDiaTimestamp); // 0 (Dom) a 6 (Sáb)

    $meses = [
        1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
        5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
        9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
    ];

    include_once __DIR__ . '/src/Layouts/header.php'
?>

    <h2 class="agendamento-titulo">Selecione uma data para agendamento</h2>

    <table class="calendario">

        <h3 class="mes"><?= $meses[$mesAtual] ?></h3>
        
        <thead>
            <tr>
                <th>Dom</th>
                <th>Seg</th>
                <th>Ter</th>
                <th>Qua</th>
                <th>Qui</th>
                <th>Sex</th>
                <th>Sáb</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            // Espaços vazios antes do dia 1
            for ($i = 0; $i < $diaDaSemana; $i++) {
                echo '<td class="vazio">&nbsp;</td>';
            }

            $semana = $diaDaSemana;

            // Renderiza os dias do mês
            for ($dia = 1; $dia <= $ultimoDia; $dia++) {
                if ($semana > 6) {
                    $semana = 0;
                    echo '</tr><tr>';
                }

                //yyy-mm-dd
                $dataCompleta = sprintf('%04d-%02d-%02d', $anoAtual, $mesAtual, $dia);

                $eHoje = ($dia==$diaHoje); // é hoje?
                $eDomingo = ($semana == 0); // é domingo?
                $ePassado = ($dia < $diaHoje);

                $classes = [];
                if($eHoje) $classes[] = 'dia-atual';
                if($eDomingo) $classes[] = 'domingo';
                if($ePassado) $classes[] = 'passado';
                
                $classCss = !empty($classes) ? 'class="' . implode(' ', $classes) . '"' : '';

                echo '<td data-data="' . $dataCompleta . '" ' . $classCss . '>' . $dia . '</td>';

                $semana++;
            }

            // Completa a última semana
            while ($semana > 0 && $semana <= 6) {
                echo '<td class="vazio">&nbsp;</td>';
                $semana++;
            }
            ?>
            </tr>
        </tbody>
    </table>
        
<?php include_once __DIR__ . '/src/Layouts/footer.php' ?>