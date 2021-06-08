const haslo = document.querySelector('#wprowadzanieHaslo');
const tablicaHasel = ['MAŁYSZ', 'STUDENT', 'LAMPKA', 'DESKA', 'BESTIA', 'KURTKA', 'GRANIT'];
const przyciskSprawdzHaslo = document.querySelector('#przyciskSzukaj'); //zrobić funkcję znajdz haslo i dopiac do addEventlistener
const przyciskRozwiazanie = document.querySelector('#przyciskRozwiazanie');
const zlaOdpowiedz = document.querySelector('.jesliZle');
const rozwiazanie = document.querySelector('#wprowadzanieRozwiazania');


haslo.addEventListener('click', function (){
    haslo.value = '';
})

przyciskSprawdzHaslo.addEventListener('click',uzupelnijHaslo = () => {
    if(haslo.value.toUpperCase() === 'MAŁYSZ'){
        document.querySelector('.j_1').innerHTML = 'M';
        document.querySelector('.j_2').innerHTML = 'A';
        document.querySelector('.j_3').innerHTML = 'Ł';
        document.querySelector('.j_4').innerHTML = 'Y';
        document.querySelector('.j_5').innerHTML = 'S';
        document.querySelector('.j_6').innerHTML = 'Z';
        haslo.value = '';
    }
    else if(haslo.value.toUpperCase() === 'STUDENT'){
        document.querySelector('.d_1').innerHTML = 'S';
        document.querySelector('.d_2').innerHTML = 'T';
        document.querySelector('.d_3').innerHTML = 'U';
        document.querySelector('.d_4').innerHTML = 'D';
        document.querySelector('.d_5').innerHTML = 'E';
        document.querySelector('.d_6').innerHTML = 'N';
        document.querySelector('.d_7').innerHTML = 'T';
        haslo.value = '';
    }
    else if(haslo.value.toUpperCase() === 'LAMPKA'){
        document.querySelector('.t_1').innerHTML = 'L';
        document.querySelector('.t_2').innerHTML = 'A';
        document.querySelector('.t_3').innerHTML = 'M';
        document.querySelector('.t_4').innerHTML = 'P';
        document.querySelector('.t_5').innerHTML = 'K';
        document.querySelector('.t_6').innerHTML = 'A';
        haslo.value = '';
    }
    else if(haslo.value.toUpperCase() === 'DESKA'){
        document.querySelector('.c_1').innerHTML = 'D';
        document.querySelector('.c_2').innerHTML = 'E';
        document.querySelector('.c_3').innerHTML = 'S';
        document.querySelector('.c_4').innerHTML = 'K';
        document.querySelector('.c_5').innerHTML = 'A';
        haslo.value = '';
    }
    else if(haslo.value.toUpperCase() === 'BESTIA'){
        document.querySelector('.p_1').innerHTML = 'B';
        document.querySelector('.p_2').innerHTML = 'E';
        document.querySelector('.p_3').innerHTML = 'S';
        document.querySelector('.p_4').innerHTML = 'T';
        document.querySelector('.p_5').innerHTML = 'I';
        document.querySelector('.p_6').innerHTML = 'A';
        haslo.value = '';
    }
    else if(haslo.value.toUpperCase() === 'KURTKA'){
        document.querySelector('.sz_1').innerHTML = 'K';
        document.querySelector('.sz_2').innerHTML = 'U';
        document.querySelector('.sz_3').innerHTML = 'R';
        document.querySelector('.sz_4').innerHTML = 'T';
        document.querySelector('.sz_5').innerHTML = 'K';
        document.querySelector('.sz_6').innerHTML = 'A';
        haslo.value = '';
    }
    else if(haslo.value.toUpperCase() === 'GRANIT'){
        document.querySelector('.s_1').innerHTML = 'G';
        document.querySelector('.s_2').innerHTML = 'R';
        document.querySelector('.s_3').innerHTML = 'A';
        document.querySelector('.s_4').innerHTML = 'N';
        document.querySelector('.s_5').innerHTML = 'I';
        document.querySelector('.s_6').innerHTML = 'T';
        haslo.value = '';
    }
    else {
        haslo.value = 'Zła odpowiedź! :( '
    }

    
});

rozwiazanie.addEventListener('click', function(){
    rozwiazanie.value = ''
})

przyciskRozwiazanie.addEventListener('click', function(){
    if(rozwiazanie.value.toUpperCase() === 'SEMESTR'){
        alert('GRATULACJE!!! Udało Ci się rozwiązać krzyżówkę!!!')
    }
    else{
        rozwiazanie.value = 'Złe rozwiązanie!'
    }
    
})


