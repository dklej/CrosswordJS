const pass = document.querySelector('#password');
const subPass = document.querySelector('#confirm_password');
const span1 = document.querySelector('#span1');
const span2 = document.querySelector('#span2');
const letters = /[a-z]/i;
const numbers = /[0-9]/;
const minValue = 7;

// zrobić funkcję która sprawdzi czy haslo ma 8 znaków oraz wyświetli w span1 komunikat jeśli 
// ma mniej. napisać funkcję która sprawdzi czy hasła są takie same, jeśli nie to wyświetli 
// komunikat.

const checkPassword = () => {
    if(pass.value.length > minValue && pass.value.match(letters) && pass.value.match(numbers)){
        span1.innerHTML = 'Twoje hasło spełnia wymagania!'
        span1.style.background = 'lime';
    }
    else{
        span1.innerHTML = 'Hasło powinno zawierać przynajmniej 8 znaków w tym cyfry i litery!'
        span1.style.background = 'indianred';
        span1.style.color = 'black';
    }
}

pass.addEventListener("keyup", function(){
    if(pass.value !==''){
        checkPassword();
    }
})

subPass.addEventListener('keyup', function(){
    if(pass.value === subPass.value){
        span2.innerHTML = 'Twoje hasła są takie same!'
        span2.style.background = 'lime';
    }
    else{
        span2.innerHTML = 'Hasła nie są takie same!'
        span2.style.background = 'indianred';
        span2.style.color = 'black';
    }
})