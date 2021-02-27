@extends('mold.app')

@section('content')
    @livewire('admin.index')
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            window.livewire.on('RT', data =>{
                alert('tesssssssssssssssssssssssssssssssssssssssst')
            })
            window.addEventListener('RT', event => {
                console.log("Hello world2");
                alert('Name updated to: ' + event.detail.rt);
                document.getElementById("tabel1").DataTable().ajax.reload();
                console.log("Hello world3");
            });
        });
    </script>
@endpush
