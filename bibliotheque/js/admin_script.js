let menu = document.querySelector('.menu');
let user = document.querySelector('.admin_info');

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
}
document.querySelector('#btn').onclick = () =>{
	document.querySelector('.edit-product').style.display ='none';
	window.location.href = 'admin_product.php';
}