$('#name').on('keypress', function(e) {
    if (!/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]*$/.test(e.target.value)) {
        e.preventDefault();
        swal({
            title: 'Error',
            text: 'No se permiten numeros, ni caracteres en este campo.!',
            icon: "warning",
            button: "Cerrar!",
        });
    }
});
$('#lastname').on('keypress', function(e) {
    if (!/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]*$/.test(e.target.value)) {
        e.preventDefault();
        swal({
            title: 'Error',
            text: 'No se permiten numero, ni caracteres en este campo.!',
            icon: "warning",
            button: "Cerrar!",
        });
    }
});
$('#display_name').on('keypress', function(e) {
    if (!/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]*$/.test(e.target.value)) {
        e.preventDefault();
        swal({
            title: 'Error',
            text: 'No se permiten numero, ni caracteres en este campo.!',
            icon: "warning",
            button: "Cerrar!",
        });
    }
});
//-----------------------------Valida que los campos solo permitan numeros-----------------------------//
$('#nuip').on('keypress', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});
$('#phone').on('keypress', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});
$('#price').on('keypress', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});
$(document).ready(function() {
    $('#quantity').on('keypress', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});