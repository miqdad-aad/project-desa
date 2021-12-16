@extends('layouts.app')

@section('title', 'Mutasi Keluar')

@section('styles')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div
                            class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Mutasi Keluar</h2>
                                <p class="mb-0 text-sm">Kelola Mutasi Keluar</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("mutasimasuk.index") }}" class="btn btn-success" title="Kembali"><i
                                        class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
@include('layouts.components.alert')
<div class="row">
    <div class="col">
        <div class="card bg-secondary shadow h-100">
            <div class="card-body">
                <form autocomplete="off" action="{{ route('mutasikeluar.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="penduduk_id">Nama</label>
                            <select class="form-control selectpicker ip" name="penduduk_id" required>
                                <option value="" selected disabled>- pilih -</option>
                                @foreach($id_warga as $a)
                                <option value="{{ $a->id}}">{{$a->nama}}</option>
                                @endforeach
                            </select>
                            @error('jenis_kelamin')<span
                                class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="desa_mutasi">desa_mutasi</label>
                            <input type="text" class="form-control @error('desa_mutasi') is-invalid @enderror"
                                name="desa_mutasi" placeholder="desa" value="{{ old('desa_mutasi') }}">
                            @error('desa_mutasi')<span
                                class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="kec_mutasi">kec_mutasi</label>
                            <input type="text" class="form-control @error('kec_mutasi') is-invalid @enderror"
                                name="kec_mutasi" placeholder="kecamatan" value="{{ old('kec_mutasi') }}">
                            @error('kec_mutasi')<span
                                class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="kab_mutasi">kab_mutasi</label>
                            <input type="text" class="form-control @error('kab_mutasi') is-invalid @enderror"
                                name="kab_mutasi" placeholder="Kematian" value="{{ old('kab_mutasi') }}">
                            @error('kab_mutasi')<span
                                class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="tgl_pindah">tgl_pindah</label>
                            <input type="date" class="form-control @error('keterangan') is-invalid @enderror"
                                name="tgl_pindah" placeholder="Tanggal" value="{{ old('tgl_pindah') }}">
                            @error('tgl_pindah')<span
                                class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="alasan_pindah">alasan_pindah</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                name="alasan_pindah" placeholder="alasan" value="{{ old('alasan_pindah') }}">
                            @error('email')<span
                                class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#pekerjaan_id').select2({
            placeholder: "Pilih Pekerjaan",
            allowClear: true
        });

        if ($("#dusun").val() != "") {
            $.ajax({
                url: baseURL + '/detailDusun?id=' + $("#dusun").val(),
                method: 'get',
                beforeSend: function () {
                    $('#detail_dusun_id').html(`<option value="">Loading ...</option>`);
                },
                success: function (response) {
                    console.log('oke');
                    $('#detail_dusun_id').html(`<option value="">Pilih RT/RW</option>`);
                    $.each(response, function (i, e) {
                        $('#detail_dusun_id').append(
                            `<option value="${e.id}">${e.rt}/${e.rw}</option>`);
                    });

                    $("#detail_dusun_id").val("{{ old('detail_dusun_id') }}");
                }
            });
        } else {
            $('#detail_dusun_id').html(`<option value="">Pilih RT/RW</option>`);
        }

        $("#dusun").change(function () {
            $.ajax({
                url: baseURL + '/detailDusun?id=' + $(this).val(),
                method: 'get',
                beforeSend: function () {
                    $('#detail_dusun_id').html(`<option value="">Loading ...</option>`);
                },
                success: function (response) {
                    $('#detail_dusun_id').html(`<option value="">Pilih RT/RW</option>`);
                    $.each(response, function (i, e) {
                        $('#detail_dusun_id').append(
                            `<option value="${e.id}">${e.rt}/${e.rw}</option>`);
                    });
                }
            });
        });
    });

</script>
<script>
    $('.ip').select2({})

</script>
@endpush
