<!-- Keg Id Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('keg_id', 'Kegiatan') !!}
    </div>
    <div class="col-md-11">
        <p>: {{ $partisipasi->kegiatan->nama_keg }}</p>
    </div>
</div>

<!-- Rt Id Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('rt_id', 'RT') !!}
    </div>
    <div class="col-md-11">
        <p>:{{'RT '.$partisipasi->rt->nama_rt.' Kelurahan '.$partisipasi->rt->kelurahan->nama_kel }}</p>
    </div>
</div>

<!-- Deskripsi Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('deskripsi', 'Deskripsi') !!}
    </div>
    <div class="col-md-11">
        <p>: {{ $partisipasi->deskripsi }}</p>
    </div>
</div>

<!-- Jenis Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('jenis', 'Jenis Partisipasi') !!}
    </div>
    <div class="col-md-11">
        <p>: {{ $partisipasi->jenis }}</p>
    </div>
</div>

<!-- Nominal Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('nominal', 'Nominal') !!}
    </div>
    <div class="col-md-11">
        <p>: {{ 'Rp '.number_format($partisipasi->nominal,2,',','.') }}</p>
    </div>
</div>

