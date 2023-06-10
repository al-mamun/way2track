$(document).on('click', '.shipment_id_copy_to_all', function() {
    $('.showCommentsDetails').show();
    $('.box_header').hide();
    $('.shipment_id_td').show();
   
});

function shipmentIDSAVE() {
    
     var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
     var shipment_id = $("#shipment_id_box").val();
   
     Swal.fire({
      title: 'Are you sure?',
      text: "Be careful please !  All related details will be updated with this.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        
       if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $(this).attr('id'),
                    'detailsID': detailsID,
                    'shipment_id': shipment_id,
                    'type': 2
                },
                url: baseUrl +'/delivery_details_copy_update' , 
                success: function(html) {
                    $(".wip_box_text").html(shipment_id);
                    $('.showCommentsDetails').hide();
                    $('.WIP_td').hide();
                    
                    $.ajax({
                        type: "POST",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'id': $(this).attr('id'),
                            'detailsID': detailsID,
    
                        },
                        url: baseUrl +'/delivery_details_update_list' , 
                        success: function(html) {
                            $(".list_of_card_result").html(html);
                        
                        }
                    });
                }
            });
        }
    });
    

 
}

// ITEM NUMBER
$(document).on('click', '.delivery_id_copy_to_all', function() {
    $('.showCommentsDetails').show();
    $('.box_header').hide();
    $('.delivery_td').show();
   
});

function saveDeliveryID() {
    
    var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
    var DELIVERY_ID = $("#delivery_id_box").val();
    
    Swal.fire({
      title: 'Are you sure?',
      text: "Be careful please !  All related details will be updated with this.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        
       if (result.isConfirmed) {
            $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'detailsID': detailsID,
            'DELIVERY_ID': DELIVERY_ID,
            'type':1
        },
        url: baseUrl +'/delivery_details_copy_update' , 
        success: function(html) {
            $(".item_box_text").html(DELIVERY_ID);
            $('.showCommentsDetails').hide();
            $('.delivery_td').hide();
            
             $.ajax({
                type: "POST",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $(this).attr('id'),
                    'detailsID': detailsID,

                },
                url: baseUrl +'/delivery_details_update_list' , 
                success: function(html) {
                    $(".list_of_card_result").html(html);
                
                }
            });
        }
    });
        
       }
    
     });
 
}


// descriptio NUMBER
$(document).on('click', '.po_no_copy_to_all', function() {
    $('.showCommentsDetails').show();
    $('.box_header').hide();
    $('.po_no_td').show();
   
});

function savePONO() {
    
     var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
     var PO_NO = $("#po_no_box").val();
    
    Swal.fire({
      title: 'Are you sure?',
      text: "Be careful please !  All related details will be updated with this.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        
    if (result.isConfirmed) {
           
            $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'detailsID': detailsID,
            'PO_NO': PO_NO,
            'type':3
        },
        url: baseUrl +'/delivery_details_copy_update' , 
        success: function(html) {
            $(".po_no_td").html(PO_NO);
            $('.showCommentsDetails').hide();
                // $('.po_no_td').hide();
            
            $.ajax({
                type: "POST",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $(this).attr('id'),
                    'detailsID': detailsID,

                },
                url: baseUrl +'/delivery_details_update_list' , 
                success: function(html) {
                    $(".list_of_card_result").html(html);
                
                }
            });
        }
    });
        }
    
    });
 
}


// Qty NUMBER
$(document).on('click', '.qty_copy_to_all', function() {
    $('.showCommentsDetails').show();
    $('.box_header').hide();
    $('.qty_td').show();
   
});

