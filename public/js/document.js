$('#btn-sale').on('click', function() {

        if ($('#code').val() == '') {

         swal({
              title: "Error en el momento de agregar!",
              text: "Vuelve a intentarlo, recuerda llenar el campo de codigo, no puede estar vacio, vuelve a seleccionarlo.",
              icon: "warning",
              button: "Cerrar!",
              });
            return false;
        }

        for (i = 0; i < listcode.length; i++) {
            if (listcode[i] == $('#code').val()) {
   
        swal({
              title: "Error en el momento de agregar!",
              text: "Vuelve a intentarlo, no se puede agregar el mismo codigo.",
              icon: "warning",
              button: "Cerrar!",
                  });
                return false;
            }
        }

        addRowSeller();

});


var listcode = new Array();

/*************    Adicionar filas de compra    ************/

function addRowSeller() {

    $.ajax({
        url: $('#url_product').val() + '/' + $('#code').val(),
        dataType: 'json',
        type: 'GET',
        success: function(data) {
            if (data.code === 200) {
                $(data.datos).each(function(index, el) {
                   // var totaIva = parseFloat(el.sale_price) * parseFloat(el.iva) / 100;
                    
                    var row = '<tr id="fila' + el.id + '">\n\
    <td align="center"><input readonly="readonly" style="border:none;text-align:center"  type="text" id="code' + el.id + '" name="code[]" value="' + el.code + '"></td>\n\
    <td align="center"><input readonly="readonly" style="border:none;text-align:center"  type="text" id="name' + el.id + '" name="name[]" value="' + el.name + '"></td>\n\
    <td align="center"><input style="border:none;text-align:center"  type="number" id="quantity' + el.id + '" min="1" pattern="^[0-9]+"  name="quantity[]" onkeyup="totalizar(' + el.id + ');" value="1"></td>\n\
    <td align="center"><input style="border:none;text-align:center" readonly="readonly" type="text" id="price' + el.id + '" name="price[]" value="' + el.price + '"></td>\n\
    <td align="center"><input readonly="readonly"  style="border:none;text-align:center" type="text" id="total' + el.id + '" name="total[]" step="0.01" value="' + el.price+ '"></td>\n\
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
            $('#modalError').modal({ show: true });
        }
    });
}



/************ Totaliza todos los valores de la fila agregada ************/
function totalizar(id) {

    var cantidad = $('#quantity' + id).val();

    if (cantidad != '') {

        var precio = $('#price' + id).val();

          var totalSale = precio * cantidad;

                 $('#total' + id).val(totalSale);

        var totalSale = 0;
        var fila = $("#tbl-sale > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total"); /*Debe ser este*/
            totalSale += parseInt($(idfila).val());

        });
        $('#totalSale').val(totalSale);
    } else {
        $('#totalSale' + id).val(0);
    }


}


function deleteRow(id, e) {

    if ($('#fila' + id).remove()) {
        file = $('#sale').val() - 1;
      
        $('#sale').val(file)
        $('#code').val('');
        var totalVenta = 0;
        var fila = $("#tbl-sale > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total"); /*Debe ser este*/
            totalVenta = parseInt($(idfila).val());

        });
        $('#totalSale').val(totalVenta);

        listcodigo.pop();


        if (isNaN(totalVenta)) {
            $('#totalSale').val(0);
        } else {
            $('#totalSale').val(e);

        }
          swal({
              title: "Error en el momento de agregar!",
              text: "Se ha eliminado correctamente', '!El articulo.",
              icon: "success",
              button: "Cerrar!",
                  });
 


        $('#totalSale').val(totalVenta);

        for (i = 0; i < listcodigo.length; i++) {
            if (listcodigo[i] == id) {

                listcodigo.splice(i);
                return false;

            }
        }
    }
}
