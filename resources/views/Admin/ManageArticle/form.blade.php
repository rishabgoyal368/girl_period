<?php
if (isset($article_details)) {
    $title = 'Edit';
    $action = url('admin/manage-article/edit/' . $article_details['id']);
} else {
    $title = 'Add';
    $action = url('admin/manage-article/add');
}
?>
@extends('Admin.Layout.app')
@section('title',$title .' '.$label)
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-90">

                    <h4 class=""> {{ $title }} {{$label}}</h4>

                </div>
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div class="row">
            <div class="col-lg-12">

                <!--widget card begin-->
                <div class="card m-b-30">
                    <div class="card-body ">
                        <form action="{{ $action }}" method="post" id="add_edit_article" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Title</label>
                                    <textarea name="title" class="form-control">{{ @$article_details['title'] }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Description</label>
                                    <textarea id="mytextarea" name="description">{{ @$article_details['description'] }}</textarea>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php  
                                        if (!empty(@$article_details['image'])) {
                                            $image = @$article_details['image'];
                                        }else{
                                            $image =  DefaultImgPath;
                                        }
                                    ?>
                                    <img src="{{$image}}" id="old_image" alt="No image" height="150px" width="150px" class="prof_img img-fluid" accept=".jpg,.png,.gif,.jpeg">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="image">Image</label>
                                    @if(@$article_details['image'])
                                     <input type="file" name="image" id="img_upload"  class="img_cls">
                                    @else
                                     <input type="file" name="image" id="img_upload"  class="img_cls" required>
                                    @endif
                                </div>
                            </div>
                            <label id="img_upload-error" class="error" for="img_upload"></label>


                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary">
                                <a href="{{url('/admin/manage-article')}}" class="btn btn-info">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!--widget card ends-->



            </div>
        </div>


    </div>
</section>
<!-- assets\js\tinymce\tinymce.min.js -->
<script src="{{ asset('assets/js/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
<script type="text/javascript">
    $('#add_edit_article').validate({
        rules: {
            title: {
                required: true,
                minlength: 5,
                maxlength: 200,
            },
            description: {
                required: true,
            },
        },
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#img_upload').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();
                // alert(ext); return false;

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'png')
                {
                    input = document.getElementById('img_upload');

                    readURL(this);
                }
            } else{

                $(this).val('');
                alert('Please select an image of .jpeg, .jpg, .png file format.');
            }

        });

    });
</script>
@endsection