function saveQty() {
    
     var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
     var QTY = $("#qty_box").val();
    
    Swal.fire({
      title: 'Are you sure?',
      text: "Be careful please !  All related details will be update with this.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        
        if (result.isConfirmed) {
        
            $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'detailsID': detailsID,
            'QTY': QTY,
            'type':6
        },
        url: baseUrl +'/delivery_details_copy_update' , 
        success: function(html) {
            $(".qty_box_text").html(QTY);
            $('.showCommentsDetails').hide();
            $('.qty_td').hide();
            
            $.ajax({
                type: "POST",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $(this).attr('id'),
                    'detailsID': detailsID,

                },
                url: baseUrl +'/delivery_details_update_list' , 
                success: function(html) {
                    $(".list_of_card_result").html(html);
                
                }
            });
        }
    });
        }
    
    });
 
}

// Qty NUMBER
$(document).on('click', '.item_copy_to_all', function() {
    $('.showCommentsDetails').show();
    $('.box_header').hide();
    $('.item_td').show();
   
});

function saveItem() {
    
     var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
     var ITEM = $("#item_box").val();
    
    Swal.fire({
      title: 'Are you sure?',
      text: "Be careful please !  All related details will be update with this.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        
        if (result.isConfirmed) {
        
            $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'detailsID': detailsID,
            'ITEM': ITEM,
            'type':4
        },
        url: baseUrl +'/delivery_details_copy_update' , 
        success: function(html) {
            $(".qty_box_text").html(ITEM);
            $('.showCommentsDetails').hide();
            $('.item_td').hide();
            
            $.ajax({
                type: "POST",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $(this).attr('id'),
                    'detailsID': detailsID,

                },
                url: baseUrl +'/delivery_details_update_list' , 
                success: function(html) {
                    $(".list_of_card_result").html(html);
                
                }
            });
        }
    });
        }
    
    });
 
}



$(document).on('click', '.description_copy_to_all', function() {
    $('.showCommentsDetails').show();
    $('.box_header').hide();
    $('.descraption_td').show();
   
});

function saveDescraption() {
    
    var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
    var DESCRIPTION = $("#descraption_box").val();
    
    Swal.fire({
      title: 'Are you sure?',
      text: "Be careful please !  All related details will be updated with this.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        if (result.isConfirmed) { 
            $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'detailsID': detailsID,
            'DESCRIPTION': DESCRIPTION,
            'type':5
        },
        url: baseUrl +'/delivery_details_copy_update' , 
        success: function(html) {
            $(".descraption_box").html(DESCRIPTION);
            $('.showCommentsDetails').hide();
            $('.descraption_td').hide();
            
            $.ajax({
                type: "POST",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $(this).attr('id'),
                    'detailsID': detailsID,

                },
                url: baseUrl +'/delivery_details_update_list' , 
                success: function(html) {
                    $(".list_of_card_result").html(html);
                
                }
            });
        }
    });
        }
    });
 
}


 $(document).on('click', '.delivery_date_copy_to_all', function() {
    $('.showCommentsDetails').show();
    $('.box_header').hide();
    $('.delivery_date_td').show();
   
});

function saveDeliveryDate() {
    
    var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
    var DELIVERY_DATE = $("#delivery_date_box").val();
    Swal.fire({
      title: 'Are you sure?',
      text: "Be careful please !  All related details will be updated with this.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        if (result.isConfirmed) { 
            
            $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'detailsID': detailsID,
            'DELIVERY_DATE': DELIVERY_DATE,
            'type':7
        },
        url: baseUrl +'/delivery_details_copy_update' , 
        success: function(html) {
            $(".eta_box_text").html(DELIVERY_DATE);
            $('.showCommentsDetails').hide();
            $('.delivery_date_td').hide();
            
            $.ajax({
                type: "POST",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $(this).attr('id'),
                    'detailsID': detailsID,

                },
                url: baseUrl +'/delivery_details_update_list' , 
                success: function(html) {
                    $(".list_of_card_result").html(html);
                
                }
            });
        }
    });
        }
    });
 
}

$(function() {
        
    $('input[name="delivery_date_box"]').daterangepicker({
        timePicker: false,
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
          format: 'DD/MMM/YYYY'
        }
    });
            
});