    $(function() {
            $('input[name="exp_delivery_box"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="exp_handover_box"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
        });
    // WIP NUMBER
    $(document).on('click', '.wip_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.WIP_td').show();
       
    });
    
    function saveWIP() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var WIP = $("#WIP_box").val();
       
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
                        'WIP': WIP,
                        'type':1
                    },
                    url: baseUrl +'/sales_details_comments_update' , 
                    success: function(html) {
                        $(".wip_box_text").html(WIP);
                        $('.showCommentsDetails').hide();
                        $('.WIP_td').hide();
                        
                        $.ajax({
                            type: "POST",
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'id': $(this).attr('id'),
                                'detailsID': detailsID,
        
                            },
                            url: baseUrl +'/sales_details_update_list' , 
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
            url: baseUrl +'/sales_details_comments_update' , 
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
                    url: baseUrl +'/sales_details_update_list' , 
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
            url: baseUrl +'/sales_details_comments_update' , 
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
                    url: baseUrl +'/sales_details_update_list' , 
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
                'type':4
            },
            url: baseUrl +'/sales_details_comments_update' , 
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
                    url: baseUrl +'/sales_details_update_list' , 
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
    $(document).on('click', '.exp_delivery_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.exp_delivery_td').show();
        
       
    });
    
    function saveexDelivery() {
        
        var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
        var EXP_DELIVERY = $("#exp_delivery_box").val();
        
        Swal.fire({
          title: 'Are you sure?',
          text: "Be careful please !  All related details will be updated with this.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, updated it!'
        }).then((result) => {
            
            if (result.isConfirmed) {
                $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'detailsID': detailsID,
                'EXP_DELIVERY': EXP_DELIVERY,
                'type':5
            },
            url: baseUrl +'/sales_details_comments_update' , 
            success: function(html) {
                $(".EXP_DELIVERY_box_text").html(EXP_DELIVERY);
                $('.showCommentsDetails').hide();
                $('.exp_delivery_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/sales_details_update_list' , 
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
    $(document).on('click', '.exp_handover_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.exp_handover_td').show();
   
       
    });
    
    function saveexpHandover() {
        
        var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
        var EXP_HANDOVER_DT = $("#exp_handover_box").val();
        
        Swal.fire({
          title: 'Are you sure?',
          text: "Be careful please !  All related details will be updated with this.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, updated it!'
        }).then((result) => {
            
            if (result.isConfirmed) {
                
                $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'detailsID': detailsID,
                'EXP_HANDOVER_DT': EXP_HANDOVER_DT,
                'type':6
            },
            url: baseUrl +'/sales_details_comments_update' , 
            success: function(html) {
                $(".exp_handover_box_text").html(EXP_HANDOVER_DT);
                $('.showCommentsDetails').hide();
                $('.exp_delivery_td').hide();
                
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/sales_details_update_list' , 
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
    $(document).on('click', '.ex_comments_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.ex_comments_td').show();
       
    });
    
    function saveEXComments() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var EX_COMMENTS = $("#ex_comments_box").val();
        
        Swal.fire({
          title: 'Are you sure?',
          text: "Be careful please !  All related details will be updated with this.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, updated it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'detailsID': detailsID,
                'EX_COMMENTS': EX_COMMENTS,
                'type':7
            },
            url: baseUrl +'/sales_details_comments_update' , 
            success: function(html) {
                $(".ex_comments_box_text").html(EX_COMMENTS);
                $('.showCommentsDetails').hide();
                $('.ex_comments_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/sales_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
            }
        })
     
    }
    
    
    $(document).on('click', '.comments_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.comments_td').show();
       
    });
    
    function saveComments() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var comments = $("#comments_box").val();
        
        Swal.fire({
          title: 'Are you sure?',
          text: "Be careful please !  All related details will be updated with this.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, updated it!'
        }).then((result) => {
           if (result.isConfirmed) {        
            $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'detailsID': detailsID,
                'COMMENTS': comments,
                'type':8
            },
            url: baseUrl +'/sales_details_comments_update' , 
            success: function(html) {
                $(".comments_box_text").html(comments);
                $('.showCommentsDetails').hide();
                $('.comments_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/sales_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
        
            }
        })
     
    }
    
    
    $(document).on('click', '.supplierCopyToAll', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.suppler_td').show();
       
    });
    
    function saveSupplierBox() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var supplier_box = $("#supplier_box").val();
        
        Swal.fire({
          title: 'Are you sure?',
          text: "Be careful please !  All related details will be updated with this.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, updated it!'
        }).then((result) => {
           if (result.isConfirmed) {        
            $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'detailsID': detailsID,
                'supplier_box': supplier_box,
                'type':9
            },
            url: baseUrl +'/sales_details_comments_update' , 
            success: function(html) {
                $(".supplier_box_text").html(supplier_box);
                $('.showCommentsDetails').hide();
                $('.suppler_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/sales_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
        
            }
        })
     
    }
    
    
    function edit(ID){
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
        
        $("#EXP_HANDOVER_DT_"+ID).hide();
        $("#EXP_HANDOVER_DT_input_"+ID).show();
        
        $("#EX_COMMENTS_" + ID ).hide();
        $("#EX_COMMENTS_input_"+ID).show();
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
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
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#wip_"+ID).html(first);
                }
            });
    
    })
    
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
            url: baseUrl +'/sales_details_update' , 
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
            url: baseUrl +'/sales_details_update' , 
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
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                  // $("#DESCRIPTION_"+ID).html(first);
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': ID,
                    },
                    url: baseUrl +'/sales-details-descraption' , 
                    success: function(resultDecraption) {
                        $(".descraption_result_" + ID).html(resultDecraption);
                    }
                });
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
            url: baseUrl +'/sales_details_update' , 
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
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#EXP_DELIVERY_"+ID).html(first);
                }
            });
    
    })
    .change(function() { });
    
    $(document).on('keyup click change', '.editEXP_HANDOVER_DT', function() {

        var ID    = $(this).attr('id');
        
        $("#EXP_HANDOVER_DT_"+ID).hide();
        $("#EXP_HANDOVER_DT_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EXP_HANDOVER_DT_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EXP_HANDOVER_DT': $("#EXP_HANDOVER_DT_input_"+ID).val(),
                'type':6
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#EXP_HANDOVER_DT_"+ID).html(first);
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
            url: baseUrl +'/sales_details_update' , 
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
                'type':8
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    }).change(function() { });
   
    $(document).on('keyup click', '.editSUPPLIER', function() {

        var ID    = $(this).attr('id');
        
        $("#SUPPLIER_"+ID).hide();
        $("#SUPPLIER_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SUPPLIER_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SUPPLIER': $("#SUPPLIER_input_"+ID).val(),
                'type':9
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#SUPPLIER_"+ID).html(first);
            }
        });
    }).change(function() { });
   
    $(document).on('keyup click', '.editITEMTEMP', function() {

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
                'type':11
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#ITEM_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click', '.editDESCRIPTIONTEMP', function() {

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
                'type': 12
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#DESCRIPTION_"+ID).html(first);
                }
            });
    
    }).change(function() {});
     
    $(document).on('keyup click', '.editQtyTEMP', function() {

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
                'type':13
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#QTY_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editEXP_DELIVERYTEMP', function() {

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
                'type':14
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#EXP_DELIVERY_"+ID).html(first);
                }
            });
    
    })
    .change(function() { });
    
    $(document).on('keyup click change', '.editEXP_HANDOVER_DTTEMP', function() {

        var ID    = $(this).attr('id');
        
        $("#EXP_HANDOVER_DT_"+ID).hide();
        $("#EXP_HANDOVER_DT_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EXP_HANDOVER_DT_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EXP_HANDOVER_DT': $("#EXP_HANDOVER_DT_input_"+ID).val(),
                'type':15
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#EXP_HANDOVER_DT_"+ID).html(first);
                }
            });
    
    }).change(function() { });

    $(document).on('keyup click', '.editEX_COMMENTSTEMP', function() {

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
                'type': 16
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#EX_COMMENTS_"+ID).html(first);
                }
            });
    
    }).change(function() { });
     
    $(document).on('keyup click', '.editCOMMENTSTEMP', function() {

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
                'type':17
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    
    
        