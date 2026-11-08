<?php 
    $pagina = "Agendar";

    include_once __DIR__ . '/src/Layouts/header.php'
?>

    <h2 class="agendamento-titulo">Selecione uma data para agendamento</h2>

    <section class="agendamento">
        <div class="agendamento-col">
            <div class="grid-mes">
                <button class="btn-primary" id="btn-anterior">‹</button>
                <h3 id="titulo-mes" class="mes"></h3>
                <button class="btn-primary" id="btn-proximo">›</button>
            </div>

            <table class="calendario">
                
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
                <tbody id="calendario-corpo"></tbody>
            </table>
        </div>
    </section>
    

    <script src="public/js/calendario.js"></script>
        
<?php include_once __DIR__ . '/src/Layouts/footer.php' ?>