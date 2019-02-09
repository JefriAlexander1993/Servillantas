// $('#name').on('keypress', function(e) {
//     if (!/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]*$/.test(e.target.value)) {
//         e.preventDefault();
//         swal({
//             title: 'Error',
//             text: 'No se permiten numeros, ni caracteres en este campo.!',
//             icon: "warning",
//             button: "Cerrar!",
//         });
//     }
// });
// $('#lastname').on('keypress', function(e) {
//     if (!/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]*$/.test(e.target.value)) {
//         e.preventDefault();
//         swal({
//             title: 'Error',
//             text: 'No se permiten numero, ni caracteres en este campo.!',
//             icon: "warning",
//             button: "Cerrar!",
//         });
//     }
// });
// $('#display_name').on('keypress', function(e) {
//     if (!/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]*$/.test(e.target.value)) {
//         e.preventDefault();
//         swal({
//             title: 'Error',
//             text: 'No se permiten numero, ni caracteres en este campo.!',
//             icon: "warning",
//             button: "Cerrar!",
//         });
//     }
// });
//Solo texto y espacios
$("#name").bind('keypress', function(event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
$("#lastname").bind('keypress', function(event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
$("#display_name").bind('keypress', function(event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
//Solo números
$("input.dni").bind('keypress', function(event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
//Alphanumérico y espacios
$("input.buscar").bind('keypress', function(event) {
    var regex = new RegExp("^[a-zA-Z0-9 ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
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