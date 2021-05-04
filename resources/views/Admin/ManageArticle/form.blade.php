@extends('Admin.Layout.app')
@section('title', 'Add'.' '.$label)
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-90">

                    <h4 class=""> Add {{$label}}</h4>

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
                        <form action="{{url('admin/manage-article/add')}}" method="post" id="add_edit_article">
                            @csrf
                            <input type="hidden" name="id" value="{{@$article['id']}}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Title</label>
                                    <textarea name="title" class="form-control">{{old('title') ?: @$article->title}}</textarea>
                                    @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Description</label>
                                    <textarea id="mytextarea" name="description">{{old('description') ?: @$article->description}}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
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
                minlength: 2,
                maxlength: 30,
            },
            description: {
                required: true,
            },
        },
    });
</script>
@endsection