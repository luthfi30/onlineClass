    @extends('admin.layout')
    @section('sub-judul','Form Create course')
    @section('content')

        @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
            <div class="alert alert-highlighted alert-danger" role="alert">
                {{ $error }}
            </div>
            @endforeach
        @endif
        @if(Session::has('success'))
            <div class="alert alert-highlighted alert-success" role="alert">
                {{ Session('success') }}
            </div>
        @endif
        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationServer01">Title</label>
                    <input type="text" class="form-control" id="validationServer01" placeholder="Masukan Title Course" name="title" >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                 <div class="col-md-12 mb-3">
                    <label for="validationServer01">About</label>
                    <input type="text" class="form-control" id="validationServer01" placeholder="Masukan About Course" name="about" >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="type">Mentor </label>
                    <select class="form-select" aria-label="Default select example" name="mentor_id">
                        <option selected>Pilih Mentor</option>
                        @foreach($mentor as $m)
                        <option value="{{ $m->id }}">{{$m->name}}</option>
                        @endforeach
                    </select>
                
                </div>
                <div class="col-md-12 mb-3">
                    <label for="type">Category </label>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        <option selected >Pilih Category</option>
                        @foreach ($category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="type">Level </label>
                    <select class="form-select" aria-label="Default select example" name="level">
                        <option>Pilih Level</option>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advance">Advance</option>
                    </select>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="type">Type </label>
                    <select class="form-select" aria-label="Default select example" name="type">
                        <option>Pilih Type</option>
                        <option value="free">Free</option>
                        <option value="premium">premium</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="type">Status </label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected>-Pilih Status-</option>
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationServer01">Price</label>
                    <input type="number" class="form-control" id="validationServer01" placeholder="Masukan Harga" name="price" >
                </div>

                <div class="col-md-3 mb-3">
                    <label for="validationServer02">Thumbnail</label>
                    <input type="file" class="form-control" id="validationServer02" placeholder="" name="thumbnail" > 
                </div>

                   <div class="col-md-3 mb-3">
                    <label for="validationServer02">Materi</label>
                    <input type="file" class="form-control" id="validationServer02" placeholder="" name="materi" > 
                </div>

                <div class="col-md-12 mt-3">
                    <label for="validationServer01">Description</label>
                </div>

                <div class="col-md-12 mb-3">
                    <textarea id="mytextarea" cols="243" rows="25" name="description"></textarea>
                </div>
            <input type="submit" class="btn btn-primary">
        </div>
        </form>
        
        

        
    @endsection