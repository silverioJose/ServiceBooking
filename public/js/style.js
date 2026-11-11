const temaClaro = {
  '--color-background': '#FAF8F5',
  '--color-card': '#EFE8E1',
  '--color-highlight': '#D4AF37',
  '--color-text': '#3D2E2B'
};

const temaEscuro = {
  '--color-background': '#1A1817',
  '--color-card': '#2A2624',
  '--color-highlight': '#f1750f',
  '--color-text': '#EFE8E1'
};

const fontesPadrao = {
  '--font-primary': "'Petit', sans-serif",
  '--font-secondary': "'Playfair', sans-serif",
  '--font-tertiary': "'Great Vibes', sans-serif"
};

const fontesAlternativa = {
  '--font-primary': "'Inter', sans-serif",
  '--font-secondary': "'Oswald', sans-serif",
  '--font-tertiary': "'Satisfy', sans-serif"
};

function aplicar(tema) {
  const root = document.documentElement;
  Object.keys(tema).forEach(variavel => {
    root.style.setProperty(variavel, tema[variavel]);
  });
}

const btnTema = document.getElementById('btn-tema');
const imgHero = document.getElementById('img-hero');
const heroTitle = document.getElementById('hero-title');
const heroSubtitle = document.getElementById('hero-subtitle');

let barbearia = false;

function tema(escolha) {
  if(escolha === 'barbearia') {
    aplicar(fontesAlternativa);
    aplicar(temaEscuro);
    barbearia = true;
    if (imgHero) imgHero.src = 'public/assets/imgs/barbearia.jpg';
    if (heroTitle) heroTitle.innerHTML = '<span class="highlight">Sua melhor versão</span> você encontra aqui';
    if (heroSubtitle) heroSubtitle.textContent = 'Barba, cabelo e um atendimento de respeito para o seu dia a dia.';
  } else if (escolha === 'salao') {
    aplicar(fontesPadrao);
    aplicar(temaClaro);
    barbearia = false;
    if (imgHero) imgHero.src = 'public/assets/imgs/salon.jpg';
    if (heroTitle) heroTitle.innerHTML = 'Realce sua <br> <span class="highlight">beleza</span> natural';
    if (heroSubtitle) heroSubtitle.textContent = 'Cuidados profissionais em cada detalhe';
  }  
}

if (btnTema) {
  btnTema.addEventListener('click', function (event) {
    if (barbearia) {
      tema('salao');
    } else {
      tema('barbearia');
    }
  });
}

// tema('barbearia');
// tema('salao')