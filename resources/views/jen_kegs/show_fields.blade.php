<div class="col-lg-12">
    <div class="form-group">
        <div class="row-lg-12">
            <div class="col-lg-2">
                {!! Form::label('jenis_keg', 'Jenis Keg:') !!}
            </div>
            <div class="col-lg-10">
                <!-- Jenis Keg Field -->
                <p>{{ $jenKeg->jenis_keg }}</p>
            </div>
        </div>
    </div>
            
    
    <div class="row-lg-12">
    <div class="form-group">
        <div class="row-lg-12">
            <div class="col-lg-2">
        <!-- Created At Field -->
            {!! Form::label('created_at', 'Created At:') !!}
            </div>
            <div class="col-lg-10">

                <p>{{ $jenKeg->created_at }}</p>
            </div>
        </div>
    </div>
    
    <div class="row-lg-12">
    <div class="form-group">
        <div class="row-lg-12">
            <div class="col-lg-2">
        <!-- Updated At Field -->
            {!! Form::label('updated_at', 'Updated At:') !!}
            </div>
            <div class="col-lg-10">

                <p>{{ $jenKeg->updated_at }}</p>
            </div>
        </div>
    </div>
</div>