let btn1= document.getElementById('btn1');
let btn2= document.getElementById('btn2');
let focus1= document.getElementById('foc1');
let focus2= document.getElementById('foc2');

function tt()
{
    focus1.classList.remove('hide');
    focus2.classList.add('hide');
    
}

function tt1()
{
    focus2.classList.remove('hide1');
    focus2.classList.remove('hide');
    focus1.classList.add('hide');
}
registerBtn=document.querySelector  ('.js-btn');
registerBtn.addEventListener('click',()=>{
    focus2.classList.remove('hide1');
    focus2.classList.remove('hide');
    focus1.classList.add('hide');

})
