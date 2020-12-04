
<table width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
    <thead>
    <tr>
        <th>S.N.</th>
        <th>Service Name</th>
        <th>Rate</th>
        <th>Quantity</th>
        <th>Total Amount</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    @foreach($invoices as $pc)
        <tr>
            <th>{{$i++}}</th>
            <td>{{$pc->particular}} </td>
            <td>{{$pc->rate}} </td>
            <td>{{$pc->quantity}}</td>
            <td>{{$pc->total_amount}} </td>
            <td>
                <form action="#" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete?')" ><i class="fa fa-trash"></i></button>
                </form></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4">Grand Total</td>
        <td>
            <?php $total=0 ?>
                @if($invoices)
                    @foreach($invoices as $s)
                        @php
                        $rate = $s->total_amount;
                        $total += $rate;
                        @endphp
                    @endforeach
                    {{$total}}
                @endif
        </td>
        <td></td>
    </tr>
    </tbody>
</table>
