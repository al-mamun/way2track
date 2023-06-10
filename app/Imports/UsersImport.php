<?php
  
namespace App\Imports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\SalesOrderDetails;
use App\Models\SalesOrderDetailstem;
use App\Models\SalesOrderHeader;
use Input;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Concerns\WithDrawings;
<<<<<<< HEAD
use Maatwebsite\Excel\HeadingRowImport;
=======

>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use DB;

class UsersImport implements ToModel, WithHeadingRow,WithStartRow,WithPreCalculateFormulas
{
<<<<<<< HEAD
      private $heading_row;
     
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
     public function  __construct($wip)
    {
        $this->wip = $wip;
        $this->sl  = 1;
<<<<<<< HEAD
        $this->headingRow = 8;
    }
   
   public function import()
    {
        $headings = (new HeadingRowImport)->toArray('users.xlsx');
    }
=======
    }
    
    
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
     /**
     * @return int
     */
    public function startRow(): int
    {
        return 1;
    }

   public function headingRow(): int
    {
<<<<<<< HEAD
        
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        return 6; //this should be the row number of heading row
    }

    public function collection()
    {
<<<<<<< HEAD
    

=======
        
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        // Add new row with Total cell
        $extendedArr = [
            $this->data,
            ['Total:']
        ];
        
        return new Collection($extendedArr);
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
<<<<<<< HEAD
   
            $keyNumber =  $this->sl++;
           
               
                if(array_key_exists('code', $row)) {
                    
                 
                    $indexNumber =  'C'. $keyNumber;
                    
                    if( !empty($row['code']) && is_numeric($row['qty'][0]) && $row['qty'][0] >= 0 ) {
                        
                        
                        // $keyNumber =  $this->sl++;
                         $indexNumber =  'C'. $keyNumber;
                        
                        $tableData = DB::table('w2t_sales_image')
                            ->where('uniq_id',$this->wip['sesison_id'])
                            ->where('cell_number', $indexNumber)
                            ->first();
             
                        $salesOrderHeader = SalesOrderHeader::where('WIP', $this->wip['wip'])->first();
                        
                        if(!empty($salesOrderHeader)) {
                            
                            $code = !empty($row['code']) ? $row['code'] : '';
                            
                             $checkExist = SalesOrderDetailstem::where('WIP', $this->wip['wip'])
                                ->where('ITEM', $code)
                                ->where('QTY', $row['qty'] )
                                ->where('temp_time', $this->wip['sesison_id'] )
                                ->first();
                                
                            if(empty($checkExist)){
                                
                                $totalQty= $row['qty'][0] + $row['qty'][1] + $row['qty'][2];
                                $newOrder = new SalesOrderDetailstem;
                                $newOrder->WIP               = $this->wip['wip'];
                                $newOrder->ITEM              = $code;
                                $newOrder->QTY               = $totalQty;
                                $newOrder->DESCRIPTION       = str_replace('/', ' ', $row['description'][0]);
                                $newOrder->temp_time         = $this->wip['sesison_id'];
                                $newOrder->EXP_HANDOVER_DT   = $salesOrderHeader->TGT_HANDOVER_DT;
                                $newOrder->EXP_DELIVERY      = $salesOrderHeader->TGT_HANDOVER_DT;
                                $newOrder->comments          = '';
                                
                                if(!empty($tableData)) {
                                    $newOrder->THUMBNAIL_IMAGE = $tableData->image;
                                    $newOrder->IMAGE_ID       = $tableData->ID;
                                }
                                
                                $newOrder->EX_COMMENTS     = 'PROCESSING';
                                $newOrder->save();
                                
                                
                                 $manufacturer = explode('Manufacturer:', $row['description'][0]);
                           
                                if(!empty($manufacturer[1])) {
                                    
                                    $manufacturerWithWaranty = explode('Warranty:', $manufacturer[1]);
                                   
                                    if(!empty($manufacturerWithWaranty[0])) {
                                        $supplier = trim($manufacturerWithWaranty[0]);
                                        
                                    } else {
                                        $supplier = trim($manufacturer[1]);
                                    }
                                   
                                    SalesOrderDetailstem::where('WIP',  $this->wip)
                                        ->orderBY('ID','desc')
                                        ->take(1)
                                        ->update([
                                            'SUPPLIER' => $supplier,
                                        ]); 
                                }
                            }
                        }
                        
                        
                    }   else if(!empty($row['description'][0]) || !empty($row['code']) ) {
                        
                        
                        $newOrder =  SalesOrderDetailstem::where('WIP',  $this->wip)->orderBY('ID','desc')->first();
                         
                        // if(!empty($newOrder->DESCRIPTION)) {
                            
                        //   $desc =  $newOrder->DESCRIPTION.' '.$row['description'];
                           
                        //     SalesOrderDetailstem::where('WIP',  $this->wip)
                        //         ->orderBY('ID','desc')
                        //         ->take(1)
                        //         ->update([
                        //             'DESCRIPTION' => str_replace('/', ' ', $desc),
                        //         ]);
                           
                        
                        // }
                        
                        $manufacturer = explode('Manufacturer:', $row['description'][0]);
                           
                        if(!empty($manufacturer[1])) {
                            
                            $manufacturerWithWaranty = explode('Warranty:', $manufacturer[1]);
                           
                            if(!empty($manufacturerWithWaranty[0])) {
                                $supplier = trim($manufacturerWithWaranty[0]);
                                
                            } else {
                                $supplier = trim($manufacturer[1]);
                            }
                           
                            SalesOrderDetailstem::where('WIP',  $this->wip)
                                ->orderBY('ID','desc')
                                ->take(1)
                                ->update([
                                    'SUPPLIER' => $supplier,
                                ]); 
                        }
                            
                        $tableData = DB::table('w2t_sales_image')
                            ->where('uniq_id',$this->wip['sesison_id'])
                            ->where('cell_number', $indexNumber)
                            ->first();
                            
                        if(!empty($tableData)){
                            
                            
                            $salesInfo = SalesOrderDetailstem::where('WIP',  $this->wip)
                                ->orderBY('ID','desc')
                                ->first();
                            
                            $imageID = $tableData->ID;
                            
                            if(!empty($salesInfo->IMAGE_ID) ) {
                                $imageID = $salesInfo->IMAGE_ID.','. $tableData->ID;
                            }
                             SalesOrderDetailstem::where('WIP',  $this->wip)
                                ->orderBY('ID','desc')
                                ->take(1)
                                ->update([
                                    'THUMBNAIL_IMAGE' => $tableData->image,
                                    'IMAGE_ID'        => $imageID,
                                ]);
                                
                        }
                        
                    } else {
                        
                        $tableData = DB::table('w2t_sales_image')
                            ->where('uniq_id',$this->wip['sesison_id'])
                            ->where('cell_number', $indexNumber)
                            ->first();
                            
                        if(!empty($tableData)){
                            
                            $salesInfo = SalesOrderDetailstem::where('WIP',  $this->wip)
                                ->orderBY('ID','desc')
                                ->first();
                            
                            $imageID = $tableData->ID;
                            
                            if(!empty($salesInfo->IMAGE_ID) ) {
                                $imageID = $salesInfo->IMAGE_ID.','. $tableData->ID;
                            }
                             SalesOrderDetailstem::where('WIP',  $this->wip)
                                ->orderBY('ID','desc')
                                ->take(1)
                                ->update(
                                [
                                    'THUMBNAIL_IMAGE' => $tableData->image,
                                    'IMAGE_ID' => $imageID,
                                ]);
                        }
                        
                    }
                    
                } else {
                
                    if(array_key_exists('slno', $row) && $row['slno'] !='SL.No') {
                         
                    $indexNumber =  'B'. $keyNumber;
                    
                    
                    array_push($row, $keyNumber);
                    end($row);         // move the internal pointer to the end of the array
                    $key = key($row);
                    $endKey = $key;
                    
                    if(is_array($row['qty'])) {
                        $qty = $row['qty'][0];
                    } else {
                         $qty = $row['qty'];
                    }
                    // echo '<pre>';
                    // print_r($row);
                    if( !empty($row['slno']) && is_numeric($qty) && $qty > 0  ) {
    
                        $tableData = DB::table('w2t_sales_image')
                            ->where('uniq_id',$this->wip['sesison_id'])
                            ->where('cell_number', $indexNumber)
                            ->first();
             
                        $salesOrderHeader = SalesOrderHeader::where('WIP', $this->wip['wip'])->first();
                        
                        if(!empty($salesOrderHeader)) {
            
                            $slNO = !empty($row['slno']) ? $row['slno'] : '';
                            
                            $checkExist = SalesOrderDetailstem::where('WIP', $this->wip['wip'])
                                ->where('ITEM', $slNO)
                                ->where('QTY', $row['qty'] )
                                ->where('DESCRIPTION',  str_replace('/', ' ', $row['description']) )
                                ->where('temp_time', $this->wip['sesison_id'] )
                                ->first();
                                
                            $prvNumber = $keyNumber - 1; // check previouse key number
                            
                            $checkRowNumber = SalesOrderDetailstem::where('WIP', $this->wip['wip'])
                                ->where('ROW_NUMBER', $prvNumber)
                                ->where('temp_time', $this->wip['sesison_id'] )
                                ->first();
                                
                            if(empty($checkExist) && empty($checkRowNumber)){
                                
                                $newOrder = new SalesOrderDetailstem;
                                $newOrder->WIP               = $this->wip['wip'];
                                $newOrder->ITEM              = $slNO;
                                $newOrder->QTY               = $qty;
                                $newOrder->DESCRIPTION       =  str_replace('/', ' ', $row['description']);
                                $newOrder->temp_time         = $this->wip['sesison_id'];
                                $newOrder->EXP_HANDOVER_DT   = $salesOrderHeader->TGT_HANDOVER_DT;
                                $newOrder->EXP_DELIVERY      = $salesOrderHeader->TGT_HANDOVER_DT;
                                $newOrder->ROW_NUMBER        = $keyNumber;
                                $newOrder->comments          = '';
                                
                                if(!empty($tableData)) {
                                    $newOrder->THUMBNAIL_IMAGE = $tableData->image;
                                    $newOrder->IMAGE_ID       = $tableData->ID;
                                }
                                
                                $newOrder->EX_COMMENTS     = 'PROCESSING';
                                $newOrder->save();
                                
                            } else {
                                
                                $checkExistPrevious = SalesOrderDetailstem::where('WIP',  $this->wip)
                                    ->orderBY('ID','desc')
                                    ->take(1)
                                    ->first();
                            
                            
=======
            
            $keyNumber =  $this->sl++;
         
 
            if(isset($row['code'])) {
                
                $indexNumber =  'C'. $keyNumber;
                if( !empty($row['code']) && is_numeric($row['qty']) && $row['qty'] > 0 ) {
                    
                    // $keyNumber =  $this->sl++;
                     $indexNumber =  'C'. $keyNumber;
                    
                    $tableData = DB::table('w2t_sales_image')
                        ->where('uniq_id',$this->wip['sesison_id'])
                        ->where('cell_number', $indexNumber)
                        ->first();
         
                    $salesOrderHeader = SalesOrderHeader::where('WIP', $this->wip['wip'])->first();
                    
                    if(!empty($salesOrderHeader)) {
                        
                        $code = !empty($row['code']) ? $row['code'] : '';
                        
                         $checkExist = SalesOrderDetailstem::where('WIP', $this->wip['wip'])
                            ->where('ITEM', $code)
                            ->where('QTY',$row['qty'] )
                            ->where('temp_time', $this->wip['sesison_id'] )
                            ->first();
                            
                        if(empty($checkExist)){
                            
                            $newOrder = new SalesOrderDetailstem;
                            $newOrder->WIP               = $this->wip['wip'];
                            $newOrder->ITEM              = $code;
                            $newOrder->QTY               = $row['qty'];
                            $newOrder->DESCRIPTION       = str_replace('/', ' ', $row['description']);
                            $newOrder->temp_time         = $this->wip['sesison_id'];
                            $newOrder->EXP_HANDOVER_DT   = $salesOrderHeader->TGT_HANDOVER_DT;
                            $newOrder->EXP_DELIVERY      = $salesOrderHeader->TGT_HANDOVER_DT;
                            $newOrder->comments          = '';
                            
                            if(!empty($tableData)) {
                                $newOrder->THUMBNAIL_IMAGE = $tableData->image;
                                $newOrder->IMAGE_ID       = $tableData->ID;
                            }
                            
                            $newOrder->EX_COMMENTS     = 'PROCESSING';
                            $newOrder->save();
                            
                            
                             $manufacturer = explode('Manufacturer:', $row['description']);
                       
                            if(!empty($manufacturer[1])) {
                                
                                $manufacturerWithWaranty = explode('Warranty:', $manufacturer[1]);
                               
                                if(!empty($manufacturerWithWaranty[0])) {
                                    $supplier = trim($manufacturerWithWaranty[0]);
                                    
                                } else {
                                    $supplier = trim($manufacturer[1]);
                                }
                               
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                SalesOrderDetailstem::where('WIP',  $this->wip)
                                    ->orderBY('ID','desc')
                                    ->take(1)
                                    ->update([
<<<<<<< HEAD
                                        'QTY'        => $qty,
                                        'ITEM'        => $checkExistPrevious->ITEM.' '.$slNO,
                                        'DESCRIPTION' => $checkExistPrevious->DESCRIPTION.' '. str_replace('/', ' ', $row['description']),
                                    ]); 
                            }
                        }
                        
                        
                    } else if( (!empty($row['slno']) && !is_numeric($qty) && !empty($row['description']) && $row['slno'] !='ST101'  )) {
                        
                        $indexNumber =  'B'. $keyNumber + 1;
                        
                        $tableData = DB::table('w2t_sales_image')
                            ->where('uniq_id',$this->wip['sesison_id'])
                            ->where('cell_number', $indexNumber)
                            ->first();
             
                        $salesOrderHeader = SalesOrderHeader::where('WIP', $this->wip['wip'])->first();
                        
                        if(!empty($salesOrderHeader)) {
            
                            $slNO = !empty($row['slno']) ? $row['slno'] : '';
                            
                            $checkExist = SalesOrderDetailstem::where('WIP', $this->wip['wip'])
                                ->where('ITEM', $slNO)
                                ->where('QTY', $row['qty'] )
                                ->where('temp_time', $this->wip['sesison_id'] )
                                ->first();
                            
                            
                            
                            $checkROwNO = SalesOrderDetailstem::where('WIP', $this->wip['wip'])
                                ->where('ROW_NUMBER', $keyNumber - 1  )
                                ->where('temp_time', $this->wip['sesison_id'] )
                                ->first();
                                
                            if(empty($checkExist) && empty($checkROwNO)){
                                
                                $newOrder = new SalesOrderDetailstem;
                                $newOrder->WIP               = $this->wip['wip'];
                                $newOrder->ITEM              = $slNO;
                                $newOrder->QTY               = 0;
                                $newOrder->DESCRIPTION       =  str_replace('/', ' ', $row['description']);
                                $newOrder->temp_time         = $this->wip['sesison_id'];
                                $newOrder->EXP_HANDOVER_DT   = $salesOrderHeader->TGT_HANDOVER_DT;
                                $newOrder->EXP_DELIVERY      = $salesOrderHeader->TGT_HANDOVER_DT;
                                $newOrder->ROW_NUMBER        = $keyNumber;
                                $newOrder->comments          = '';
                                
                                if(!empty($tableData)) {
                                    $newOrder->THUMBNAIL_IMAGE = $tableData->image;
                                    $newOrder->IMAGE_ID       = $tableData->ID;
                                }
                                
                                $newOrder->EX_COMMENTS     = 'PROCESSING';
                                $newOrder->save();
                                
                            } else {
                                 
                                $checkExistPrevious = SalesOrderDetailstem::where('WIP',  $this->wip)
                                    ->orderBY('ID','desc')
                                    ->take(1)
                                    ->first();
                                
                                 SalesOrderDetailstem::where('WIP',  $this->wip)
                                    ->orderBY('ID','desc')
                                    ->take(1)
                                    ->update([
                                        // 'QTY'        => $qty,
                                        'ITEM'        => $checkExistPrevious->ITEM.' '.$slNO,
                                        'DESCRIPTION' => $checkExistPrevious->DESCRIPTION.' '. str_replace('/', ' ', $row['description']),
                                    ]);  
                                    
                            
                               
                            }
                        }
                        
                       
                    } else if( empty($row['slno']) && is_numeric($qty) && $qty > 0  ) {
    
                        $newOrderList =  SalesOrderDetailstem::where('WIP',  $this->wip)->orderBY('ID','desc')->first();
    
                            $checckEmpaty = SalesOrderDetailstem::where('WIP',  $this->wip)
                                ->orderBY('ID','desc')
                                ->first();
                        
                           
                            if(empty($checckEmpaty->QTY)) {
                                
                                SalesOrderDetailstem::where('WIP',  $this->wip)
                                ->orderBY('ID','desc')
                                ->take(1)
                                ->update([
                                    'QTY' => $qty,
                                ]); 
                            }
                               
                        
                    } else if(!empty($row['description']) || !empty($row['slno'])  ) {
                        
                       
                         $newOrderList =  SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->first();
    
                       
                        if(!empty($newOrderList->DESCRIPTION)) {
                            
                            $desc =  $newOrderList->DESCRIPTION.' '.$row['description'];
                           
                            $manufacturer = explode('Manufacturer:', $row['description']);
                           
                            if(!empty($manufacturer[1])) {
                                
                              SalesOrderDetailstem::where('WIP',  $this->wip)
                                 ->where('ID',  $newOrderList->ID)
                                ->update([
                                    'SUPPLIER' => trim($manufacturer[1]),
                                ]); 
                            }
                            
                            $manufacturer_space = explode('Manufacturer :', $row['description']);
                           
                            if(!empty($manufacturer_space[1])) {
                                
                              SalesOrderDetailstem::where('WIP',  $this->wip)
                                 ->where('ID',  $newOrderList->ID)
                                ->update([
                                    'SUPPLIER' => trim($manufacturer_space[1]),
                                ]); 
                            }
                            
                            $checkDelivery = explode('Delivery', $newOrderList->DESCRIPTION);
                            
                            if(empty($checkDelivery[1])) {
                                
                                SalesOrderDetailstem::where('WIP',  $this->wip)
                         
                                ->where('ID',  $newOrderList->ID)
                                ->update([
                                    'DESCRIPTION' => str_replace('/', ' ', $desc),
                                ]);  
                            }
                           
                           
                        
                        }
                        
                        $tableData = DB::table('w2t_sales_image')
                            ->where('uniq_id',$this->wip['sesison_id'])
                            ->where('cell_number', $indexNumber)
                            ->first();
                            
                        if(!empty($tableData)){
                            
                            
                            $salesInfo = SalesOrderDetailstem::where('WIP',  $this->wip)
                                ->orderBY('ID','desc')
                                ->first();
                            
                            $imageID = $tableData->ID;
                            
                            if(!empty($salesInfo->IMAGE_ID) ) {
                                $imageID = $salesInfo->IMAGE_ID.','. $tableData->ID;
                            }
                             SalesOrderDetailstem::where('WIP',  $this->wip)
                                ->orderBY('ID','desc')
                                ->take(1)
                                ->update([
                                    'THUMBNAIL_IMAGE' => $tableData->image,
                                    'IMAGE_ID'        => $imageID,
                                ]);
                                
                        }
                        
                        
                    } else {
                        
                        $tableData = DB::table('w2t_sales_image')
                            ->where('uniq_id',$this->wip['sesison_id'])
                            ->where('cell_number', $indexNumber)
                            ->first();
                            
                        if(!empty($tableData)){
                            
                            $salesInfo = SalesOrderDetailstem::where('WIP',  $this->wip)
                                ->orderBY('ID','desc')
                                ->first();
                            
                            $imageID = $tableData->ID;
                            
                            if(!empty($salesInfo->IMAGE_ID) ) {
                                $imageID = $salesInfo->IMAGE_ID.','. $tableData->ID;
                            }
                             SalesOrderDetailstem::where('WIP',  $this->wip)
                                ->orderBY('ID','desc')
                                ->take(1)
                                ->update(
                                [
                                    'THUMBNAIL_IMAGE' => $tableData->image,
                                    'IMAGE_ID' => $imageID,
                                ]);
                        }
                        
                    }
                     
                }
            }
=======
                                        'SUPPLIER' => $supplier,
                                    ]); 
                            }
                        }
                    }
                    
                    
                }   else if(!empty($row['description']) || !empty($row['code']) ) {
                    
                    
                    $newOrder =  SalesOrderDetailstem::where('WIP',  $this->wip)->orderBY('ID','desc')->first();
                     
                    // if(!empty($newOrder->DESCRIPTION)) {
                        
                    //   $desc =  $newOrder->DESCRIPTION.' '.$row['description'];
                       
                    //     SalesOrderDetailstem::where('WIP',  $this->wip)
                    //         ->orderBY('ID','desc')
                    //         ->take(1)
                    //         ->update([
                    //             'DESCRIPTION' => str_replace('/', ' ', $desc),
                    //         ]);
                       
                    
                    // }
                    
                    $manufacturer = explode('Manufacturer:', $row['description']);
                       
                    if(!empty(trim($manufacturer[1]))) {
                        
                        $manufacturerWithWaranty = explode('Warranty:', $manufacturer[1]);
                       
                        if(!empty($manufacturerWithWaranty[0])) {
                            $supplier = trim($manufacturerWithWaranty[0]);
                            
                        } else {
                            $supplier = trim($manufacturer[1]);
                        }
                       
                        SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->take(1)
                            ->update([
                                'SUPPLIER' => $supplier,
                            ]); 
                    }
                        
                    $tableData = DB::table('w2t_sales_image')
                        ->where('uniq_id',$this->wip['sesison_id'])
                        ->where('cell_number', $indexNumber)
                        ->first();
                        
                    if(!empty($tableData)){
                        
                        
                        $salesInfo = SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->first();
                        
                        $imageID = $tableData->ID;
                        
                        if(!empty($salesInfo->IMAGE_ID) ) {
                            $imageID = $salesInfo->IMAGE_ID.','. $tableData->ID;
                        }
                         SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->take(1)
                            ->update([
                                'THUMBNAIL_IMAGE' => $tableData->image,
                                'IMAGE_ID'        => $imageID,
                            ]);
                            
                    }
                    
                } else {
                    
                    $tableData = DB::table('w2t_sales_image')
                        ->where('uniq_id',$this->wip['sesison_id'])
                        ->where('cell_number', $indexNumber)
                        ->first();
                        
                    if(!empty($tableData)){
                        
                        $salesInfo = SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->first();
                        
                        $imageID = $tableData->ID;
                        
                        if(!empty($salesInfo->IMAGE_ID) ) {
                            $imageID = $salesInfo->IMAGE_ID.','. $tableData->ID;
                        }
                         SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->take(1)
                            ->update(
                            [
                                'THUMBNAIL_IMAGE' => $tableData->image,
                                'IMAGE_ID' => $imageID,
                            ]);
                    }
                    
                }
                
            } else {
              
                $indexNumber =  'B'. $keyNumber;
                // echo "<pre>";
                // print_r($row);
                
                if( !empty($row['slno']) && is_numeric($row['qty']) && $row['qty'] > 0  ) {

                    $tableData = DB::table('w2t_sales_image')
                        ->where('uniq_id',$this->wip['sesison_id'])
                        ->where('cell_number', $indexNumber)
                        ->first();
         
                    $salesOrderHeader = SalesOrderHeader::where('WIP', $this->wip['wip'])->first();
                    
                    if(!empty($salesOrderHeader)) {
        
                        $slNO = !empty($row['slno']) ? $row['slno'] : '';
                        
                        $checkExist = SalesOrderDetailstem::where('WIP', $this->wip['wip'])
                            ->where('ITEM', $slNO)
                            ->where('QTY', $row['qty'] )
                            ->where('temp_time', $this->wip['sesison_id'] )
                            ->first();
                            
                        if(empty($checkExist)){
                            
                            $newOrder = new SalesOrderDetailstem;
                            $newOrder->WIP               = $this->wip['wip'];
                            $newOrder->ITEM              = $slNO;
                            $newOrder->QTY               = $row['qty'];
                            $newOrder->DESCRIPTION       =  str_replace('/', ' ', $row['description']);
                            $newOrder->temp_time         = $this->wip['sesison_id'];
                            $newOrder->EXP_HANDOVER_DT   = $salesOrderHeader->TGT_HANDOVER_DT;
                            $newOrder->EXP_DELIVERY      = $salesOrderHeader->TGT_HANDOVER_DT;
                            $newOrder->comments          = '';
                            
                            if(!empty($tableData)) {
                                $newOrder->THUMBNAIL_IMAGE = $tableData->image;
                                $newOrder->IMAGE_ID       = $tableData->ID;
                            }
                            
                            $newOrder->EX_COMMENTS     = 'PROCESSING';
                            $newOrder->save();
                        }
                    }
                    
                    
                } else if( !empty($row['slno']) && !is_numeric($row['qty']) && !empty($row['description']) ) {

                    $tableData = DB::table('w2t_sales_image')
                        ->where('uniq_id',$this->wip['sesison_id'])
                        ->where('cell_number', $indexNumber)
                        ->first();
         
                    $salesOrderHeader = SalesOrderHeader::where('WIP', $this->wip['wip'])->first();
                    
                    if(!empty($salesOrderHeader)) {
        
                        $slNO = !empty($row['slno']) ? $row['slno'] : '';
                        
                        $checkExist = SalesOrderDetailstem::where('WIP', $this->wip['wip'])
                            ->where('ITEM', $slNO)
                            ->where('QTY', $row['qty'] )
                            ->where('temp_time', $this->wip['sesison_id'] )
                            ->first();
                            
                        if(empty($checkExist)){
                            
                            $newOrder = new SalesOrderDetailstem;
                            $newOrder->WIP               = $this->wip['wip'];
                            $newOrder->ITEM              = $slNO;
                            $newOrder->QTY               = 0;
                            $newOrder->DESCRIPTION       =  str_replace('/', ' ', $row['description']);
                            $newOrder->temp_time         = $this->wip['sesison_id'];
                            $newOrder->EXP_HANDOVER_DT   = $salesOrderHeader->TGT_HANDOVER_DT;
                            $newOrder->EXP_DELIVERY      = $salesOrderHeader->TGT_HANDOVER_DT;
                            $newOrder->comments          = '';
                            
                            if(!empty($tableData)) {
                                $newOrder->THUMBNAIL_IMAGE = $tableData->image;
                                $newOrder->IMAGE_ID       = $tableData->ID;
                            }
                            
                            $newOrder->EX_COMMENTS     = 'PROCESSING';
                            $newOrder->save();
                        }
                    }
                    
                    
                } else if( empty($row['slno']) && is_numeric($row['qty']) && $row['qty'] > 0  ) {

                    $newOrderList =  SalesOrderDetailstem::where('WIP',  $this->wip)->orderBY('ID','desc')->first();

                   
                        SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->take(1)
                            ->update([
                                'QTY' => $row['qty'],
                            ]); 
                            
                    
                } else if(!empty($row['description']) || !empty($row['slno']) ) {
                    
                     $newOrderList =  SalesOrderDetailstem::where('WIP',  $this->wip)->orderBY('ID','desc')->first();

                   
                    if(!empty($newOrderList->DESCRIPTION)) {
                        
                       $desc =  $newOrderList->DESCRIPTION.' '.$row['description'];
                       
                        $manufacturer = explode('Manufacturer:', $row['description']);
                       
                        if(!empty($manufacturer[1])) {
                            
                          SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->take(1)
                            ->update([
                                'SUPPLIER' => trim($manufacturer[1]),
                            ]); 
                        }
                       
                        SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->take(1)
                            ->update([
                                'DESCRIPTION' => str_replace('/', ' ', $desc),
                            ]);
                       
                    
                    }
                    
                    $tableData = DB::table('w2t_sales_image')
                        ->where('uniq_id',$this->wip['sesison_id'])
                        ->where('cell_number', $indexNumber)
                        ->first();
                        
                    if(!empty($tableData)){
                        
                        
                        $salesInfo = SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->first();
                        
                        $imageID = $tableData->ID;
                        
                        if(!empty($salesInfo->IMAGE_ID) ) {
                            $imageID = $salesInfo->IMAGE_ID.','. $tableData->ID;
                        }
                         SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->take(1)
                            ->update([
                                'THUMBNAIL_IMAGE' => $tableData->image,
                                'IMAGE_ID'        => $imageID,
                            ]);
                            
                    }
                    
                } else {
                    
                    $tableData = DB::table('w2t_sales_image')
                        ->where('uniq_id',$this->wip['sesison_id'])
                        ->where('cell_number', $indexNumber)
                        ->first();
                        
                    if(!empty($tableData)){
                        
                        $salesInfo = SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->first();
                        
                        $imageID = $tableData->ID;
                        
                        if(!empty($salesInfo->IMAGE_ID) ) {
                            $imageID = $salesInfo->IMAGE_ID.','. $tableData->ID;
                        }
                         SalesOrderDetailstem::where('WIP',  $this->wip)
                            ->orderBY('ID','desc')
                            ->take(1)
                            ->update(
                            [
                                'THUMBNAIL_IMAGE' => $tableData->image,
                                'IMAGE_ID' => $imageID,
                            ]);
                    }
                    
                }
                 
            }
          
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
   
    }
    
  public function drawings()
{
    $drawing = new Drawing();
    $drawing->setName('Logo');
    $drawing->setDescription('This is my logo');
    $drawing->setPath(public_path('/img/vir.png'));
    $drawing->setHeight(90);
    $drawing->setCoordinates('B3');
print_r($drawing);
    return $drawing;
}

}