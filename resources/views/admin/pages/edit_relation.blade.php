@extend('admin.admin_master')
@section('admin_main_content')

<!-- start: Content -->


 <script type="text/javascript">
    function validateForm() {
    var category_id = document.forms["myForm"]["category_id"].value;
    var sub_category_id = document.forms["myForm"]["sub_category_id"].value;
    var publication_status = document.forms["myForm"]["publication_status"].value;
    if (category_id == "-1") {
        document.getElementById('erc').innerHTML='Required *';
        return false;
    }
    if (sub_category_id == "-1") {
        document.getElementById('ersc').innerHTML='Required *';
        return false;
    }
    if (publication_status == "-1") {

        document.getElementById('ers').innerHTML="Required *";
        return false;
    }
}
</script> 




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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Relation Form</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <h3 style="color:green">
                <?php 
                  echo Session::get('message');
                  echo Session::put('message','');
                ?>
                
            </h3>
            
            <div class="box-content">
                <form class="form-horizontal"  method="POST" name="myForm" onsubmit="return validateForm();" action="{{URL::to('/update-relation')}}">
                            {{ csrf_field() }}
                
                    <fieldset>
                        <input type="hidden" name="relation_id" value="{{$relation_info->relation_id}}"class="span6 typeahead" id="typeahead" > 
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Category Name</label>
                            <div class="controls">
                                <select name="category_id" id="category_id">
                                    <option value="{{$relation_info->category_id}}">{{$relation_info->category_name}}</option>
                                    @foreach($all_category as $v_category)
                                    <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                                    @endforeach
                                </select><span style="color: red" id=erc></span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Sub Category Name</label>
                            <div class="controls">
                                <select name="sub_category_id" id="sub_category_id">
                                    <option value="{{$relation_info->sub_category_id}}">{{$relation_info->sub_category_name}}</option>
                                    @foreach($all_sub_category as $v_sub_category)
                                    <option value="{{$v_sub_category->sub_category_id}}">{{$v_sub_category->sub_category_name}}</option>
                                    @endforeach
                                </select><span style="color: red" id=ersc></span>
                            </div>
                        </div>
                        
                            
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Relation Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="category_description" rows="3"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Relation</button>
                            
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

 




</div><!--/.fluid-container-->

@endsection