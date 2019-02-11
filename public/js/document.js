$(document).ready(function() {
    setTimeout(function() {
        // Declaramos la capa mediante una clase para ocultarlo
        $("#error").fadeOut(1500);
    }, 1800);
    setTimeout(function() {
        // Declaramos la capa mediante una clase para ocultarlo
        $("#delete").fadeOut(1500);
    }, 1800);
    setTimeout(function() {
        // Declaramos la capa mediante una clase para ocultarlo
        $("#success").fadeOut(1500);
    }, 1800);
});
//--------------------------------------------ELIMINAR--------------------------------------------------//
$('#btn-deleteSale').on('click', function() {
    swal({
        title: "¿Estás seguro?",
        text: " Una vez eliminado, no podrá recuperar esta vente",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            var id = $("#idSale").val();
            var routeA = "Sales/" + id;
            var token = $("#token").val();
            $.ajax({
                url: routeA,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                type: 'POST',
                dataType: 'json',
                data: {
                    _method: 'DELETE'
                },
            });
            swal("¡Su venta ha sido eliminado!", {
                icon: "success",
            });
            location.reload();
        } else {
            swal("Tu venta no podido eliminar!");
        }
    });
});
//----------------------------------------------------------------------------------------------------//
$('#btn-addProduct').on('click', function() {
    if ($('#codeProduct').val() == '') {
        swal({
            title: "Error en el momento de agregar!",
            text: "Vuelve a intentarlo, recuerda llenar el campo de codigo, no puede estar vacio, vuelve a ingresarlo.",
            icon: "warning",
            button: "Cerrar!",
        });
        return false;
    }
    for (i = 0; i < listcode.length; i++) {
        if (listcode[i] == $('#codeProduct').val()) {
            swal({
                title: "Error en el momento de agregar!",
                text: "Vuelve a intentarlo, no se puede agregar el mismo codigo.",
                icon: "warning",
                button: "Cerrar!",
            });
            return false;
        }
    }
    addRowProduct();
});
/*--------------------------------------------------------------------*/
$('#btn-addService').on('click', function() {
    if ($('#codeService').val() == '') {
        swal({
            title: "Error en el momento de agregar!",
            text: "Vuelve a intentarlo, recuerda llenar el campo de codigo, no puede estar vacio, vuelve ingresarlo.",
            icon: "warning",
            button: "Cerrar!",
        });
        return false;
    }
    for (i = 0; i < listcode1.length; i++) {
        if (listcode1[i] == $('#codeService').val()) {
            swal({
                title: "Error en el momento de agregar!",
                text: "Vuelve a intentarlo, no se puede agregar el mismo codigo.",
                icon: "warning",
                button: "Cerrar!",
            });
            return false;
        }
    }
    addRowService();
});
var listcode = new Array
var listcode1 = new Array();
/*************    Adicionar filas de compra    ************/
function addRowProduct() {
    $.ajax({
        url: $('#url_product').val() + '/' + $('#codeProduct').val(),
        dataType: 'json',
        type: 'GET',
        success: function(data) {
            if (data.code === 200) {
                $(data.datos).each(function(index, el) {
                    // var totaIva = parseFloat(el.sale_price) * parseFloat(el.iva) / 100;
                    var row = '<tr id="fila' + el.id + '">\n\
    <td align="center"><input readonly="readonly" style="border:none;text-align:center"  type="text" id="code' + el.id + '" name="code[]" value="' + el.code + '"></td>\n\
    <td align="center"><input readonly="readonly" style="border:none;text-align:center"  type="text" id="name' + el.id + '" name="name[]" value="' + el.name + '"></td>\n\
    <td align="center"><input style="border:none;text-align:center"  type="number" id="quantity' + el.id + '" min="1" pattern="^[0-9]+"  name="quantity[]" onkeyup="totalizarRow(' + el.id + ')"; value="1"></td>\n\
    <td align="center"><input style="border:none;text-align:center" readonly="readonly" type="text" id="price' + el.id + '" name="price[]" value="' + el.price + '"></td>\n\
    <td align="center"><input readonly="readonly"  style="border:none;text-align:center" type="text" id="total' + el.id + '" name="total[]" step="0.01" value="' + el.price + '"></td>\n\
    <td align="center"><a id="btn-borrar' + el.id + '" class="btn btn-danger btn-sm" onclick="deleteRow(' + el.id + ')" ><i class="fa fa-trash" ></i></a></td>\n\
    </tr>';
                    $('#tbl-sale tbody').append(row);
                    var c = parseInt($('#sale').val()) + 1;
                    $('#sale').val(c);
                    //Corregir 
                    swal("¡Buen trabajo, se ha agregado exitosamente el producto, recuerda solo se puede modificar cantidad!", "Haz clic en el botón!", "success");
                    var a = listcode.push($('#code').val());
                    return a;
                    //  toastr.success('Se ha agregado un articulo en Compra!.')
                });
            } else {
                if (data.code === 600) {
                    swal({
                        title: "Error en el momento de buscar!",
                        text: "Vuelve a intentarlo, el codigo ingresado no esta registrado.",
                        icon: "warning",
                        button: "Cerrar!",
                    });
                    return false;
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            data = {
                error: jqXHR + ' - ' + textStatus + ' - ' + errorThrown
            }
            $('#modal' + 1).modal('toggle');
            $('body').append('<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><h4 class="modal-title" id="myModalLabel">ERROR EN TRANSACCIÓN</h4></div><div class="modal-body">' + data.error + '</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button></div></div></div></div>');
            $('#modalError').modal({
                show: true
            });
        }
    });
}
/*************    Adicionar filas de servicios    ************/
function addRowService() {
    $.ajax({
        url: $('#url_service').val() + '/' + $('#codeService').val(),
        dataType: 'json',
        type: 'GET',
        success: function(data) {
            if (data.code === 200) {
                $(data.datos).each(function(index, el) {
                    // var totaIva = parseFloat(el.sale_price) * parseFloat(el.iva) / 100;
                    var row = '<tr id="fila1' + el.id + '">\n\
    <td align="center"><input readonly="readonly" style="border:none;text-align:center"  type="text" id="code' + el.id + '" name="code[]" value="' + el.code + '"></td>\n\
    <td align="center"><input readonly="readonly" style="border:none;text-align:center"  type="text" id="name' + el.id + '" name="name[]" value="' + el.name + '"></td>\n\
    <td align="center"><input style="border:none;text-align:center"  type="number" id="quantityS' + el.id + '" min="1" pattern="^[0-9]+"  name="quantityS[]" onkeyup="totalizarService(' + el.id + ')"; value="1"></td>\n\
    <td align="center"><input style="border:none;text-align:center" readonly="readonly" type="text" id="priceService' + el.id + '" name="priceService[]" value="' + el.price + '"></td>\n\
    <td align="center"><input readonly="readonly"  style="border:none;text-align:center" type="text" id="totalService' + el.id + '" name="total[]" step="0.01" value="' + el.price + '"></td>\n\
    <td align="center"><a id="btn-borrar' + el.id + '" class="btn btn-danger btn-sm" onclick="deleteService(' + el.id + ')" ><i class="fa fa-trash" ></i></a></td>\n\
    </tr>';
                    $('#tbl-service tbody').append(row);
                    var c = parseInt($('#quantityService').val()) + 1;
                    $('#quantityService').val(c);
                    //Corregir 
                    swal("¡Buen trabajo, se ha agregado exitosamente el producto, recuerda solo se puede modificar cantidad!", "Haz clic en el botón!", "success");
                    var a = listcode1.push($('#codeService').val());
                    return a;
                    //  toastr.success('Se ha agregado un articulo en Compra!.')
                });
            } else {
                if (data.code === 600) {
                    swal({
                        title: "Error en el momento de buscar!",
                        text: "Vuelve a intentarlo, el codigo ingresado no esta registrado.",
                        icon: "warning",
                        button: "Cerrar!",
                    });
                    return false;
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            data = {
                error: jqXHR + ' - ' + textStatus + ' - ' + errorThrown
            }
            $('#modal' + 1).modal('toggle');
            $('body').append('<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><h4 class="modal-title" id="myModalLabel">ERROR EN TRANSACCIÓN</h4></div><div class="modal-body">' + data.error + '</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button></div></div></div></div>');
            $('#modalError').modal({
                show: true
            });
        }
    });
}
/************ Totaliza todos los valores de la fila agregada ************/
function totalizarRow(id) {
    var cantidad = $('#quantity' + id).val();
    if (cantidad != '') {
        var precio = $('#price' + id).val();
        var total = precio * cantidad;
        $('#total' + id).val(total);
        totalProduct = 0;
        var fila = $("#tbl-sale > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total"); /*Debe ser este*/
            totalProduct += parseInt($(idfila).val());
        });
        $('#totalProduct').val(totalProduct);
        totalSale();
    } else {
        $('#total' + id).val(0);
    }
}
/************ Totaliza todos los valores de la fila agregada ************/
function totalizarService(id) {
    var cantidadServicio = $('#quantityS' + id).val();
    if (cantidadServicio != '') {
        var precioServicio = $('#priceService' + id).val();
        var totalServicios = precioServicio * cantidadServicio;
        $('#totalService' + id).val(totalServicios);
        totalService = 0;
        var fila1 = $("#tbl-service > tbody > tr").each(function(index, element) {
            var id = element.id.replace("fila1", "#totalService"); /*Debe ser este*/
            totalService += parseInt($(id).val());
        });
        $('#totalS').val(totalService);
        totalSale();
    } else {
        $('#totalService' + id).val(0);
    }
}

function totalSale() {
    if ($('#totalS').val() == null || $('#totalS').val() == 0) {
        totalp = $('#totalProduct').val();
        $('#totalSale').val(totalp);
    } else if ($('#totalProduct').val() == null || $('#totalProduct').val() == 0) {
        totals = $('#totalS').val();
        $('#totalSale').val(totals);
    } else {
        totalSale = 0;
        totalS = $('#totalS').val();
        totalP = $('#totalProduct').val();
        totalSale = parseInt(totalS) + parseInt(totalP);
        $('#totalSale').val(totalSale);
    }
}

function deleteRow(id, e) {
    if ($('#fila' + id).remove()) {
        file = $('#sale').val() - 1;
        $('#sale').val(file)
        $('#code').val('');
        var totalProduct = 0;
        var fila = $("#tbl-sale > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total"); /*Debe ser este*/
            totalProduct = parseInt($(idfila).val());
        });
        result = 0;
        result = parseInt($('#totalSale').val()) - parseInt($('#totalProduct'))
        $('#totalSale').val(result);
        listcode.pop();
        if ($('#sale').val() === 0) {
            $('#totalProduct').val(0);
        }
        if (isNaN(result)) {
            $('#totalSale').val($('#totalS').val());
        } else {
            $('#totalProduct').val(e);
        }
        swal({
            title: "Error en el momento de agregar!",
            text: "Se ha eliminado correctamente', '!El articulo.",
            icon: "success",
            button: "Cerrar!",
        });
        $('#totalProduct').val(totalProduct);
        for (i = 0; i < listcode.length; i++) {
            if (listcode[i] == id) {
                listcode.splice(i);
                return false;
            }
        }
    }
}

