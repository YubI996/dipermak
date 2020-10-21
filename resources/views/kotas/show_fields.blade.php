<!-- Nama Kota Field -->
<div class="form-group">
    {!! Form::label('nama_kota', 'Nama Kota:') !!}
    <p>{{ $kota->nama_kota }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kota->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kota->updated_at }}</p>
</div>

