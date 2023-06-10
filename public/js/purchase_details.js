// WIP NUMBER
    $(document).on('click', '.po_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.PO_td').show();
        
       
    });
    
    function savePO() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var PO_NO = $("#PO_box").val();
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
                        'type':1
                    },
                    dataType:"json",
                    url: baseUrl +'/purchase_details_comments_update' , 
                    success: function(data) {
                        
                        if(data.status==401) {
                            $('.showCommentsDetails').hide();
                            $('.PO_td').hide();
                            $('#success').html('<div class="alert alert-danger"> '+ data.error +' </div>');
                            $('.print-error-msg ul').html('');
                            return true;
                         }
                        $(".po_box_text").html(PO_NO);
                        $('.showCommentsDetails').hide();
                        $('.PO_td').hide();
                        
                        
                        $.ajax({
                            type: "POST",
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'id': $(this).attr('id'),
                                'detailsID': detailsID,
        
                            },
                            url: baseUrl +'/purchase_details_update_list' , 
                            success: function(data) {
                                $(".list_of_card_result").html(data);
                            
                            }
                        });
                    }
                });
            }
        });
     
    }
    
    // ITEM NUMBER
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
                'ITEM': ITEM,
                'type':2
            },
            url: baseUrl +'/purchase_details_comments_update' , 
            success: function(html) {
                $(".item_box_text").html(ITEM);
                $('.showCommentsDetails').hide();
                $('.item_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/purchase_details_update_list' , 
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
    $(document).on('click', '.description_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.description_td').show();
       
    });
    
    function saveDescription() {
        
        var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
        var DESCRIPTION = $("#description_box").val();

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
                'type':3
            },
            url: baseUrl +'/purchase_details_comments_update' , 
            success: function(html) {
                $(".description_box_text").html(DESCRIPTION);
                $('.showCommentsDetails').hide();
                $('.description_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/purchase_details_update_list' , 
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
                'QTY': QTY,
                'type':4
            },
            url: baseUrl +'/purchase_details_comments_update' , 
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
                    url: baseUrl +'/purchase_details_update_list' , 
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
    $(document).on('click', '.exp_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.exp_td').show();
       
    });
    
    function saveexDelivery() {
        
        var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
        var EXP_EXF_DT = $("#exp_box").val();
        
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
                'EXP_EXF_DT': EXP_EXF_DT,
                'type':5
            },
            url: baseUrl +'/purchase_details_comments_update' , 
            success: function(html) {
                $(".exp_box_text").html(EXP_EXF_DT);
                $('.showCommentsDetails').hide();
                $('.exp_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/purchase_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
            }
        });
     
    }
    
     // exp_handover_td NUMBER
    $(document).on('click', '.exp_confirm_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.exp_confirm_td').show();
       
    });
    
    function saveexpConfirm() {
        
        var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
        var CONFIRMED_EXF = $("#exp_confirm").val();
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
                'CONFIRMED_EXF': CONFIRMED_EXF,
                'type':7
            },
            url: baseUrl +'/purchase_details_comments_update' , 
            success: function(html) {
                $(".exp_handover_box_text").html(CONFIRMED_EXF);
                $('.showCommentsDetails').hide();
                $('.exp_confirm_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/purchase_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
            }
        });
     
    }
    
      // EX- COMMENTS 
    $(document).on('click', '.comments_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.comments_td').show();
       
    });
    
    function saveComments() {
        
        var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
        var COMMENTS = $("#comments_box").val();
         
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
                'COMMENTS': COMMENTS,
                'type':6
            },
            url: baseUrl +'/purchase_details_comments_update' , 
            success: function(html) {
                $(".comments_box_text").html(COMMENTS);
                $('.showCommentsDetails').hide();
                $('.ex_comments_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/purchase_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
            }
        });
     
    }
    
    
    $(document).on('click', '.etd_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.etd_td').show();
       
    });
    
    function saveETD() {
        
        var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
        var ETD = $("#etd_box").val();
        
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
                'ETD': ETD,
                'type':8
            },
            url: baseUrl +'/purchase_details_comments_update' , 
            success: function(html) {
                $(".etd_box_text").html(ETD);
                $('.showCommentsDetails').hide();
                $('.etd_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/purchase_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
            }
        });
     
    }
    
    
     $(document).on('click', '.eta_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.eta_td').show();
       
    });
    
    function saveETA() {
        
        var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
        var ETA = $("#eta_box").val();
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
                'ETA': ETA,
                'type':9
            },
            url: baseUrl +'/purchase_details_comments_update' , 
            success: function(html) {
                $(".eta_box_text").html(ETA);
                $('.showCommentsDetails').hide();
                $('.eta_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/purchase_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
            }
        });
     
    }
    
