<!-- Name Field -->
<div class="form-group row">
    <div class="col-1">
        {!! Form::label('name', 'Nama : ') !!}
    </div>
    <div class="col-11">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>
</div>


<!-- Email Field -->
<div class="form-group row">
    <div class="col-1">
        {!! Form::label('email', 'Email : ') !!}
    </div>
    <div class="col-11">
        {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>
</div>




@push('scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Password Field -->
<div class="form-group row">
    <div class="col-1">
        {!! Form::label('password', 'Password:') !!}
    </div>
    <div class="col-11">
        {!! Form::password('password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>
</div>


<!-- Role Id Field -->
<div class="form-group row">
    <div class="col-1">
        {!! Form::label('role_id', 'Role:') !!}
    </div>
    <div class="col-11">
        {!! Form::select('role_id', $roleItems, Request::old('role_id'), ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Rt Id Field -->
@livewire('admin.pilihrt')

<!-- Foto Field -->
<div class="form-group row">
    <div class="col-1">
        {!! Form::label('foto', 'Foto:') !!}
    </div>
    <div class="col-11">
        {!! Form::file('foto') !!}
    </div>
</div>




<!-- Submit Field -->
<div class="form-group col-sm-12 align-item-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>


