const body1 = document.body,
    html = document.documentElement;

const dheight = Math.max( body1.scrollHeight, body1.offsetHeight, 
                       html.clientHeight, html.scrollHeight, html.offsetHeight );

const footer = document.querySelector('.footer');

if (dheight <= window.innerHeight) {
    footer.classList.add('fixed-bottom');
}