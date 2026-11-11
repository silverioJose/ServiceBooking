const agendamento = {
    servico: null,
    data: null,
    horario: null,
    cliente: ''
};

function renderizarCardPedido() {
    const servico = agendamento.servico;
    if (!servico) return;

    const pedidos = document.getElementById('pedido-itens');
    pedidos.innerHTML = '';

    const item = document.createElement('div');
    item.classList.add('service-grid');
    item.classList.add('service-item');

    const nome = document.createElement('h4');
    nome.textContent = servico.nome;
    item.appendChild(nome);

    const info = document.createElement('p');
    const precoFormatado = Number(servico.preco).toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });
    const tempoTexto = servico.tempo > 0 ? `${servico.tempo} min` : 'Sob consulta';

    info.textContent = `${precoFormatado}\n${tempoTexto}`;
    item.appendChild(info);

    if (agendamento.data) {
        const [a, m, d] = agendamento.data.split('-');
        const dataEl = document.createElement('p');
        dataEl.textContent = `${d}/${m}/${a}`;
        item.appendChild(dataEl);
    }

    if (agendamento.horario) {
        const horarioEl = document.createElement('p');
        horarioEl.textContent = agendamento.horario;
        item.appendChild(horarioEl);
    }

    const botaoAgendar = document.getElementById('pedido-btn');
    botaoAgendar.innerHTML='';

    const button = document.createElement('button');
    button.textContent = 'Continuar';
    button.classList.add('btn-primary');
    //link com mensagem whatsapp formatada
    const url = `https://wa.me/55NUMERO?text=${encodeURIComponent(montarMensagem())}`;
    button.addEventListener('click', function() {
        window.open(url, '_blank');
    });
    botaoAgendar.appendChild(button);
    
    pedidos.appendChild(item);
    atualizarPreview()
}

// botao reservar em cada servico, usado para levar adquirir os dados
document.querySelector('.services').addEventListener('click', function (event) {
    const botao = event.target.closest('.btn-book');
    if (!botao) return; // clicou em outra coisa, ignora

    agendamento.servico = {
        id: botao.dataset.id,
        nome: botao.dataset.nome,
        preco: Number(botao.dataset.preco),
        tempo: Number(botao.dataset.tempo)
    };

    renderizarCardPedido();
});

// click dos dias do calendario, usado para definir data do agendamento
document.getElementById('calendario-corpo').addEventListener('click', function (event) {
    const td = event.target.closest('td');
    if (!td) return;

    if (td.classList.contains('vazio') || td.classList.contains('domingo') || td.classList.contains('passado')) return;

    // css para exibição do dia marcado atual
    const anterior = document.querySelector('.selecionado');
    if (anterior) anterior.classList.remove('selecionado');
    td.classList.add('selecionado');

    agendamento.data = td.dataset.data;
    renderizarCardPedido();
});

// click dos horarios
document.getElementById('horarios').addEventListener('click', function(event) {
    const p = event.target.closest('p');
    if (!p) return;

    agendamento.horario = p.dataset.horario;
    renderizarCardPedido();
})
   

// funcao para montagem da mensagem a ser enviada pelo whatsapp
function montarMensagem() {
    const { servico, data, horario, cliente}  = agendamento;
    if (!servico) return '';

    let msg = `Olá! Gostaria de agendar:\n`;
    msg += `Serviço: ${servico.nome}\n`;

    if (!cliente) msg += `Nome: Teste\n`;

    if (data) {
        const [a, m, d] = data.split('-');
        msg += `Data: ${d}/${m}/${a}\n`;
    }

    if (horario) {
        msg += `Horario: ${horario}`;
    }

    return msg;
}

// funcao para pré exibição da mensagem
function atualizarPreview() {
    document.getElementById('preview-whatsapp').textContent = montarMensagem();
}

