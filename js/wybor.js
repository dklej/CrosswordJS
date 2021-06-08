const przyciskJolka = document.querySelector('#pierwszy');
const przyciskHetmanska = document.querySelector('#drugi');
const przyciskPanoramiczna = document.querySelector('#trzeci');
const jol = document.querySelector('#jolka')
const het = document.querySelector('#klasyczna')
const pan = document.querySelector('#panoramiczna')


przyciskJolka.addEventListener('click', function(){
    jol.style.display='block';
    het.style.display='none';
    pan.style.display='none';
})

przyciskHetmanska.addEventListener('click', function(){
    jol.style.display='none';
    het.style.display='block';
    pan.style.display='none';
})

przyciskPanoramiczna.addEventListener('click', function(){
    jol.style.display='none';
    het.style.display='none';
    pan.style.display='block';
})

