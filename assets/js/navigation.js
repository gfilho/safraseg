const toggleButton = document.getElementsByClassName('toggle-nav')[0];
const navbarLink = document.getElementsByClassName('navigation');


toggleButton.addEventListener('click', () => {
    navbarLink[0].classList.toggle('active')
});

for (var i = 0; i < navbarLink.length; i++) {
    navbarLink[i].addEventListener('click', () => {
        navbarLink[0].classList.toggle('active')
    });
}

