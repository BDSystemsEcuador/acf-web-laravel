//Menús
/* var btnmenu = document.getElementById("btnmenu");
var menu = document.getElementById("menu");
var btnInicio = document.getElementById("btnInicio");
var menu2 = document.getElementById("menu2");
var inicio = document.getElementById("inicioid");
btnmenu.addEventListener('click',()=>{
    menu.classList.toggle('nav-show');
    if(menu.classList.contains('nav-show')){
        inicio.style.transform='translateX(-80%)';
    }else{
        inicio.style.transform='translateX(0%)';

    }

});
inicio.addEventListener('mousemove',()=>{
    inicio.style.transform='translateX(0%)';
    menu.classList.remove('nav-show');

}); */
const btnMenu = document.querySelector('#btnMenu');
const menu = document.querySelector('#main-nav');
const inicio = document.querySelector('#inicioid');
btnMenu.addEventListener('click',function(){
    menu.classList.toggle("mostrar");
});
const subMenuBtn = document.querySelectorAll('.submenu-btn');
for(let i = 0; i<subMenuBtn.length;i++){
    subMenuBtn[i].addEventListener('click',function(){
        if(window.innerWidth<1024){
            const subMenu = this.nextElementSibling;
            const height = subMenu.scrollHeight;
            if(subMenu.classList.contains("desplegar")){
                subMenu.classList.remove('desplegar');
                subMenu.style.height=0+"px";
                subMenuBtn[i].lastChild.style.transform = 'rotate('+0+'deg)';

            }else{
                subMenuBtn[i].lastChild.style.transform = 'rotate('+180+'deg)';
                subMenu.classList.add('desplegar');
                subMenu.style.height=height+"px";
            }

        }
    });
}
const btnWsp = document.getElementById('btn-wsp');
const wspModal = document.getElementById('wsp-modal');
const contactosFondo = document.querySelector('.contactos');
btnWsp.addEventListener('click',function(){
  wspModal.classList.toggle('mostrar-contacts');
  contactosFondo.classList.toggle('contactos-fondo');
});


    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',

        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
