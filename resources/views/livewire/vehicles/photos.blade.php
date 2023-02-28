<!-- imageupload.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

   <style>
        .galeria
        {
            display: flex;
            flex-wrap: wrap;
            justify-items: self-start;
            margin: 10px;
            border: 20px;
            padding: 10px;
        }
        .marco-foto
        {
            border: 1px solid blue;
            box-shadow: 5px 5px 2px 1px rgba(172, 173, 178, 0.712);
        }
    </style>
</head>
<body>
<div class="container">

    <h1 class="bg-success text-center">
        {{ $vehicle->model_year }}
        {{ $vehicle->make->name }}
        {{ $vehicle->model->name }}
        {{ $vehicle->style->name }}
    </h1>

    {{-- Muestra las fotos del vehículo y permite borrarlas --}}
    <div class="galeria">

        @foreach ($vehicle->photos as $photo )
            <div class="galeria">
                <div class="card">
                    <div class="text-center">

                        <img src="{{ asset('images/vehicles/photos/' .  $photo->path) }}" class="marco-foto" alt="..." height="75px" width="75px">
                    </div>
                    <div class="text-center mb-5 py-5">
                        <form method="post" action="{{url('admin/vehicles/photos/delete')}}" >
                            <input type="hidden" name="photo" value="{{ $photo->id }}" id="photo">
                            @csrf
                            <button type="submit" class="btn bg-danger">{{ __('Delete Photo') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Zona para agregar imágenes --}}
        <form method="post" action="{{url('admin/vehicles/photos/store')}}" enctype="multipart/form-data"
                    class="dropzone mb-2" id="dropzone">
            <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}" id="vehicle_id">
            @csrf

        <div class="dz-message" data-dz-message><span>{{ __('Drag & Drop max')  . ' ' . __('Photos') }}</span></div>
        </form>

    {{-- Botón para regresar a vehículos --}}
    <div>
        <a href="{{route('vehicles')}}">
            <button class="mt-5 py-15 btn bg-success">{{ __('RETURN TO VEHICLES LIST') }}</button>
        </a>
    </div>
<script type="text/javascript">
        Dropzone.options.dropzone =
         {

            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp,jfif",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file)
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("manager/vehicles/image/delete") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },

            success: function(file, response)
            {
                location.reload();
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>
</body>
</html>
