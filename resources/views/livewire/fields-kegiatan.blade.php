<div>
    <div>
        @if (isset($kegiatan))
            <input  type="hidden" value="{{$kegiatan->id}}" wire:model ="kid">
        @livewire('admin.pilihrt',['rtid'=>$kegiatan->rt_id])
        @else
            @livewire('admin.pilihrt')

        @endif
    </div>
    <hr>
            <!-- Nama Keg Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('nama_keg', 'Nama Kegiatan :') !!}
                    </div>
                    <div class="col-11">
                        {!! Form::textarea('nama_keg', null, ['class' => 'form-control mb-3', 'wire:key'=>'nama_keg.0', 'wire:model'=>'nama_keg.0']) !!}
                    </div>
                </div>
                
                {{-- Dashboard --}}
                <div>
                    <!-- Pagu Field -->

                    <div class="row mb-3">
                        <div class="col-1">
                            {!! Form::label('pagu', 'Pagu :     ') !!}
                        </div>
                        <div class="col-11">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    {!! Form::number('pagu', null, ['class' => 'form-control','maxlength' => 255,'wire:model' => 'pagu.0','wire:key' => 'pagu.0']) !!}
                                </div>
                            </div>
                    </div>

                    <!-- Target Field -->

                    <div class="row mb-3">
                        <div class="col-1">
                            {!! Form::label('target', 'Target:') !!}
                        </div>
                        <div class="col-3">
                                <div class="input-group">
                                    {!! Form::number(null, null, ['class' => 'form-control','maxlength' => 3,'placeholder' => 'Persentase','wire:model' => 'per.0', 'wire:key' => 'per.0']) !!}
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            %
                                        </div>
                                    </div>
                                </div>{{-- input group --}}
                        </div>
                        <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        Rp
                                        </div>
                                    </div>
                                    {!! Form::number('target', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Nominal','wire:model' => 'target.0','wire:key' => 'target.0']) !!}
                                </div>{{-- input group --}}
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-1">
                        {!! Form::label('sumber_dana', 'Sumber dana :') !!}
                    </div>
                    <div class="col-11 m-auto">
                        {!! Form::select('sumber_dana', array('APBN'=> 'APBN','APBD'=>'APBD'), Request::old('sumber_dana'), ['class' => 'form-control','placeholder' => 'Sumber Dana','wire:key'=>'sumber.0', 'wire:model'=>'sumber.0']) !!}
                    </div>
                </div> 
                <!-- Approval Field -->
                <div class="row">
                    <div class="col-1">

                        {!! Form::label('approval', 'Approval:') !!}
                    </div>
                    <div class="col-11 icheck-success mb-3">

                        <label class="checkbox-inline">
                            <input type="checkbox" id="approval" name="approval" value="True" wire:model.defer = "ap.0" wire:key = "ap.0">
                            {{-- {!! Form::checkbox('approval', 'approval', true, ['wire:model.defer' => 'ap.0']) !!} --}}
                        </label>
                    </div>
                </div>


                <!-- Jen Keg Field -->
                <div class="row">
                    <div class="col-1">

                        {!! Form::label('jen_keg', 'Jenis Keg:') !!}
                    </div>
                    <div class="col-11">
                        {!! Form::select('jen_keg', $jen_kegItems, Request::old('jenKeg_id'), ['class' => 'form-control mb-3','placeholder' => 'Pilih Jenis Kegiatan', 'wire:model.lazy' => 'jk.0', 'wire:key' => 'jk.0']) !!}

                    </div>
                </div>


            <!-- Volume Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('volume', 'Volume:') !!}
                    </div>
                    <div class="col-5 mb-3">
                            {!! Form::text('volume', null, ['class' => 'form-control','maxlength' => 255, 'wire:model' => 'volume.0','wire:key' => 'volume.0']) !!}
                    </div>
                    <div class="col-1">
                        {!! Form::label('satuan', 'Satuan :') !!}
                    </div>
                    <div class="col-5 mb-3">
                            {!! Form::text('satuan', null, ['class' => 'form-control', 'wire:model' => 'sat.0','wire:key' => 'sat.0']) !!}
                    </div>
                </div>
                
                <!-- Tgl Mulai Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('tgl_mulai', 'Tanggal Mulai:') !!}
                    </div>
                    <div class="col-11">
                        <div class="input-group date mb-3" id="tgl_mulai" data-target-input="nearest">
                            
                            <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control" wire:model="tm.0" wire:key="tm.0">
                            {{-- @if (isset($kegiatan))
                                <input type="text" value="{{$kegiatan->tgl_mulai}}" class="form-control datetimepicker-input" name="tgl_mulai" data-target="#tgl_mulai" wire:model="tm.0"/>
                            @else
                                <input type="text" class="form-control datetimepicker-input" name="tgl_mulai" data-target="#tgl_mulai" wire:model="tm.0"/>
                            @endif --}}
                        </div>
                    </div>
                </div>

            <!-- Tgl Selesai Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('tgl_selesai', 'Tanggal Selesai:') !!}
                    </div>
                    <div class="col-11">
                        <div class="input-group date mb-3" id="tgl_selesai" data-target-input="nearest">
                            
                            <input type="date" id="tgl_selesai" name="tgl_selesai" class="form-control" wire:model="ts.0" wire:key="ts.0">

                            {{-- @if (isset($kegiatan))
                                <input type="text" value="{{$kegiatan->tgl_selesai}}" class="form-control datetimepicker-input" name="tgl_selesai" data-target="#tgl_selesai" wire:model="ts.0"/>
                            @else
                                <input type="text" class="form-control datetimepicker-input" name="tgl_selesai" data-target="#tgl_selesai" wire:model="ts.0"/>
                            @endif --}}
                        </div>
                    </div>
                </div>


    <hr>

    @foreach ($inputs as $key=>$value)
        {{':'.$loop->index.':'}}
        <hr>
            <!-- Nama Keg Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('nama_keg', 'Nama Kegiatan :') !!}
                    </div>
                    <div class="col-11">
                        {!! Form::textarea('nama_keg', null, ['class' => 'form-control mb-3', 'wire:model.lazy'=>'nama_keg.'.$value,'wire:key'=>'nama_keg.'.$value]) !!}
                    </div>
                </div>
                
                
                {{-- Dashboard --}}
                <div>
                    <!-- Pagu Field -->

                    <div class="row mb-3">
                        <div class="col-1">
                            {!! Form::label('pagu', 'Pagu :     ') !!}
                        </div>
                        <div class="col-11">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    {!! Form::number('pagu', null, ['class' => 'form-control','maxlength' => 255,'wire:model' => 'pagu.'.$value,'wire:key' => 'pagu.'.$value]) !!}
                                </div>
                            </div>
                    </div>

                    <!-- Target Field -->

                    <div class="row mb-3">
                        <div class="col-1">
                            {!! Form::label('target', 'Target:') !!}
                        </div>
                        <div class="col-3">
                                <div class="input-group">
                                    {!! Form::number(null, null, ['class' => 'form-control','maxlength' => 3,'placeholder' => 'Persentase','wire:model' => 'per.'.$value, 'wire:key' => 'per.'.$value]) !!}
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            %
                                        </div>
                                    </div>
                                </div>{{-- input group --}}
                        </div>
                        <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        Rp
                                        </div>
                                    </div>
                                    {!! Form::number('target', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Nominal','wire:model' => 'target.'.$value,'wire:key' => 'target.'.$value]) !!}
                                </div>{{-- input group --}}
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-1">
                        {!! Form::label('sumber_dana', 'Sumber dana :') !!}
                    </div>
                    <div class="col-11 m-auto">
                        {!! Form::select('sumber_dana', array('APBN' => 'APBN','APBD' => 'APBD'), Request::old('sumber_dana'), ['class' => 'form-control','placeholder' => 'Sumber Dana','wire:model.lazy' => 'sumber.'.$value,'wire:key' => 'sumber.'.$value]) !!}
                    </div>
                </div> 

            <!-- Approval Field -->
                <div class="row">
                    <div class="col-1">

                        {!! Form::label('approval', 'Approval:') !!}
                    </div>
                    <div class="col-11 icheck-success mb-3">

                        <label class="checkbox-inline">
                            <input type="checkbox" id="approval" name="approval" value="True" wire:model.defer = "ap.{{$value}}">

                        </label>
                    </div>
                </div>


            <!-- Jen Keg Field -->
                <div class="row">
                    <div class="col-1">

                        {!! Form::label('jen_keg', 'Jenis Keg:') !!}
                    </div>
                    <div class="col-11">
                        {!! Form::select('jen_keg', $jen_kegItems, Request::old('jenKeg_id'), ['class' => 'form-control mb-3','placeholder' => 'Pilih Jenis Kegiatan', 'wire:model.lazy' => 'jk.'.$value,'wire:key' => 'jk.'.$value]) !!}
                    </div>
                </div>


            <!-- Volume Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('volume', 'Volume:') !!}
                    </div>
                    <div class="col-5 mb-3">
                            {!! Form::text('volume', null, ['class' => 'form-control','maxlength' => 255, 'wire:model.lazy' => 'volume.'.$value,'wire:key' => 'volume.'.$value]) !!}
                    </div>
                    <div class="col-1">
                        {!! Form::label('satuan', 'Satuan :') !!}
                    </div>
                    <div class="col-5 mb-3">
                            {!! Form::text('satuan', null, ['class' => 'form-control', 'wire:model.lazy' => 'sat.'.$value ,'wire:key' => 'sat.'.$value]) !!}
                    </div>
                </div>
                
                <!-- Tgl Mulai Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('tgl_mulai', 'Tanggal Mulai:') !!}
                    </div>
                    <div class="col-11">
                        <div class="input-group date mb-3" id="tgl_mulai" data-target-input="nearest">
                            
                            <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control" wire:model="tm.{{$value}}">
                        </div>
                    </div>
                </div>

                <!-- Tgl Selesai Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('tgl_selesai', 'Tanggal Selesai:') !!}
                    </div>
                    <div class="col-11">
                        <div class="input-group date mb-3" id="tgl_selesai" data-target-input="nearest">
                            
                            <input type="date" id="tgl_selesai" name="tgl_selesai" class="form-control" wire:model="ts.{{$value}}">

                        </div>
                    </div>
                </div>

        <hr>    
    @endforeach 
    <div>
        @if (!($edit_mode))
            
            <div class="row-md-12 d-flex align-items-center justify-content-center" wire:click.prevent="add({{$i}})">
                <a class="btn btn-app bg-success">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
        @endif
    </div>
        
    <!-- Submit Field -->
    <div class="d-flex justify-content-center mb-3">
        <div class="d-flex">
            
            {{ Form::button('<i class="fas fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-app bg-success',  'wire:click.prevent'=>'store()' ] )  }}
        </div>
        
        <div class="d-flex">
            <a href="{{ route('kegiatans.index') }}" class="btn btn-app bg-warning"><i class="fas fa-window-close"></i>Kembali</a>
        </div>
    </div>
</div>