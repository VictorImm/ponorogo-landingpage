let front = document.getElementById('ponorogo_front');
let back = document.getElementById('ponorogo_back');
let text = document.getElementById('text');

window.addEventListener('scroll', function() {
    let value = window.scrollY;
    back.style.top = value * 1 + 'px'
    text.style.marginTop = value * 1.1 + 'px';

    if (value > 250) {
        document.querySelector('.header').classList.add('header-scrolled');
        document.querySelector('.header .logo').classList.add('logo-scrolled');
        document.querySelector('.header ul li .btn-login').classList.add('btn-scrolled');
    } else if (value <= 250) {
        document.querySelector('.header').classList.remove('header-scrolled');
        document.querySelector('.header .logo').classList.remove('logo-scrolled');
        document.querySelector('.header ul li .btn-login').classList.remove('btn-scrolled');
    }
});