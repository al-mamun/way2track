function save() {
    location.reload();    
}

function dropdownList() {
    $('.dropdown_menu_list').slideToggle();
}

$( function() {
    $('#sortable').sortable({
        axis: 'y',
      
        update: function (event, ui) {
            
             var sort = $(this).sortable('toArray');
            
            // POST to server using $.post or $.ajax
            $.ajax({
                 data: {
                    '_token': $('input[name=_token]').val(),
                    'type': 4,
                    'sortable_name': sort,
                    
                },
                type: 'POST',
                url: baseUrl +'/sortable/data/sync', 
            });
        }
    });
    
    $('#sortableOrderDHeader').sortable({
        axis: 'y',
      
        update: function (event, ui) {
           
             var sort = $(this).sortable('toArray');
            
            // POST to server using $.post or $.ajax
            $.ajax({
                data: {
                    '_token': $('input[name=_token]').val(),
                    'type': 1,
                    'sortable_name': sort,
                    
                  
                },
                type: 'POST',
                url: baseUrl +'/sortable/data/sync', 
            });
        }
    });
    
    $('#sortableOrderDetails').sortable({
        axis: 'y',
      
        update: function (event, ui) {
           
             var sort = $(this).sortable('toArray');
            
            // POST to server using $.post or $.ajax
            $.ajax({
                data: {
                    '_token': $('input[name=_token]').val(),
                    'type': 2,
                    'sortable_name': sort,
                    
                  
                },
                type: 'POST',
                url: baseUrl +'/sortable/data/sync', 
            });
        }
    });
    
    
    $('#sortablepageHeader').sortable({
        axis: 'y',
      
        update: function (event, ui) {
           
             var sort = $(this).sortable('toArray');
            
            // POST to server using $.post or $.ajax
            $.ajax({
                data: {
                    '_token': $('input[name=_token]').val(),
                    'type': 3,
                    'sortable_name': sort,
                    
                  
                },
                type: 'POST',
                url: baseUrl +'/sortable/data/sync', 
            });
        }
    });
    
    
     $('#ShipmentDetailssortable').sortable({
        axis: 'y',
      
        update: function (event, ui) {
           
             var sort = $(this).sortable('toArray');
            
            // POST to server using $.post or $.ajax
            $.ajax({
                data: {
                    '_token': $('input[name=_token]').val(),
                    'type': 6,
                    'sortable_name': sort,
                    
                  
                },
                type: 'POST',
                url: baseUrl +'/sortable/data/sync', 
            });
        }
    });
} );

    function saveChecked_data (index, list, type) {
  
        var value = $('input[name="checkbox_list_'+ index +'"]:checked').val();
        var status = 0;
        
        if( value == 1) {
            status = 1;
        } else {
            status = 0;
        }
       $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'page_name': list,
                'status': status,
                'type'  : type,
              
            },
            url: baseUrl +'/purchase/details/column/switch', 
            success: function(HTML) {
                 $("#purchase_id_" + ID ).after(HTML);
            }
        
        });
    }