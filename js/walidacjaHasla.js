const pass = document.querySelector('#password');
const subPass = document.querySelector('#confirm_password');
const span1 = document.querySelector('#span1');
const span2 = document.querySelector('#span2');
const btn = document.querySelector('#bb');
const letters = /[a-z]/i;
const numbers = /[0-9]/;
const minValue = 7;

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
        span2.style.color = 'black';
        btn.style.display = 'block';
    }
    else{
        span2.innerHTML = 'Hasła nie są takie same!'
        span2.style.background = 'indianred';
        span2.style.color = 'black';
        btn.style.display = 'none';
    }
})