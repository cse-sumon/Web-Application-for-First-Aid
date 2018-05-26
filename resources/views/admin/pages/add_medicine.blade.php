@extend('admin.admin_master')
@section('admin_main_content')

<script type="text/javascript">
    function medicinevalidateForm(){
        var medicine_name=document.myForm.medicine_name.value;
        var uses_role=document.myForm.uses_role.value;
        var manufacturer_name=document.myForm.manufacturer_name.value;
        var medicine_image=document.myForm.medicine_image.value;
        var publication_status=document.myForm.publication_status.value;
        if(medicine_name==""){
            document.getElementById('ern').innerHTML="Required*";
            return false;
        }
    
        if(uses_role==""){
            document.getElementById('erur').innerHTML="Required*";
            return false;
        }
        if(manufacturer_name==""){
            document.getElementById('ermn').innerHTML="Required*";
            return false;
        }
         if(medicine_image==""){
            document.getElementById('ermi').innerHTML="Required*";
            return false;
        }
       
        if(publication_status=="-1"){
            document.getElementById('erps').innerHTML="Required*";
            return false;
        }
       
    }


</script>


<!-- start: Content -->



    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Forms</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add medicine Form</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <h3 style="color:green">
                <?php 
                  echo Session::get('message');
                   Session::put('message','');
                ?>
                
            </h3>
            
            <div class="box-content">
                <form name="myForm" onsubmit="return medicinevalidateForm();" class="form-horizontal" method="POST" action="{{URL::to('/save-medicine')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Medicine Name</label>
                            <div class="controls">
                                <input type="text" name="medicine_name"class="span6 typeahead" id="typeahead" > <span style="color: red" id="ern"></span>
                            </div>
                        </div>
                       
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Uses Role</label>
                            <div class="controls">
                                <input type="text" name="uses_role"class="span6 typeahead" id="typeahead" > <span style="color: red" id="erur"></span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Menufacturer Name</label>
                            <div class="controls">
                                <input type="text" name="manufacturer_name"class="span6 typeahead" id="typeahead" > <span style="color: red" id="ermn"></span>
                            </div>
                        </div>

                      
                            
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Medicine Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" name="medicine_description" rows="3"></textarea><span style="color: red" id="erbsd"></span>
                            </div>
                        </div>
                        
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Medicine Caution</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" name="medicine_caution" rows="3"></textarea><span style="color: red" id="erbld"></span>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Medicine Image</label>
                            <div class="controls">
                                <input type="file" name="medicine_image" class="btn file_import" id="typeahead" > <span style="color: red" id="ermi"></span>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Publication Status</label>
                            <div class="controls">
                                <select name="publication_status">
                                    <option value="-1">--- Select Status ---</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select><span style="color: red" id="erps"></span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="reset" class="btn">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save medicine</button>
                            
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

 




</div><!--/.fluid-container-->

@endsection