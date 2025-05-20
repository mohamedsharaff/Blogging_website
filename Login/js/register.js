let inp = document.querySelectorAll('#myinp');
let input = document.querySelectorAll('#input');
let txt = document.querySelector('#txt');

// console.log(inp[0].textContent = 5);

document.querySelector('#txt').addEventListener('input',(event) => {

    let track = console.log(event.target.value);

});

if (txt.value.length > 5) {

    console.log('hello');   
    
}
