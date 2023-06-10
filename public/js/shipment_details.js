// WIP NUMBER
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
                        'type':1
                    },
                    url: baseUrl +'/shipment_details_copy_update' , 
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
                            url: baseUrl +'/shipment_details_update_list' , 
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
    $(document).on('click', '.container_no_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.container_no_td').show();
       
    });
    
    function saveContainer() {
        
        var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
        var CONTAINER_NO = $("#container_no_box").val();
        
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
                'CONTAINER_NO': CONTAINER_NO,
                'type':2
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".item_box_text").html(CONTAINER_NO);
                $('.showCommentsDetails').hide();
                $('.item_td').hide();
                
                 $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
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
    $(document).on('click', '.vessel_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.vessel_td').show();
       
    });
    
    function saveVessel() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var VESSEL = $("#vessel_box").val();
        
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
                'VESSEL': VESSEL,
                'type':3
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".vessel_box_id").html(VESSEL);
                $('.showCommentsDetails').hide();
                $('.vessel_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
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
            url: baseUrl +'/shipment_details_copy_update' , 
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
                    url: baseUrl +'/shipment_details_update_list' , 
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
                'type':5
            },
            url: baseUrl +'/shipment_details_copy_update' , 
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
                    url: baseUrl +'/shipment_details_update_list' , 
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
                'type':6
            },
            url: baseUrl +'/shipment_details_copy_update' , 
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
                    url: baseUrl +'/shipment_details_update_list' , 
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
    $(document).on('click', '.supplier_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.supplier_td').show();
        
       
    });
    
    function saveSupplier() {
        
        var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
        var SUPPLIER = $("#supplier_box").val();
        
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
                'SUPPLIER': SUPPLIER,
                'type':7
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".exp_handover_box_text").html(SUPPLIER);
                $('.showCommentsDetails').hide();
                $('.exp_handover_td').hide();
                
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
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
    $(document).on('click', '.po_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.po_no_td').show();
   
       
    });
    
    function savePoNo() {
        
        var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
        var PO_NO = $("#po_no_box").val();
        
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
                'PO_NO': PO_NO,
                'type':8
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".exp_handover_box_text").html(PO_NO);
                $('.showCommentsDetails').hide();
                $('.po_no_td').hide();
                
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
            }
        });
     
    }
    
    //   // EX- COMMENTS 
    // $(document).on('click', '.wip_copy_to_all', function() {
    //     $('.showCommentsDetails').show();
    //     $('.box_header').hide();
    //     $('.wip_td').show();
       
    // });
    
    // function saveWIP() {
        
    //      var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
    //      var WIP = $("#wip_box").val();
        
    //     Swal.fire({
    //       title: 'Are you sure?',
    //       text: "Be careful please !  All related details will be updated with this.",
    //       icon: 'warning',
    //       showCancelButton: true,
    //       confirmButtonColor: '#3085d6',
    //       cancelButtonColor: '#d33',
    //       confirmButtonText: 'Yes, updated it!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //         type: "POST",
    //         data: {
    //             '_token': $('input[name=_token]').val(),
    //             'id': $(this).attr('id'),
    //             'detailsID': detailsID,
    //             'WIP': WIP,
    //             'type':9
    //         },
    //         url: baseUrl +'/shipment_details_copy_update' , 
    //         success: function(html) {
    //             $(".ex_comments_box_text").html(WIP);
    //             $('.showCommentsDetails').hide();
    //             $('.wip_td').hide();
                
    //             $.ajax({
    //                 type: "POST",
    //                 data: {
    //                     '_token': $('input[name=_token]').val(),
    //                     'id': $(this).attr('id'),
    //                     'detailsID': detailsID,

    //                 },
    //                 url: baseUrl +'/shipment_details_update_list' , 
    //                 success: function(html) {
    //                     $(".list_of_card_result").html(html);
                    
    //                 }
    //             });
    //         }
    //     });
    //         }
    //     })
     
    // }
    
     // EX- COMMENTS 
    $(document).on('click', '.wip_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.waireHouse_td').show();
       
    });
    
    function saveWare() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var waireHuseDate = $("#waireHuseDate").val();
        
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
                'waireHuseDate': waireHuseDate,
                'type':9
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".ex_comments_box_text").html(waireHuseDate);
                $('.showCommentsDetails').hide();
                $('.waireHouse_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
            }
        })
     
    }
    
    $(document).on('click', '.receivecopy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.receive_date_td ').show();
       
    });
    
    function savereceiveDate() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var receiveDate = $("#receiveDate").val();
        
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
                'SHIPMENT_RECD_DATE': receiveDate,
                'type':18
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".ex_comments_box_text").html(receiveDate);
                $('.showCommentsDetails').hide();
                $('.receive_date_td ').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
            }
        })
     
    }
    
    
    
     
    
    $(document).on('click', '.item_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.item_td').show();
       
    });
    
    function saveITEM() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var ITEM = $("#item_box").val();
        
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
                'ITEM': ITEM,
                'type':10
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".comments_box_text").html(ITEM);
                $('.showCommentsDetails').hide();
                $('.item_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
        
            }
        })
     
    }
    
    
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
          confirmButtonText: 'Yes, updated it!'
        }).then((result) => {
           if (result.isConfirmed) {        
            $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'detailsID': detailsID,
                'DESCRIPTION': DESCRIPTION,
                'type':11
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".supplier_box_text").html(DESCRIPTION);
                $('.showCommentsDetails').hide();
                $('.description_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
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
         var COMMENTS = $("#comments_box").val();
        
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
                'COMMENTS': COMMENTS,
                'type':12
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".supplier_box_text").html(COMMENTS);
                $('.showCommentsDetails').hide();
                $('.comments_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
        
            }
        })
     
    }
    
    
    $(document).on('click', '.act_exf_date_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.exp_confirm_td').show();
       
    });
    
    function saveexpConfirm() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var ACT_EXF_DATE = $("#exp_confirm").val();
        
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
                'ACT_EXF_DATE': ACT_EXF_DATE,
                'type':13
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".supplier_box_text").html(ACT_EXF_DATE);
                $('.showCommentsDetails').hide();
                $('.exp_confirm_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
        
            }
        })
     
    }
    
    
    $(document).on('click', '.vessel_selling_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.vessel_selling_td').show();
       
    });
    
    function SaveSellingVessel() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var VESSEL_SAILING_DATE = $("#vessel_selling_box").val();
        
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
                'VESSEL_SAILING_DATE': VESSEL_SAILING_DATE,
                'type':15
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".supplier_box_text").html(VESSEL_SAILING_DATE);
                $('.showCommentsDetails').hide();
                $('.vessel_selling_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
        
            }
        })
     
    }
    
    $(document).on('click', '.mbl_mawb_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.MBL_MAWB_td').show();
       
    });
    
    function saveMBLMAWB() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var MBL_MAWB = $("#MBL_MAWB_BOX").val();
        
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
                'MBL_MAWB': MBL_MAWB,
                'type':14
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".MBL_MAWB_td").html(MBL_MAWB);
                $('.showCommentsDetails').hide();
                $('.suppler_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
        
            }
        })
     
    }
    
    
    
     $(document).on('click', '.pconfirmed_eta_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.exp_confirm_etd_td').show();
       
    });
    
    function saveexpConfirmETA() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var CONFIRMED_ETA = $("#exp_confirm_eta").val();
        
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
                'CONFIRMED_ETA': CONFIRMED_ETA,
                'type':16
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".supplier_box_text").html(CONFIRMED_ETA);
                $('.showCommentsDetails').hide();
                $('.exp_confirm_etd_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
        
            }
        })
     
    }
    
    $(document).on('click', '.shipment_status_copy_to_all', function() {
        $('.showCommentsDetails').show();
        $('.box_header').hide();
        $('.shipment_status_td').show();
       
    });
    
    function saveShipmentStatus() {
        
         var detailsID = $.map($('input[name="details_id"]'), function(c){return c.value; })
         var SHIPMENT_STATUS = $("#shipment_status_box").val();
        
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
                'SHIPMENT_STATUS': SHIPMENT_STATUS,
                'type':17
            },
            url: baseUrl +'/shipment_details_copy_update' , 
            success: function(html) {
                $(".supplier_box_text").html(SHIPMENT_STATUS);
                $('.showCommentsDetails').hide();
                $('.shipment_status_td').hide();
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).attr('id'),
                        'detailsID': detailsID,

                    },
                    url: baseUrl +'/shipment_details_update_list' , 
                    success: function(html) {
                        $(".list_of_card_result").html(html);
                    
                    }
                });
            }
        });
        
            }
        })
     
    }
    
    
    $(function() {
        
            $('input[name="receiveDate"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="waireHuseDate"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="exp_confirm_eta"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="vessel_selling_box"]').daterangepicker({
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
            
             $('input[name="exp_confirm"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            
            
        });
    