@extend('admin.admin_master')
@section('admin_main_content')

<script type="text/javascript">
    function check_delete()
    {
        check=confirm("Are you sure to Delete this ?");
        if(check)
        {
            return true;
        }
        else
            return false;
    }

</script>

<!-- start: Content -->



    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage medicine Form</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            
                            
                            <th>Medicine ID</th>
                            <th>Medicine Name</th>
                            <th>Manufacturer</th>
                            <th>Medicine Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        foreach ($all_medicine as $v_medicine)
                        
                        { ?>

                        <tr>
                            <td>{{$v_medicine->medicine_id}}</td>
                            <td>{{$v_medicine->medicine_name}}</td>
                            <td>{{$v_medicine->manufacturer_name}}</td>
                            
                            <td><img src="{{asset($v_medicine->medicine_image)}}" width="50" height="70"/></td>
                            
                            
                            <td class="center">
                                <?php
                                 if($v_medicine->publication_status == 1 )
                                {?>
                                <span class="label label-success">Published</span>
                                
                                <?php } 
                                else if($v_medicine->publication_status == 0 )
                                    { ?>
                                <span class="label label-deactive">Unpublished</span>
                                <?php }?>
                            </td>
                            
                            <td class="center">
                                <?php
                                 if($v_medicine->publication_status == 1 )
                                {?>
                                <a class="btn btn-danger" href="{{URL::to('/unpublished-medicine/'.$v_medicine->medicine_id)}}" title="Press to Unpublished">
                                    <i class="halflings-icon white thumbs-down"></i>                                            
                                </a>
                                
                                <?php } 
                                else if($v_medicine->publication_status == 0 )
                                    { ?>
                                  <a class="btn btn-success" href="{{URL::to('/published-medicine/'.$v_medicine->medicine_id)}}" title="Press to Published">
                                    <i class="halflings-icon white thumbs-up"></i>                                            
                                </a>
                                <?php }?>
                                
                              
                                <a class="btn btn-success" href="{{URL::to('/view-medicine/'.$v_medicine->medicine_id)}}" title="View"><i class="halflings-icon white eyes"></i></a>
                                
                                <a class="btn btn-info" href="{{URL::to('/edit-medicine/'.$v_medicine->medicine_id)}}" title="Edit"><i class="halflings-icon white edit"></i></a>

                                <a class="btn btn-danger" href="{{URL::to('/delete-medicine/'.$v_medicine->medicine_id)}}" title="Delete" onclick="return check_delete()">
                                    <i class="halflings-icon white trash"></i> 

                                </a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->
    </div>

@endsection
