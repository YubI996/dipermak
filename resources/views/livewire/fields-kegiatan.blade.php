<div>

    @if (isset($kegiatan))
        <input  type="hidden" value="{{$kegiatan->id}}" wire:model ="kid">
    @livewire('admin.pilihrt',['rtid'=>$kegiatan->rt_id])
    @else
        @livewire('admin.pilihrt')

    @endif

    <hr>
            <!-- Nama Keg Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('nama_keg', 'Nama Kegiatan :') !!}
                    </div>
                    <div class="col-11">
                        <textarea id="nama_keg" name="nama_keg" rows="5" cols="50" class="form-control mb-3"></textarea>
                    </div>
                </div>
                
                
                @if (isset($kegiatan))
                    @livewire('admin.dashboard',['kid'=>$kegiatan->id])
                    @php
                        dump($jalan);
                    @endphp
                @else
                    @livewire('admin.dashboard',['kid'=>0])
                    
                @endif
                
                <div class="row mb-3">
                    <div class="col-1">
                        {!! Form::label('sumber_dana', 'Sumber dana :') !!}
                    </div>
                    <div class="col-11 m-auto">
                        {!! Form::select('sumber_dana', array('APBN'=> 'APBN','APBD'=>'APBD'), Request::old('sumber_dana'), ['class' => 'form-control','placeholder' => 'Sumber Dana', 'wire:model'=>'sumber.0']) !!}
                    </div>
                </div> 
                <!-- Approval Field -->
                <div class="row">
                    <div class="col-1">

                        {!! Form::label('approval', 'Approval:') !!}
                    </div>
                    <div class="col-11 icheck-success mb-3">

                        <label class="checkbox-inline">
                            <input type="checkbox" id="approval" name="approval" value="True" wire:model.defer = "ap.0">
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
                        {!! Form::select('jen_keg', $jen_kegItems, Request::old('jenKeg_id'), ['class' => 'form-control mb-3', 'wire:model' => 'jk.0']) !!}
                    </div>
                </div>


            <!-- Volume Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('volume', 'Volume:') !!}
                    </div>
                    <div class="col-5 mb-3">
                            {!! Form::text('volume', null, ['class' => 'form-control','maxlength' => 255, 'wire:model' => 'volume.0']) !!}
                    </div>
                    <div class="col-1">
                        {!! Form::label('satuan', 'Satuan :') !!}
                    </div>
                    <div class="col-5 mb-3">
                            {!! Form::text('satuan', null, ['class' => 'form-control', 'wire:model' => 'sat.0']) !!}
                    </div>
                </div>
                
                <!-- Tgl Mulai Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('tgl_mulai', 'Tanggal Mulai:') !!}
                    </div>
                    <div class="col-11">
                        <div class="input-group date mb-3" id="tgl_mulai" data-target-input="nearest">
                            <div class="input-group-append" data-target="#tgl_mulai" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control" wire:model="tm.0">
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
                            <div class="input-group-append" data-target="#tgl_selesai" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input type="date" id="tgl_selesai" name="tgl_selesai" class="form-control" wire:model="ts.0">

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
        
        <hr>
            <!-- Nama Keg Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('nama_keg', 'Nama Kegiatan :') !!}
                    </div>
                    <div class="col-11">
                        {!! Form::textarea('nama_keg', null, ['class' => 'form-control mb-3', 'wire:model'=>'nama_keg.'.$value]) !!}
                    </div>
                </div>
                
                
                @if (isset($kegiatan))
                    @livewire('admin.dashboard',['kid'=>$kegiatan->id],key($value))
                    
                @else
                    @livewire('admin.dashboard',['kid'=>0],key($value))
                    
                @endif
                
                <div class="row mb-3">
                    <div class="col-1">
                        {!! Form::label('sumber_dana', 'Sumber dana :') !!}
                    </div>
                    <div class="col-11 m-auto">
                        {!! Form::select('sumber_dana', array('APBN' => 'APBN','APBD' => 'APBD'), Request::old('sumber_dana'), ['class' => 'form-control','placeholder' => 'Sumber Dana','wire:model' => 'sumber.'.$value]) !!}
                    </div>
                </div> 

            <!-- Approval Field -->
                <div class="row">
                    <div class="col-1">

                        {!! Form::label('approval', 'Approval:') !!}
                    </div>
                    <div class="col-11 icheck-success mb-3">

                        <label class="checkbox-inline">
                            {!! Form::checkbox('approval', 'approval', true, ['wire:model.defer' => 'ap.'.$value]) !!}
                        </label>
                    </div>
                </div>


            <!-- Jen Keg Field -->
                <div class="row">
                    <div class="col-1">

                        {!! Form::label('jen_keg', 'Jenis Keg:') !!}
                    </div>
                    <div class="col-11">
                        {!! Form::select('jen_keg', $jen_kegItems, Request::old('jenKeg_id'), ['class' => 'form-control mb-3', 'wire:model' => 'jk.'.$value]) !!}
                    </div>
                </div>


            <!-- Volume Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('volume', 'Volume:') !!}
                    </div>
                    <div class="col-5 mb-3">
                            {!! Form::text('volume', null, ['class' => 'form-control','maxlength' => 255, 'wire:model' => 'volume.'.$value]) !!}
                    </div>
                    <div class="col-1">
                        {!! Form::label('satuan', 'Satuan :') !!}
                    </div>
                    <div class="col-5 mb-3">
                            {!! Form::text('satuan', null, ['class' => 'form-control', 'wire:model' => 'sat.'.$value]) !!}
                    </div>
                </div>
                
                <!-- Tgl Mulai Field -->
                <div class="row">
                    <div class="col-1">
                        {!! Form::label('tgl_mulai', 'Tanggal Mulai:') !!}
                    </div>
                    <div class="col-11">
                        <div class="input-group date mb-3" id="tgl_mulai" data-target-input="nearest">
                            <div class="input-group-append" data-target="#tgl_mulai" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            @if (isset($kegiatan))
                            <input type="text" value="{{$kegiatan->tgl_mulai}}" class="form-control datetimepicker-input" name="tgl_mulai" data-target="#tgl_mulai" wire:model="tm.0"/>
                            @else
                            <input type="text" class="form-control datetimepicker-input" name="tgl_mulai" data-target="#tgl_mulai" wire:model="tm.0"/>
                            @endif
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
                            <div class="input-group-append" data-target="#tgl_selesai" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            @if (isset($kegiatan))
                            <input type="text" value="{{$kegiatan->tgl_selesai}}" class="form-control datetimepicker-input" name="tgl_selesai" data-target="#tgl_selesai" wire:model="ts.0"/>
                            @else
                            <input type="text" class="form-control datetimepicker-input" name="tgl_selesai" data-target="#tgl_selesai" wire:model="ts.0"/>
                            @endif
                        </div>
                    </div>
                </div>

        <hr>    
    @endforeach 
    <div class="row-md-12 d-flex align-items-center justify-content-center" wire:click.prevent="add({{$i}})">
        <a class="btn btn-app bg-success">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    <!-- Submit Field -->
    <div class="d-flex justify-content-center mb-3">
        <div class="d-flex">
            
            {{ Form::button('<i class="fas fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-app bg-success',  'wire:click.prevent'=>'store()' ] )  }}
        </div>
        
        <div class="d-flex">
            <a href="{{ route('kegiatans.index') }}" class="btn btn-app bg-warning"><i class="fas fa-window-close"></i>Cancel</a>
        </div>
    </div>
</div>