function deleteService(id, e) {
    if ($('#fila1' + id).remove()) {
        file = $('#quantityService').val() - 1;
        $('#quantityService').val(file)
        $('#codeService').val('');
        var totalService = 0;
        var fila = $("#tbl-service > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#totalService"); /*Debe ser este*/
            totalService = parseInt($(idfila).val());
        });
        result = 0;
        result = parseInt($('#totalSale').val()) - parseInt($('#totalService'));
        $('#totalSale').val(result);
        listcode1.pop();
        if ($('#quantityService').val() == 0) {
            $('#totalS').val(0);
        }
        if (isNaN(result)) {
            $('#totalSale').val($('#totalProduct').val());
        } else {
            $('#totalService').val(e);
        }
        swal({
            title: "Error en el momento de agregar!",
            text: "Se ha eliminado correctamente', '!El servicio.",
            icon: "success",
            button: "Cerrar!",
        });
        $('#totalService').val(totalService);
        for (i = 0; i < listcode1.length; i++) {
            if (listcode1[i] == id) {
                listcode1.splice(i);
                return false;
            }
        }
    }
}
$(".accordion-titulo").click(function() {
    var contenido = $(this).next(".accordion-content");
    if (contenido.css("display") == "none") { //open   
        contenido.slideDown(250);
        $(this).addClass("open");
    } else { //close    
        contenido.slideUp(250);
        $(this).removeClass("open");
    }
});
var data_edit = function(tbody, table) {
    $(tbody).on("click", "#idSale", function() {
        var data = table.row($(this).parents("tr")).data();
        var iduser = $("#idsalEdit").val(data.id);
    });
}
$(document).ready(function() {
    data_edit();
});