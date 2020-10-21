<!-- Nama Kec Field -->
<div class="form-group">
    {!! Form::label('nama_kec', 'Nama Kec:') !!}
    <p>{{ $kecamatan->nama_kec }}</p>
</div>

<!-- Kota Id Field -->
<div class="form-group">
    {!! Form::label('kota_id', 'Kota Id:') !!}
    <p>{{ $kecamatan->kota_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kecamatan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kecamatan->updated_at }}</p>
</div>

