  
function planHtml3(){      
        return '  <div id="planContainer">'
                + '<div class="row">'
                             + '<div class="col-lg-12">'
                               + '<p style="color: red;text-transform: uppercase;"><strong>Director Details. (* All fields )</strong></p><hr>'
                              + '</div>'
                              + '<div class="col-lg-6">'
                               + '<div class="form-group">'
                                 + '<label for="exampleInputPassword1">Full name</label>'
                                 + '<input type="text" class="form-control" placeholder="Director Full name" name="director_name[]" value="">'
                               + '</div>'
                               + '<div class="form-group">'
                                 + '<label for="exampleInputEmail1">Email address</label>'
                                  + '<input type="email" class="form-control" id="email" name="director_email[]" placeholder="Enter Director email" value="">'
                               + '</div>'
                                + '<div class="form-group">'
                                 + '<label for="exampleInputPassword1">Director Phone</label>'
                                 + '<input type="text" name="director_phone[]" class="form-control" placeholder="Director Primary Phone" value="">'
                               + '</div>'
                               + '<div class="form-group">'
                                 + '<label for="exampleInputPassword1">BVN Number</label>'
                                 + '<input type="text" name="bvn[]" class="form-control" placeholder="Director BVN" value="">'
                               + '</div>'
                             + '</div>'
                              + '<div class="col-lg-6">'
                                + '<div class="form-group">'
                                 + '<label for="exampleInputPassword1">New Birth Date</label>'
                                 + '<div class="append-icon">'
                                   + '<input type="date" name="new_birth[]" class="form-control" placeholder="Select a date..." value="">'
                                   + '<i class="icon-calendar"></i>'
                                 + '</div>'
                               + '</div>'
                               + '<div class="form-group">'
                                 + '<label for="exampleInputPassword1">Date Join Ministry</label>'
                                   + '<div class="append-icon">'
                                   + '<input type="date" class="form-control" placeholder="Select a date..." name="join_date[]" value="">'
                                   + '<i class="icon-calendar"></i>'
                                 + '</div>'
                               + '</div>'
                            + '<div class="form-group">'
                                 + '<label for="exampleInputPassword1">Service Group</label>'
                                  + '<input type="text" name="group[]" class="form-control" placeholder="Service Group in Church" id="p_phone" value="">'
                               + '</div>'
                                + '<div class="form-group">'
                                 + '<label for="exampleInputPassword1">WOFBI status</label>'
                                  + '<div class="input-group">'
                                 + '<div class="col-sm-12">'
                                 + '<div class="icheck-inline">'
                                  + ' <label>'
                                  + '<input type="checkbox" data-checkbox="icheckbox_square-blue" value="BCC" name="wofbi[]"> BCC</label>'
                                   + '<label>'
                                   + '<input type="checkbox" data-checkbox="icheckbox_square-blue" value="LCC" name="wofbi[]"> LCC</label>'
                                   + '<label>'
                                   + '<input type="checkbox" data-checkbox="icheckbox_square-blue" value="LDC" name="wofbi[]"> LDC</label>'
                                   + '<a class="btn btn-danger remove" style="display:inline-block">Remove </a>'
                                  + '</div>' 
                                 + '</div>'
                              + ' </div>'
                                 + ' </div>'
                              + '</div>'
                            + '</div>'
                             + '</div>';
    
}


function planHtml(){   
         return '  <div id="planContainer">'
                        +  '<div class="col-sm-3">'
                        +  '<div class="form-group">'
                        + '<label for="exampleInputPassword1">Equipment name</label>'
                        +  '<input type="text" name="equip_name" class="form-control" placeholder="Equipment name" id="p_phone">'
                        +  '</div>'
                        +  '</div>'
                        +  '<div class="col-sm-2">'
                        +  '<div class="form-group">'
                        +  '<label for="exampleInputPassword1">Quantity</label>'
                        +  '<input type="number" name="equip_number" class="form-control" placeholder="Quantity" id="p_phone">'
                        +  '</div>'
                        +  '</div>'
                        +  '<div class="col-sm-5">'
                        +  '<div class="form-group">'
                        +  '<label>Equipment Image</label>'
                        +  '<div class="fileinput fileinput-new input-group" data-provides="fileinput">'
                        +  '<div class="form-control" data-trigger="fileinput">'
                        +  '<i class="glyphicon glyphicon-file fileinput-exists"></i><span class="fileinput-filename"></span>'
                        +  '</div>'
                        +  '<span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Choose...</span><span class="fileinput-exists">Change</span>'
                        +  '<input type="file" name="equip_image[]">'
                        +  '</span>'
                        +  '<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>'
                        +  '</div>'
                        +  '</div>'
                        +  '</div>'
                        +  '<div class="col-sm-2">'
                        +  '<div class="form-group">'
                        +  '<label for="exampleInputPassword1">&nbsp;</label>'
                        +  ' <a class="btn btn-danger remove" style="display:block">Remove</a>'
                        +  '</div>'
                        +  '</div>'
                    +  '</div>';
    }

function planHtml2(){   
         return '<div class="col-lg-12">'
                                + '<div class="col-lg-4">'
                                + '<div class="form-group">'
                                + '<label>Document Name</label>'
                                + '<select class="form-control"  name="document[]" data-search="true">'
                                + '<option value="8">Bank reference number</option>'
                                 + '<option value="7">Professional Registration</option>'
                                 + '<option value="6">Referral Notes</option>'
                                 + '<option value="5">TIN Number</option>'
                                 + '<option value="4">Form CO2</option>'
                                 + '<option value="3">Memorandum and Article of Association</option>'
                                 + '<option value="2">Company Profile</option>'
                                + ' <option value="1">Letter of introduction</option>'                           
                                + '</select>'
                                + '</div>'
                                + '</div>'
                               + ' <div class="col-lg-6">'
                               + ' <div class="form-group">'
                                + '  <label>Upload Document (PDF/Word)</label>'
                                + '  <div class="fileinput fileinput-new input-group" data-provides="fileinput">'
                                + '    <div class="form-control" data-trigger="fileinput">'
                                + '      <i class="glyphicon glyphicon-file fileinput-exists"></i><span class="fileinput-filename"></span>'
                                 + '   </div>'
                                 + '   <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Choose...</span><span class="fileinput-exists">Change</span>'
                                + '    <input type="file" name="document_file[]">'
                                + '    </span>'
                                + '    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>'
                                + '  </div>'
                                + '</div>'
                               + ' </div>'
                              + '  <div class="col-sm-2">'
                              + ' <div class="form-group">'
                              + '  <label for="exampleInputPassword1">&nbsp;</label>'
                             + '   <a id="addMore2" class="btn btn-danger remove" style="display:block">Remove </a>'
                            + '    </div>'
                           + ' </div>'
                          + '   </div>';
    }



     $("#addMore3").click(function(e){
        $('#planContainer3').append(planHtml3());
        
    });
    
    $(document).on('click', '.remove', function () {
        $(this).parent().parent().parent().parent().parent().parent().parent().remove();
    });
    
    $("#addMore2").click(function(e){
        $('#planContainer1').append(planHtml2());
        
    });
    
    $(document).on('click', '.remove2', function () {
        $(this).parent().parent().parent().remove();
    });
    
    $("#addMore").click(function(e){
        $('#planContainer').append(planHtml());
        
    });
    
    $(document).on('click', '.remove', function () {
        $(this).parent().parent().parent().remove();
    });