// Edit input box click action
$(".editbox").mouseup(function() {
    return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
    $(".text").show();
});
function edit(ID) {
    $("#wip_"+ID).hide();
    $("#wip_input_"+ID).show();
    
    $("#ITEM_"+ID).hide();
    $("#ITEM_input_"+ID).show();
    
    $("#DESCRIPTION_" + ID ).hide();
    $("#DESCRIPTION_input_"+ID).show();
    
    $("#QTY_"+ID).hide();
    $("#QTY_input_"+ID).show();
    
    $("#EXP_DELIVERY_"+ID).hide();
    $("#EXP_DELIVERY_input_"+ID).show();
    
    $("#CONFIRMED_EXF_"+ID).hide();
    $("#CONFIRMED_EXF_input_"+ID).show();
    
    $("#EX_COMMENTS_" + ID ).hide();
    $("#EX_COMMENTS_input_"+ID).show();
    
    $("#COMMENTS_"+ID).hide();
    $("#COMMENTS_input_"+ID).show();
    
    $("#ETD_"+ID).hide();
    $("#ETD_input_"+ID).show();
    
    $("#ETA_"+ID).hide();
    $("#ETA_input_"+ID).show();
}

$(document).on('keyup click', '.edit_wip_no', function() {

    var ID    = $(this).attr('id');
    
    $("#wip_"+ID).hide();
    $("#wip_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#wip_input_"+ID).val();
    
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'wip_id': $("#wip_input_"+ID).val(),
            'type':1
        },
        url: baseUrl +'/purchase_details_update' , 
        success: function(html) {
            $("#wip_"+ID).html(first);
        }
    });

}).change(function() {});

$(document).on('keyup click', '.editITEM', function() {

    var ID    = $(this).attr('id');
    
    $("#ITEM_"+ID).hide();
    $("#ITEM_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#ITEM_input_"+ID).val();

    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'ITEM': $("#ITEM_input_"+ID).val(),
            'type':2
        },
        url: baseUrl +'/purchase_details_update' , 
        success: function(html) {
            $("#ITEM_"+ID).html(first);
        }
    });

}).change(function() {});

$(document).on('keyup click', '.editDESCRIPTION', function() {

    var ID    = $(this).attr('id');

    $("#DESCRIPTION_" + ID ).hide();
    $("#DESCRIPTION_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#DESCRIPTION_input_"+ID).val();

    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'DESCRIPTION': $("#DESCRIPTION_input_"+ID).val(),
            'type': 3
        },
        url: baseUrl +'/purchase_details_update' , 
        success: function(html) {
            $("#DESCRIPTION_"+ID).html(first);
        }
    });

}).change(function() {});

$(document).on('keyup click', '.editQty', function() {
    
    var ID    = $(this).attr('id');
    
    $("#QTY_"+ID).hide();
    $("#QTY_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#QTY_input_"+ID).val();

    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'QTY': $("#QTY_input_"+ID).val(),
            'type':4
        },
        url: baseUrl +'/purchase_details_update' , 
        success: function(html) {
            $("#QTY_"+ID).html(first);
        }
    });
}).change(function() { });

