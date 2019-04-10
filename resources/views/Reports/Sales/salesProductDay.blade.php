<!DOCTYPE html>
<html class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8"></meta>
            <meta content="IE=edge" http-equiv="X-UA-Compatible"></meta>
                <meta content="" name="description"></meta>
                    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
                        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/></meta>
                        <title>
                            INFORME DE PRODCUTOS POR DIA.
                        </title>
                        <img alt="" class="" data-src="/ic/logo.png" src="../public/img/servi.png" style="width:90px;margin-top:21px;"></img>
                            <?php  $fecha=date("j/n/Y");?>
                            <p>
                                <h1 align="center">
                                    SERVILLANTAS EL CERRITO.
                                </h1>
                                <br>
                                    <strong>
                                        Fecha de realizacion del reporte:
                                    </strong>
                                    <?php echo $fecha;?>
                                    <br>
                                        <strong>
                                            Usuario:
                                        </strong>
                                     	  {{ Auth::user()->name_user }}
                                    </br>
                                </br>
                            </p>
                           
                                <style type="text/css">
                                    table{
            width:100%;
            border-collapse: collapse;
            margin: 0 auto;
            align:center;
        }
        td, th{
          
        border:0.5px solid black;
       font-size:12px;
          
        }
        .page-break {
    page-break-after: always;
}
                                </style>
                           
    </head>
    <br>
        <body>
            <br>
                  <table class="table table-hover" style="margin-top:8px">
                    <tr>
                        <th align="center">
                            Id de venta
                        </th>
                        <th align="center">
                            Dia
                        </th>
                        <th align="center">
                            Nombre
                        </th>
                         <th align="center">
                            Precio
                        </th>
                        <th align="center">
                            Cantidad
                        </th>
                        <th align="center">
                            Total de producto
                        </th>
                    </tr>
                    {{ $quantity = $salesProducts->sum('quantity')}}
                    @foreach($salesProducts as $item)
                    <tr>
                        <td align="center">
                            {{ $item->id }}
                        </td>
                        <td align="center">
                          {{ date('j', strtotime($item->created_at))}} 
                        </td>
                        <td align="center">
                            {{ $item->name }}
                        </td>
                          <td align="center">
                            {{ $item->price }}
                        </td>
                        <td align="center">
                            {{ $item->quantity }}
                        </td>
                        <td align="center">
                              {{ $item->price * $item->quantity }}
                        </td>
                      
                    </tr>
                    @endforeach
                        <input type="text" value="Total: {{ $quantity * $item->price}}"  name="" disabled="" style="border:0px" id="totalServices"></input>
                </table>
            </br>
          
        </body>
    </br>
</html>


