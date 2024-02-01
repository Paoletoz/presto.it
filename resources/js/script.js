//NAVBAR

// let nav = document.getElementById('my-nav');
// window.onscroll = function () { 
//     if (document.body.scrollTop >= 15 || document.documentElement.scrollTop >= 15  ) {
//         nav.classList.add("nav-colored");
//         nav.classList.remove("nav-transparent");
//     } 
//     else {
//         nav.classList.add("nav-transparent");
//         nav.classList.remove("nav-colored");
//     }
// };



//FORM PERSONALIZZATO

let signUpButton = document.querySelector('#signUp');
let signInButton = document.querySelector('#signIn');
let container = document.querySelector('#container');


signUpButton?.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

//? Il punto interrogativo (?) equivale a if(elemento == true) quindi se c'è l'elemento esegue la funzione. 
// if(signUpButton){
// 	signUpButton.addEventListener('click', () => {
// 		container.classList.add("right-panel-active");
// 	});
// }

signInButton?.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

//REVISOR FORM

// let revisorWrapper = document.querySelector('#revisorWrapper');
// let revisorButton = document.querySelector('#revisorButton');
// let revisorForm = document.querySelector('#revisorForm');

// revisorButton?.addEventListener('click', ()=>{
// 	console.log('ciao');
// 	revisorWrapper.classList.add('d-none');
// 	revisorForm.classList.remove('d-none');
// });

//ICONA CATEGORIA SIDEBAR

let icona = document.getElementById('categoriesIcon');
let buttonCategories = document.getElementById('buttonCategories');

buttonCategories?.addEventListener('click',() => {
	icona.classList.toggle('fa-rotate-90');
});