$(document).on('keyup click change', '.editEXP_DELIVERY', function() {

    var ID    = $(this).attr('id');
    
    $("#EXP_DELIVERY_"+ID).hide();
    $("#EXP_DELIVERY_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#EXP_DELIVERY_input_"+ID).val();
    
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'EXP_DELIVERY': $("#EXP_DELIVERY_input_"+ID).val(),
            'type':5
        },
        url: baseUrl +'/purchase_details_update' , 
        success: function(date) {
            $("#EXP_DELIVERY_"+ID).html(date);
        }
    });

})
.change(function() { });

$(document).on('keyup click change', '.editEXP_CONFIRMED_EXF', function() {

    var ID    = $(this).attr('id');
    
    $("#CONFIRMED_EXF_"+ID).hide();
    $("#CONFIRMED_EXF_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#CONFIRMED_EXF_input_"+ID).val();
    
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'CONFIRMED_EXF': $("#CONFIRMED_EXF_input_"+ID).val(),
            'type':7
        },
        url: baseUrl +'/purchase_details_update' , 
        success: function(date) {
            $("#CONFIRMED_EXF_"+ID).html(date);
        }
    });

}).change(function() { });

$(document).on('keyup click', '.editEX_COMMENTS', function() {

    var ID    = $(this).attr('id');
    
    $("#EX_COMMENTS_" + ID ).hide();
    $("#EX_COMMENTS_input_"+ID).show();

    var ID    = $(this).attr('id');
    var first = $("#EX_COMMENTS_input_"+ID).val();

    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'EX_COMMENTS': $("#EX_COMMENTS_input_"+ID).val(),
            'type': 7
        },
        url: baseUrl +'/purchase_details_update' , 
        success: function(html) {
            $("#EX_COMMENTS_"+ID).html(first);
        }
    });

}).change(function() { });

$(document).on('keyup click', '.editCOMMENTS', function() {
    
    var ID    = $(this).attr('id');
    
    $("#COMMENTS_"+ID).hide();
    $("#COMMENTS_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#COMMENTS_input_"+ID).val();
    
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'COMMENTS': $("#COMMENTS_input_"+ID).val(),
            'type':6
        },
        url: baseUrl +'/purchase_details_update' , 
        success: function(html) {
            $("#COMMENTS_"+ID).html(first);
        }
    });
}).change(function() { });
$(document).on('keyup click change', '.editETD', function() {

    var ID    = $(this).attr('id');
    
    $("#ETD_"+ID).hide();
    $("#ETD_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#ETD_input_"+ID).val();
    
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'ETD': $("#ETD_input_"+ID).val(),
            'type':8
        },
    url: baseUrl +'/purchase_details_update' , 
    success: function(date) {
        $("#ETD_"+ID).html(date);
    }
    });
}).change(function() { });

$(document).on('keyup click change', '.editETA', function() {

    var ID    = $(this).attr('id');
    
    $("#ETA_"+ID).hide();
    $("#ETA_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#ETA_input_"+ID).val();

    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'ETA': $("#ETA_input_"+ID).val(),
            'type':9
        },
        url: baseUrl +'/purchase_details_update' , 
        success: function(date) {
            $("#ETA_"+ID).html(date);
        }
    });
}).change(function() { });



$('#listOfOrderDetails').DataTable( {
    buttons: [
        {
            extend: 'excelHtml5',
            text: 'Export',
            title:'Export P.O. Details',
            exportOptions: {
                columns: [ 1,2,3,4,5,6,7,8,9 ]
            }
        }
    ],
     
    retrieve: true,
     // "orderFixed": [ 0, 'asc' ],
        // orderFixed: {'pre': [1, 'asc']},
        select: true,
    ordering: false,
    language: {
        "emptyTable": "No result found"
    },
    pageLength: 10,
    paging: true,
    // sDom: "Rlfrtip",
    dom: 'Bfrtip',
} );

$(function() {
            $('input[name="exp_box"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="exp_confirm"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="ETDBOX"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="ETABOX"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
        });