@extends('layouts.app')

@section('title', 'Tambah Mutasi Masuk')

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
                                <h2 class="mb-0">Mutasi Masuk</h2>
                                <p class="mb-0 text-sm">Kelola Mutasi Masuk</p>
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
                <form autocomplete="off" action="{{ route('mutasimasuk.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nik">NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                                placeholder="Masukkan NIK ..." value="{{ old('nik') }}">
                            @error('nik')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="kk">KK</label>
                            <input type="text" class="form-control @error('kk') is-invalid @enderror" name="kk"
                                placeholder="Masukkan KK ..." value="{{ old('kk') }}">
                            @error('kk')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama ..." value="{{ old('nama') }}">
                            @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                <option selected value="">Pilih Jenis Kelamin</option>
                                <option value="1" {{ old('jenis_kelamin') == 1 ? 'selected="true"' : ''  }}>Laki-laki</option>
                                <option value="2" {{ old('jenis_kelamin') == 2 ? 'selected="true"' : ''  }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="Masukkan Tempat Lahir ..." value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir ..." value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="agama">Agama</label>
                            <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama">
                                <option selected value="">Pilih Agama</option>
                                @foreach ($agama as $item)
                                    <option value="{{ $item->id }}" {{ old('agama_id') == $item->id ? 'selected="true"' : ''  }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('agama_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="pekerjaan">Pekerjaan</label>
                            <select style="width: 100%;" class="form-control @error('pekerjaan_id') is-invalid @enderror" name="pekerjaan" id="pekerjaan_id">
                                <option selected value="">Pilih Pekerjaan</option>
                                @foreach ($pekerjaan as $item)
                                    <option value="{{ $item->id }}" {{ old('pekerjaan_id') == $item->id ? 'selected="true"' : ''  }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('pekerjaan_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="kewarganegaraan">Kewarganegaraan</label>
                            <select class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" id="kewarganegaraan">
                                <option selected value="">Pilih Kewarganegaraan</option>
                                <option value="1" {{ old('kewarganegaraan') == 1 ? 'selected="true"' : ''  }}>WNI</option>
                                <option value="2" {{ old('kewarganegaraan') == 2 ? 'selected="true"' : ''  }}>WNA</option>
                                <option value="3" {{ old('kewarganegaraan') == 3 ? 'selected="true"' : ''  }}>Dua Kewarganegaraan</option>
                            </select>
                            @error('kewarganegaraan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
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
