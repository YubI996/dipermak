<!-- Nama Keg Field -->
<div class="form-group">
    {!! Form::label('nama_keg', 'Nama Keg:') !!}
    <p>{{ $kegiatan->nama_keg }}</p>
</div>

<!-- Rt Id Field -->
<div class="form-group">
    {!! Form::label('rt_id', 'Rt Id:') !!}
    <p>{{ $kegiatan->rt_id }}</p>
</div>

<!-- Tgl Mulai Field -->
<div class="form-group">
    {!! Form::label('tgl_mulai', 'Tgl Mulai:') !!}
    <p>{{ $kegiatan->tgl_mulai }}</p>
</div>

<!-- Tgl Selesai Field -->
<div class="form-group">
    {!! Form::label('tgl_selesai', 'Tgl Selesai:') !!}
    <p>{{ $kegiatan->tgl_selesai }}</p>
</div>

<!-- Approval Field -->
<div class="form-group">
    {!! Form::label('approval', 'Approval:') !!}
    <p>{{ $kegiatan->approval }}</p>
</div>

<!-- Jen Keg Field -->
<div class="form-group">
    {!! Form::label('jen_keg', 'Jen Keg:') !!}
    <p>{{ $kegiatan->jen_keg }}</p>
</div>

<!-- Pagu Field -->
<div class="form-group">
    {!! Form::label('pagu', 'Pagu:') !!}
    <p>{{ $kegiatan->pagu }}</p>
</div>

<!-- Volume Field -->
<div class="form-group">
    {!! Form::label('volume', 'Volume:') !!}
    <p>{{ $kegiatan->volume }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kegiatan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kegiatan->updated_at }}</p>
</div>

