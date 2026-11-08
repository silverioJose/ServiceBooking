const meses = [
        'Janeiro', 'Fevereiro', 'Março', 'Abril', 
        'Maio', 'Junho', 'Julho', 'Agosto', 
        'Setembro', 'Outubro', 'Novembro', 'Dezembro'
    ];

function renderizar(mes, ano) {
    const hojeHoraZerada = new Date(new Date().setHours(0, 0, 0, 0));
    const primeiroDia = new Date(ano, mes, 1).getDay();
    const ultimoDia = new Date(ano, mes + 1, 0).getDate();

    document.getElementById('titulo-mes').textContent = meses[mes] + ' - ' + ano;

    const corpo = document.getElementById('calendario-corpo');
    corpo.innerHTML = '';

    let linha = document.createElement('tr');
    let celulas = 0;

    for (let i = 0; i < primeiroDia; i++) {
        const td = document.createElement('td');
        td.className = 'vazio';
        linha.appendChild(td);
        celulas++;
    }

    // dias
    for (let dia = 1; dia <= ultimoDia; dia++) {
        if (celulas === 7) {
            corpo.appendChild(linha);
            linha = document.createElement('tr');
            celulas = 0;
        }

        const td = document.createElement('td');
        td.textContent = dia;
        linha.appendChild(td);
        celulas++;

        const dataCelula = new Date(ano, mes, dia);

        if (dataCelula < hojeHoraZerada) {
            td.classList.add('passado');
        }

        if (hojeHoraZerada.getTime() === dataCelula.getTime()) {
            td.classList.add('dia-atual')
        }

        if (celulas === 1) {
            td.classList.add('domingo');
        }

        td.dataset.data = `${ano}-${String(mes + 1).padStart(2, '0')}-${String(dia).padStart(2, '0')}`;

    }
    corpo.appendChild(linha);
}

const hoje = new Date();
let mesExibido = hoje.getMonth();
let anoExibido = hoje.getFullYear();

renderizar(mesExibido, anoExibido);

function proximoMes() {
    mesExibido++;
    if (mesExibido > 11) {
        mesExibido = 0;
        anoExibido++;
    }
    renderizar(mesExibido, anoExibido);
}

function mesAnterior() {
    mesExibido--;
    if (mesExibido < 0) {
        mesExibido = 11;
        anoExibido--;
    }
    renderizar(mesExibido, anoExibido);
}



document.getElementById('btn-proximo').addEventListener('click', proximoMes);
document.getElementById('btn-anterior').addEventListener('click', mesAnterior);