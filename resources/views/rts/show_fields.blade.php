<!-- Nama Rt Field -->
<div class="form-group">
    {!! Form::label('nama_rt', 'Nama Rt:') !!}
    <p>{{ $rt->nama_rt }}</p>
</div>

<!-- Kel Id Field -->
<div class="form-group">
    {!! Form::label('kel_id', 'Kel Id:') !!}
    <p>{{ $rt->kelurahan->nama_kel }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $rt->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $rt->updated_at }}</p>
</div>

