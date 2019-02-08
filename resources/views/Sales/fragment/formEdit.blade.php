<table class="display" id="sale" style="width:100%">
    <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                Codigo
            </th>
            <th>
                Nombre
            </th>
            <th>
                Precio
            </th>
            <th>
                Cantidad
            </th>
            <th>
                Subtotal
            </th>
            <th>
                Total
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($detalles as $detalle)
        <tr>
            <td align="center">
                {{$detalle->id}}
            </td>
            <td align="center">
                {{$detalle->code}}
            </td>
            <td align="center">
                {{$detalle->name}}
            </td>
            <td align="center">
                {{$detalle->price}}
            </td>
            <td align="center">
                {{$detalle->quantity}}
            </td>
            <td align="center">
                {{$detalle->price_u}}
            </td>
            <td align="center">
                {{$detalle->total}}
            </td>
            <td align="center">
                {{$detalle->totalsale}}
            </td>
        </tr>
    </tbody>
</table>
