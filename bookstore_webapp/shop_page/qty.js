var iprice = document.getElementsByClassName('iprice');
var iqty = document.getElementsByClassName('iqty');
var itotal = document.getElementsByClassName('itotal');

function subTotal() {
    for (i=0;i<iprice.length;i++) {
        itotal[i].innerText = (iprice[i].value)*(iqty[i].value);
    }
}
subTotal();