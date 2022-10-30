@extends('layouts.inventories.main-content')
@section('title', '| Profil')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/" class="btn btn-sm btn-primary text-white">
            <i class="fa-solid fa-arrow-left"></i>
        &nbsp;Kembali</a>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </div>
    <div class="row mb-3">
        <div class="col-lg-4 mb-3">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <div class="card">
                        <div class="card-body">
                            @if (isset($profile->photo))
                                <img src="http://192.168.43.105:8000/{{ $profile->photo }}"
                                    class="card-img-bottom rounded-circle mb-2" style="max-width: 100px" alt="Photo">
                            @else
                                <code>Foto tidak tersedia!</code>
                            @endif
                            <h6 class="font-weight-bold text-primary">
                                {{ $profile->name }}
                            </h6>
                            <p class="small text-monospace">
                                {{ $profile->email }} | {{ $profile->username }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header mb-0 d-flex">
                            <h6 class="m-0 font-weight-bold text-primary">Reset Password</h6>
                        </div>
                        <form id="reset-password" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="font-weight-bold text-left" for="old_password">Password lama</label>
                                    <input type="text" class="form-control" name="old_password" id="old_password"
                                        placeholder="Password lama">
                                    <small class="text-danger" id="old_password-error"></small>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-left" for="new_password">Password baru</label>
                                    <input type="text" class="form-control" name="new_password" id="new_password"
                                        placeholder="Password baru">
                                    <small class="text-danger" id="new_password-error"></small>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-left" for="confirm_password">Konfirmasi Password
                                        baru</label>
                                    <input type="text" class="form-control" name="new_password_confirmation"
                                        id="new_password_confirmation" placeholder="Konfirmasi Password baru">
                                    <small class="text-danger" id="confirm_password-error"></small>
                                </div>
                                <div class="form-group">
                                    <button id="submit" class="btn btn-primary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form id="edit-profile" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id" value="{{ $profile->id }}">
                        <input type="hidden" name="nis" value="{{ $profile->nis }}">
                        <table style="width: 100%">
                            <tr>
                                <td><label class="font-weight-bold" for="name">Nama</label></td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ $profile->name }}">
                                        <small class="text-danger" id="name-error"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="font-weight-bold" for="username">Username</label></td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" id="username"
                                            value="{{ $profile->username }}">
                                        <small class="text-danger" id="username-error"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="font-weight-bold" for="email">Email</label></td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" id="email"
                                            value="{{ $profile->email }}">
                                        <small class="text-danger" id="email-error"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="font-weight-bold" for="address">Alamat</label></td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" id="address"
                                            value="{{ $profile->address }}">
                                        <small class="text-danger" id="address-error"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="font-weight-bold" for="birthplace">Tempat lahir</label></td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="birthplace" id="birthplace"
                                            value="{{ $profile->birthplace }}">
                                        <small class="text-danger" id="birthplace-error"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="font-weight-bold" for="birthdate">Tanggal lahir</label></td>
                                <td></td>
                                <td>
                                    <div class="form-group" id="simple-date1">
                                        <div class="input-group date">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="birthdate" id="birthdate"
                                                autocomplete="off" value="{{ $profile->birthdate }}">
                                        </div>
                                        <small class="text-danger" id="birthdate-error"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="font-weight-bold" for="gender">Jenis kelamin</label></td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control select2-single" name="gender" id="gender">
                                            <option selected value="">--Pilih Jenis Kelamin--</option>
                                            @php
                                                $l="Laki-laki";
                                                $p="Perempuan";
                                            @endphp
                                            @if ($profile->gender == 'Laki-laki')
                                                @php
                                                    $l = 'selected';
                                                @endphp
                                            @elseif ($profile->gender == 'Perempuan')
                                                @php
                                                    $p = 'selected';
                                                @endphp
                                            @endif
                                            <option {{ $l }} value="Laki-laki">Laki-laki</option>
                                            <option {{ $p }} value="Perempuan">Perempuan</option>
                                        </select>
                                        <small class="text-danger" id="gender-error"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="font-weight-bold" for="phone">No HP</label></td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            value="{{ $profile->phone }}">
                                        <small class="text-danger" id="phone-error"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="font-weight-bold" for="religion">Agama</label></td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control select2-single" name="religion" id="religion">
                                            <option selected value="">--Pilih Agama--</option>
                                            @php
                                                $islam="";
                                                $kristen="";
                                                $katolik="";
                                                $hindu="";
                                                $budha="";
                                                $konghucu="";
                                            @endphp
                                            @if ($profile->religion == 'Islam')
                                                @php
                                                    $islam = 'selected';
                                                @endphp
                                            @elseif ($profile->religion == 'Kristen')
                                                @php
                                                    $kristen = 'selected';
                                                @endphp
                                            @elseif ($profile->religion == 'Katolik')
                                                @php
                                                    $Katolik = 'selected';
                                                @endphp
                                            @elseif ($profile->religion == 'Hindu')
                                                @php
                                                    $hindu = 'selected';
                                                @endphp
                                            @elseif ($profile->religion == 'Budha')
                                                @php
                                                    $budha = 'selected';
                                                @endphp
                                            @elseif ($profile->religion == 'Konghucu')
                                                @php
                                                    $konghucu = 'selected';
                                                @endphp
                                            @endif
                                            <option {{ $islam }} value="Islam">Islam</option>
                                            <option {{ $kristen }} value="Kristen">Kristen</option>
                                            <option {{ $katolik }} value="Katolik">Katolik</option>
                                            <option {{ $hindu }} value="Hindu">Hindu</option>
                                            <option {{ $budha }} value="Budha">Budha</option>
                                            <option {{ $konghucu }} value="Konghucu">Konghucu</option>
                                        </select>
                                        <small class="text-danger" id="religion-error"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="font-weight-bold" for="photo">Foto profil</label></td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photo"
                                                id="photo" value="{{ $profile->photo }}">
                                            <label class="custom-file-label" for="photo">Choose
                                                file</label>
                                        </div>
                                        <small class="text-danger" id="photo-error"></small>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <button id="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        var api = "{{ env('API_URL') }}";
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        $(document).ready(function() {
            if (sessionStorage.getItem('success')) {
                let data = sessionStorage.getItem('success');
                Toast.fire({
                    icon: 'success',
                    title: data
                });

                sessionStorage.clear();
            }
        });

        $("#edit-profile").on('submit', function(event) {
            event.preventDefault();
            $(".preloader").fadeIn();
            let id = $('#id').val();
            let formData = new FormData(this);
            let data =[
            $('#name-error').text('');
            $('#username-error').text('');
            $('#email-error').text('');
            $('#address-error').text('');
            $('#birthplace-error').text('');
            $('#birthdate-error').text('');
            $('#gender-error').text('');
            $('#phone-error').text('');
            $('#religion-error').text('');
            $('#photo-error').text('');]

            $.ajax({
                url: api+"/profile-student",
                type: "POST",
                headers: {
                    'Authorization': 'Bearer ' + getCookie('token'),
                },
                contentType: 'application/json',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    $(".preloader").fadeOut();
                    if (response.success) {
                        window.location.href = "{{ route('profile') }}";
                        sessionStorage.setItem('success', response.message);
                    }
                },
                error: function(response) {
                    if (response.responseJSON.success == false) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: response.responseJSON.message,
                        })
                    } else {
                        $(".preloader").fadeOut();
                        $('#name-error').text(response.errors.responseJSON.name);
                        $('#username-error').text(response.errors.responseJSON.username);
                        $('#email-error').text(response.errors.responseJSON.email);
                        $('#address-error').text(response.errors.responseJSON.address);
                        $('#birthplace-error').text(response.errors.responseJSON.birthplace);
                        $('#birthdate-error').text(response.errors.responseJSON.birthdate);
                        $('#gender-error').text(response.errors.responseJSON.gender);
                        $('#phone-error').text(response.errors.responseJSON.phone);
                        $('#religion-error').text(response.errors.responseJSON.religion);
                        $('#photo-error').text(response.errors.responseJSON.photo);
                    }
                },
            });
        });

        $("#reset-password").on('submit', function(event) {
            event.preventDefault();
            $(".preloader").fadeIn();
            let formData = new FormData(this);
            $('#old_password-error').text('');
            $('#new_password-error').text('');
            $('#confirm_password-error').text('');

            $.ajax({
                url: api+"/reset-password",
                type: "POST",
                headers: {
                    'Authorization': 'Bearer ' + getCookie('token'),
                },
                contentType: 'application/json',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    $(".preloader").fadeOut();
                    if (response.success) {
                        window.location.href = "{{ route('profile') }}";
                        sessionStorage.setItem('success', response.message);
                    }
                },
                error: function(response) {
                    if (response.responseJSON.success == false) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: response.responseJSON.message,
                        })
                    } else {
                        $(".preloader").fadeOut();
                        $('#old_password-error').text(response.responseJSON.old_password);
                        $('#new_password-error').text(response.responseJSON.new_password);
                        $('#confirm_password-error').text(response.responseJSON
                            .new_password_confirmation);
                    }
                },
            });
        });
    </script>
@endsection
