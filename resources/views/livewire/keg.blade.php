<div class="col-lg-4 ml-auto">
    <!-- kecamatan Field -->
    <div class="form-group row-sm-6">
        {!! Form::label('kecamatan', 'Kecamatan :') !!}
        {!! Form::select(null, $kecamatanItems, Request::old('kecamatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kecamatan','wire:model' => 'kec']) !!}
    </div>
    <!-- kelurahan Field -->
    <div class="form-group row-sm-6">
        {!! Form::label('kelurahan', 'Kelurahan :') !!}
        {!! Form::select(null, $kelurahanItems, Request::old('kelurahan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kelurahan','wire:model' => 'kel']) !!}
    </div>
    <!-- Rt Id Field -->
    <div class="form-group row-sm-6">
        {!! Form::label('rt_id', 'RT:') !!}
        {!! Form::select('rt_id', $rtItems,Request::old('rt_id'), ['class' => 'form-control','placeholder' => 'Pilih RT','wire:model' => 'rtid']) !!}
    </div>
    <div>
        {{$rtid}}
    </div>
</div>

<div class="col-lg-4 mr-auto"><p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p></div>