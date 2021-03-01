<div>
    <div class="row-lg-12">
        
        <!-- kecamatan Field -->
        <div class="form-group">
            <div class="row p-auto">
                <div class="col-1">
                    {!! Form::label('kecamatan', 'Kecamatan :') !!}
                </div>
                <div class="col-11 m-auto">
                    {!! Form::select(null, $kecamatanItems, $kec, ['class' => 'form-control','placeholder' => 'Pilih Kecamatan','wire:model.lazy' => 'kec']) !!}
                    {{-- {!! Form::select(null, $kecamatanItems, Request::old('kecamatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kecamatan','wire:model.lazy' => 'kec']) !!} --}}
                </div>
            </div>
        </div>
        <!-- kelurahan Field -->
        <div class="form-group">
            <div class="row p-auto">
                <div class="col-1">
                    {!! Form::label('kelurahan', 'Kelurahan :') !!}

                </div>
                <div class="col-11">
                    {!! Form::select(null, $kelurahanItems, $kel, ['class' => 'form-control','placeholder' => 'Pilih Kelurahan','wire:model.lazy' => 'kel']) !!}

                </div>
            </div>
        </div>
        <!-- Rt Id Field -->
        <div class="form-group">
            <div class="row p-auto">
                    <div class="col-1">
                        {!! Form::label('rt_id', 'RT:') !!}
            
                    </div>
                    <div class="col-11">
                        {!! Form::select('rt_id', $rtItems,$rtid, ['class' => 'form-control','placeholder' => 'Pilih RT','wire:model.lazy' => 'rtid']) !!}
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table id="tabel1" class="table table-bordered table-striped" >
                <thead>
                    <tr>
                        <th>No.</th>
                        <th class="align-middle">Pagu Kecamatan</th>
                        <th class="align-middle">Pagu Kelurahan</th>
                        <th class="align-middle">Pagu RT</th>
                        <th class="align-middle">Total Partisipasi</th>
                        <th class="align-middle">Partisipasi Barang</th>
                        <th class="align-middle">Partisipasi Jasa</th>
                        <th class="align-middle">Partisipasi Uang</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($kegiatans as $kegiatan) --}}
                    <tr>
                        <td>{{1}}</td>
                        <td>{{'Rp. '.number_format($dataKec['pagu'],2,',','.')}}</td>
                        <td>{{'Rp. '.number_format($dataKel['pagu'],2,',','.')}}</td>
                        <td>{{'Rp. '.number_format($dataRT['pagu'],2,',','.')}}</td>
                        <td>{{'Rp. '.number_format($dataKec['totPart'],2,',','.')}}</td>
                        <td>{{'Rp. '.number_format($dataKec['partBar'],2,',','.')}}</td>
                        <td>{{'Rp. '.number_format($dataKec['partJas'],2,',','.')}}</td>
                        <td>{{'Rp. '.number_format($dataKec['partUa'],2,',','.')}}</td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
    {{-- <script>
         window.addEventListener('RT', event => {
            console.log("Hello world2");
            alert('Name updated to: ');
            document.getElementById("tabel").DataTable().ajax.reload();
            console.log("Hello world3");
        })
        console.log("1");
        $(function(){
            $("#tabel").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,"fixedColumns": false,
                "buttons": ["copy", "excel",{extend: 'pdf', orientation: 'landscape',columns: ':visible'}, "print", "colvis",],
            }).buttons().container().appendTo('#tabel_wrapper .col-md-6:eq(0)');
        });
    </script> --}}
</div>
