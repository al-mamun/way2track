<div class="form-group">
    <label for="SUPPLIER_NAME">Supplier Name <span style="color:red">*</span></label>
     @php $array = [];  @endphp
         @foreach($salesOrderDetails as $detailsInfo)
            @php $total =  explode(',', $detailsInfo->SUPPLIER); @endphp
            @If(count($total) > 1)
                @foreach($total as $expoldeData)
                   @php
                        $checkExist = DB::table('w2t_sales_order_detail')
                            ->where('WIP', $WIP)
                            ->where('SUPPLIER',  $expoldeData)
                            ->first();
                    
                    @endphp
                    
                    @if(empty($checkExist))
                        @php $array[]= trim($expoldeData) @endphp
                    @endif
                   
                    
                @endforeach
            @else
                @php  $array []= $detailsInfo->SUPPLIER; @endphp
            @endif
            
         @endforeach
         
        @php $arradyData = array_unique($array); @endphp
    <select name="SUPPLIER_NAME" id="SUPPLIER_NAME" class="form-control" aria-label="SUPPLIER_NAME" required>
        <option value="" selected>Select </option>
        @foreach($arradyData as $data)
           <option value="{{ $data }}" >{{ $data }} </option>     
        @endforeach
        
       
    </select>
    <!--<input type="text" class="form-control" id="status" name="status" placeholder="Enter status">-->
</div>