<?php
  
namespace App\Imports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\PoDetails;
use App\Models\PoDetailsTemp;
<<<<<<< HEAD
use App\Models\PoHeader;
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
use Input;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;

class PurchaseImport implements ToModel, WithHeadingRow,WithStartRow,WithPreCalculateFormulas
{
     public function  __construct($wip)
    {
        $this->wip= $wip;
    }

     /**
     * @return int
     */
    public function startRow(): int
    {
        return 5;
    }

   public function headingRow(): int
    {
        return 6; //this should be the row number of heading row
    }

    public function collection()
    {
        // Add new row with Total cell
        $extendedArr = [
            $this->data
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
             $poHeader = PoHeader::where('PO_NO', $this->wip['po_no'])->first();
=======
        
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
       
            if(!empty($row['slno']) &&  is_numeric($row['qty']) && !empty($row['description']) && $row['qty'] > 0 ) {
                
                $poDetails = new PoDetailsTemp(); 
                $poDetails->PO_NO         = $this->wip['po_no'];
                $poDetails->ITEM          = $row['slno'];
                $poDetails->DESCRIPTION   = $row['description'];
                $poDetails->QTY           = $row['qty'];
<<<<<<< HEAD
                $poDetails->EXP_EXF_DT    = NULL;
                $poDetails->ETD           = NULL;
                $poDetails->ETA           = NULL;
                $poDetails->CONFIRMED_EXF = NULL;
=======
                $poDetails->EXP_EXF_DT    = date('Y-m-d');
                $poDetails->ETD           = date('Y-m-d');
                $poDetails->ETA           = date('Y-m-d');
                $poDetails->CONFIRMED_EXF = date('Y-m-d');
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                $poDetails->token         = $this->wip['session_id'];
                $poDetails->COMMENTS      = 'PROCESSING';
                $poDetails->save();
                
                                        
                // $newOrder = new PoDetails;
                // $newOrder->WIP             = '01-20220017-01';
                // $newOrder->ITEM            = $row['slno'];
                // $newOrder->Qty             = 1;
                // $newOrder->DESCRIPTION     = $row['description'];
                // $newOrder->comments        = '';
                // $newOrder->save();
            }   else if(!empty($row['description']) || !empty($row['slno']) ) {
                
                 $newOrder =  PoDetailsTemp::where('PO_NO',  $this->wip['po_no'])->orderBY('ID','desc')->first();
                 
                if(!empty($newOrder->DESCRIPTION)) {
                    
                   $desc =  $newOrder->DESCRIPTION.' '.$row['description'];
                   
                    PoDetailsTemp::where('PO_NO',  $this->wip['po_no'])
                        ->orderBY('ID','desc')
                        ->take(1)
                        ->update([
                            'DESCRIPTION' => $desc,
                        ]);
                   
                
                } 
               
                
            } 
   
    }
    
  

}