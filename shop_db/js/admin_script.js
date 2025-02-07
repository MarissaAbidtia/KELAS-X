let navbar = document.querySelector('.header .flex .navbar');
let userBox = document.querySelector('.header .flex .account-box');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active'); 
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   userBox.classList.remove('active');
}
let updateBtn = document.querySelector('#close-update');
let updateForm = document.querySelector('.edit-product-form');

updateBtn.onclick = () => {
   updateForm.style.display = 'none';
   window.location.href = 'admin_products.php';
}