<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Data Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('portalweb.update', $portal_web->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Title</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title', $portal_web->title) }}" placeholder="Masukkan Title Portal">
                            
                                <!-- error message untuk title -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="desc" value="{{ old('desc', $portal_web->desc) }}" placeholder="Masukkan Nama Divisi">
                            
                                <!-- error message untuk title -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="divisi" class="font-weight-bold">Id Divisi</label>
                                <select class="form-select" aria-label="Default select example" name="divisi_id">
                                    @foreach ($divisis as $div)
                                    @if(old('divisi_id', $portal_web->divisi_id) == $div->id)
                                        <option value="{{ $div->id }}" selected>{{ $div->name }}</option>
                                    @else
                                        <option value="{{ $div->id }}">{{ $div->name }} </option>
                                    @endif
                                    @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Link</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="link" value="{{ old('link', $portal_web->link) }}" placeholder="Masukkan Nama Divisi">
                            
                                <!-- error message untuk title -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>
</html>