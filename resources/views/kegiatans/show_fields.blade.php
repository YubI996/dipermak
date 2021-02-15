<!-- Nama Keg Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('nama_keg', 'Nama Kegiatan') !!}
    </div>
    <div class="col-md-11">
        <p>: {{ $kegiatan->nama_keg }}</p>
    </div>
</div>

<!-- Rt Id Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('rt_id', 'RT') !!}
    </div>
    <div class="col-md-11">
        <p>: {{'RT '.$kegiatan->rt->nama_rt.' Kelurahan '.$kegiatan->rt->kelurahan->nama_kel }}</p>
    </div>
</div>

<!-- Tanggal Mulai Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('tgl_mulai', 'Tanggal Mulai') !!}
    </div>
    <div class="col-md-11">
        <p>: {{ date('d F Y',strtotime($kegiatan->tgl_mulai)) }}</p>
    </div>
</div>

<!-- Tanggal Selesai Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('tgl_selesai', 'Tanggal Selesai') !!}
    </div>
    <div class="col-md-11">
        <p>: {{ date('d F Y',strtotime($kegiatan->tgl_selesai)) }}</p>
    </div>
</div>

<!-- Approval Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('approval', 'Approval:') !!}
    </div>
    <div class="col-md-11">
        <p>: {{ $kegiatan->approval == 1 ? 'Disetujui' : 'Belum Disetujui' }}</p>
    </div>
</div>

<!-- Jen Keg Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('jen_keg', 'Jenis Kegiatan') !!}
    </div>
    <div class="col-md-11">
        <p>: {{$kegiatan->jenKeg->jenis_keg}}</p>
    </div>
</div>

<!-- Pagu Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('pagu', 'Pagu') !!}
    </div>
    <div class="col-md-11">
        <p>: {{ 'Rp '.number_format($kegiatan->pagu,2,',','.') }}</p>
    </div>
</div>

<!-- Target Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('target', 'Target') !!}
    </div>
    <div class="col-md-11">
        <p>: {{ 'Rp '.number_format($kegiatan->target,2,',','.') }}</p>
    </div>
</div>

<!-- Persentase Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('target', 'Persentase Target') !!}
        </div>
        <div class="col-md-11">
            @php
            $p = $kegiatan->target/$kegiatan->pagu*100;
            @endphp
        <p>: {{ number_format($p,2,',','.').'%' }}</p>
        </div>
</div>

<!-- Volume Field -->
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('volume', 'Volume:') !!}
    </div>
    <div class="col-md-11">
        <p>: {{ $kegiatan->volume }}</p>
    </div>
</div>

