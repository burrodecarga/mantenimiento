

window.addEventListener('load', function() {
    jQuery.prototype.init.prototype = jQuery.prototype;

})


function chequear(id){
const s = document.getElementById('c'+id);
s.checked=!s.checked;
console.log(s);
}
