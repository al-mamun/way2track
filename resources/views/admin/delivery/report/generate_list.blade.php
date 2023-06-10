<table id="tableResponsive2" class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
           
            <th scope="col"> Existing Delivery IDs</th>
            <th scope="col">Action</th>
         
        </tr>
    </thead>
    <tbody>
        @foreach($grnList as $info)
        <tr>
           
            <td>{{ $info->DO_NO }}</td>  
<<<<<<< HEAD
            <td><a type="submit" class="btn btn-primary" href="{{ $info->FILE_NAME }}" download >Print</a></td>
=======
            <td><a type="submit" class="btn btn-primary" href="{{ URL::asset( $info->FILE_NAME ) }}" download >Print</a></td>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        </tr>
        @endforeach
    </tobdy>
</table>