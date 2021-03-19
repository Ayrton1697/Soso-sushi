//QTY BUTTONS
let btn_less = document.querySelectorAll('.less-qty')

for(let i = 0; i<btn_less.length; i++){
    
    btn_less[i].setAttribute('disabled', 'disabled')
}
var valueCount;
let btn_more = document.querySelectorAll('.add-qty');
let qty = document.querySelectorAll('.qty-input');

for(let i = 0; i<btn_more.length; i++){
    btn_more[i].addEventListener('click', function(){

        qty[i].value++
        if(qty[i].value > 1){
            btn_less[i].removeAttribute('disabled');
            
        }
    });
}

for(let i = 0; i<btn_less.length; i++){
btn_less[i].addEventListener('click', function(){

    qty[i].value--;
    if(qty[i].value == 0){
       btn_less[i].setAttribute('disabled', 'disabled')
        
    }
  });
}