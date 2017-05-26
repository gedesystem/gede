function setDataHoje() {
    var data = document.getElementById('iData');

    var hoje = new Date();
    var dd = hoje.getDate();
    var mm = hoje.getMonth()+1; //Janeiro é 0!
    var yyyy = hoje.getFullYear();

    if(dd<10) {
        dd='0'+dd
    }

    if(mm<10) {
        mm='0'+mm
    }

    hoje = dd+'/'+mm+'/'+yyyy;
    data.value = hoje;
}
