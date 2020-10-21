<!-- Nama Kel Field -->
<div class="form-group">
    {!! Form::label('nama_kel', 'Nama Kel:') !!}
    <p>{{ $kelurahan->nama_kel }}</p>
</div>

<!-- Kec Id Field -->
<div class="form-group">
    {!! Form::label('kec_id', 'Kec Id:') !!}
    <p>{{ $kelurahan->kec_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kelurahan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kelurahan->updated_at }}</p>
</div>

