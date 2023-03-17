let menu = document.querySelector('.menu');
let user = document.querySelector('.user_info');

document.querySelector('.fa-bars').onclick = () =>{
	menu.classList.toggle('active');
	user.classList.remove('active');
}
document.querySelector('.fa-user').onclick = () =>{
	user.classList.toggle('active');
	menu.classList.remove('active');
}
window.onscroll = () =>{
	menu.classList.remove('active');
	user.classList.remove('active');

	if (window.scrollY > 10) {
		document.querySelector('.header').classList.add('active');
	}else{
		document.querySelector('.header').classList.remove('active');
	}
}

