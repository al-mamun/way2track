<table id="tableResponsive2" class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
           
            <th scope="col">Existing GRNs</th>
            <th scope="col">Action</th>
         
        </tr>
    </thead>
    <tbody>
        @foreach($grnList as $info)
        <tr>
           
            <td>{{ $info->SHD_GRN_NUMBER }}</td>  
            <td><a type="submit" class="btn btn-primary" href="{{ URL::asset( $info->FILE_NAME ) }}" download >Print</a></td>
        </tr>
        @endforeach
    </tobdy>
</table>