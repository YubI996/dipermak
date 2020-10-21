<!-- Keg Id Field -->
<div class="form-group">
    {!! Form::label('keg_id', 'Keg Id:') !!}
    <p>{{ $partisipasi->keg_id }}</p>
</div>

<!-- Deskripsi Field -->
<div class="form-group">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $partisipasi->deskripsi }}</p>
</div>

<!-- Jenis Field -->
<div class="form-group">
    {!! Form::label('jenis', 'Jenis:') !!}
    <p>{{ $partisipasi->jenis }}</p>
</div>

<!-- Nominal Field -->
<div class="form-group">
    {!! Form::label('nominal', 'Nominal:') !!}
    <p>{{ $partisipasi->nominal }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $partisipasi->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $partisipasi->updated_at }}</p>
</div>

