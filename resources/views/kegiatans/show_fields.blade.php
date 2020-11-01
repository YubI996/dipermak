<!-- Nama Keg Field -->
<div class="form-group">
    {!! Form::label('nama_keg', 'Nama Kegiatan :') !!}
    <p>{{ $kegiatan->nama_keg }}</p>
</div>

<!-- Rt Id Field -->
<div class="form-group">
    {!! Form::label('rt_id', 'RT :') !!}
    <p>{{'RT '.$kegiatan->rt->nama_rt.' Kelurahan '.$kegiatan->rt->kelurahan->nama_kel }}</p>
</div>

<!-- Tanggal Mulai Field -->
<div class="form-group">
    {!! Form::label('tgl_mulai', 'Tanggal Mulai :') !!}
    <p>{{ date('d F Y',strtotime($kegiatan->tgl_mulai)) }}</p>
</div>

<!-- Tanggal Selesai Field -->
<div class="form-group">
    {!! Form::label('tgl_selesai', 'Tanggal Selesai :') !!}
    <p>{{ date('d F Y',strtotime($kegiatan->tgl_selesai)) }}</p>
</div>

<!-- Approval Field -->
<div class="form-group">
    {!! Form::label('approval', 'Approval:') !!}
    <p>{{ $kegiatan->approval == 1 ? 'Disetujui' : 'Belum Disetujui' }}</p>
</div>

<!-- Jen Keg Field -->
<div class="form-group">
    {!! Form::label('jen_keg', 'Jenis Kegiatan :') !!}
    <p>{{$kegiatan->jenKeg->jenis_keg}}</p>
</div>

<!-- Pagu Field -->
<div class="form-group">
    {!! Form::label('pagu', 'Pagu :') !!}
    <p>{{ 'Rp '.number_format($kegiatan->pagu,2,',','.') }}</p>
</div>

<!-- Target Field -->
<div class="form-group">
    {!! Form::label('target', 'Target :') !!}
    <p>{{ 'Rp '.number_format($kegiatan->target,2,',','.') }}</p>
</div>

<!-- Persentase Field -->
<div class="form-group">
    {!! Form::label('target', 'Persentase Target :') !!}
    @php
        $p = $kegiatan->target/$kegiatan->pagu*100;
    @endphp
    <p>{{ number_format($p,2,',','.').'%' }}</p>
</div>

<!-- Volume Field -->
<div class="form-group">
    {!! Form::label('volume', 'Volume:') !!}
    <p>{{ $kegiatan->volume }}</p>
</div>

