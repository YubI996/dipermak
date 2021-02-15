<!-- Keg Id Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('keg_id', 'Kegiatan') !!}
    </div>
    <div class="col-md-11">
        <p> : {{ $dokumentasi->kegiatan->nama_keg }}</p>
    </div>
</div>

<!-- Rt Id Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('rt_id', 'RtT') !!}
    </div>
    <div class="col-md-11">
        <p> : {{'RT '.$dokumentasi->rt->nama_rt.' Kelurahan '.$dokumentasi->rt->kelurahan->nama_kel }}</p>
    </div>
</div>

<!-- Foto Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('foto', 'Foto') !!}
    </div>
    <div class="col-md-11">
        : <img src="{{ url('storage\\'.$dokumentasi->foto)}}" alt="{{'foto kegiatan'}}" width="40" height="40">
    </div>
</div>  

<!-- Keterangan Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('keterangan', 'Keterangan') !!}
    </div>
    <div class="col-md-11">
        <p> : {{ $dokumentasi->keterangan }}</p>
    </div>
</div>

