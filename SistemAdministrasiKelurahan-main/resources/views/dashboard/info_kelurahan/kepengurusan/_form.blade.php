<div class="row">
    <div class="col-lg-3">
        <h4 class="card-title">Data Staf</h4>
        <hr>
    </div>
    <div class="col-lg-9">
        <div class="position-relative form-group">
            @if(isset($staff))
                <!-- Mode Edit -->
                <div class="position-relative form-group">
                    <label for="full_name" class="">Nama Staf</label>
                    <input name="full_name" id="full_name" type="text"
                        class="form-control @error('full_name') is-invalid @enderror"
                        value="{{ old('full_name') ?? ($staff->full_name ?? '') }}">
                    @error('full_name')
                        <span class="invalid-feedback mt-2" role="alert">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="nik" class="">NIK</label>
                            <input name="nik" id="nik" type="text"
                                class="form-control @error('nik') is-invalid @enderror"
                                value="{{ old('nik') ?? ($staff->nik ?? '') }}" readonly>
                            @error('nik')
                                <span class="invalid-feedback mt-2" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <a href="{{ route('penduduk-edit', $staff->nik) }}" class="btn btn-info">
                            <i class="fas fa-edit"></i> Ubah data penduduk
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="nip" class="">NIP</label>
                            <input name="nip" id="nip" type="text"
                                class="form-control @error('nip') is-invalid @enderror"
                                value="{{ old('nip') ?? ($staff->nip ?? '') }}" readonly>
                            @error('nip')
                                <span class="invalid-feedback mt-2" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            @else
                <!-- Mode Tambah -->
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel">
                        <div class="position-relative form-group">
                            <label for="villager" class="">NIK / Nama Penduduk</label>
                            <select name="villager" id="villager"
                                class="mb-2 form-control select2 @error('villager') is-invalid @enderror">
                                <option></option>
                                @foreach ($villagers as $villager)
                                    <option value="{{ $villager->id }}"
                                        {{ old('villager') == $villager->id ? 'selected' : '' }}>
                                        {{ $villager->nik }} - {{ $villager->full_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('villager')
                                <span class="invalid-feedback mt-2" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                            <a href="{{ route('penduduk-tambah') }}" class="btn-shadow btn btn-primary text-white mt-2">
                                <i class="fa fa-plus mr-1"></i>
                                Tambahkan data penduduk baru
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="nip" class="">NIP</label>
                            <input name="nip" id="nip" type="text"
                                class="form-control @error('nip') is-invalid @enderror"
                                value="{{ old('nip') }}">
                            @error('nip')
                                <span class="invalid-feedback mt-2" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<div tabindex="-1" class="dropdown-divider mt-4"></div>

<div class="row">
    <div class="col-lg-3">
        <h4 class="card-title">SK</h4>
        <hr>
    </div>
    <div class="col-lg-9">
        <div class="form-row">
            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="nomor_sk_angkat" class="">Nomor SK Pengangkatan</label>
                    <input name="nomor_sk_angkat" id="nomor_sk_angkat" type="text"
                        class="form-control @error('nomor_sk_angkat') is-invalid @enderror"
                        value="{{ old('nomor_sk_angkat') ?? ($staff->nomor_sk_angkat ?? '') }}">
                    @error('nomor_sk_angkat')
                        <span class="invalid-feedback mt-2" role="alert">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="tgl_sk_angkat" class="">Tanggal SK Pengangkatan</label>
                    <input name="tgl_sk_angkat" id="tgl_sk_angkat" type="date"
                        class="form-control @error('tgl_sk_angkat') is-invalid @enderror"
                        value="{{ old('tgl_sk_angkat') ?? ($staff->tgl_sk_angkat ?? '') }}">
                    @error('tgl_sk_angkat')
                        <span class="invalid-feedback mt-2" role="alert">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="nomor_sk_henti" class="">Nomor SK Pemberhentian</label>
                    <input name="nomor_sk_henti" id="nomor_sk_henti" type="text"
                        class="form-control @error('nomor_sk_henti') is-invalid @enderror"
                        value="{{ old('nomor_sk_henti') ?? ($staff->nomor_sk_henti ?? '') }}">
                    @error('nomor_sk_henti')
                        <span class="invalid-feedback mt-2" role="alert">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="tgl_sk_henti" class="">Tanggal SK Pemberhentian</label>
                    <input name="tgl_sk_henti" id="tgl_sk_henti" type="date"
                        class="form-control @error('tgl_sk_henti') is-invalid @enderror"
                        value="{{ old('tgl_sk_henti') ?? ($staff->tgl_sk_henti ?? '') }}">
                    @error('tgl_sk_henti')
                        <span class="invalid-feedback mt-2" role="alert">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

<div tabindex="-1" class="dropdown-divider mt-4"></div>

<div class="row">
    <div class="col-lg-3">
        <h4 class="card-title">Pekerjaan</h4>
        <hr>
    </div>
    <div class="col-lg-9">
        <div class="form-row">
            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="position_period" class="">Masa Jabatan</label>
                    <input name="position_period" id="position_period" type="text"
                        class="form-control @error('position_period') is-invalid @enderror"
                        value="{{ old('position_period') ?? ($staff->position_period ?? '') }}"
                        placeholder="{{ !isset($staff) ? 'Contoh : 6 Tahun Periode 1 (2020 s/d 2026)' : '' }}">
                    @error('position_period')
                        <span class="invalid-feedback mt-2" role="alert">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="position-relative form-group">
                    <label for="staff_position" class="">Jabatan</label>
                    <select name="staff_position" id="staff_position"
                        class="mb-2 form-control select2position @error('staff_position') is-invalid @enderror">
                        <option></option>
                        @foreach ($roles as $role)
                            @if (\Str::lower($role->name) != 'administrator' && \Str::lower($role->name) != 'penduduk')
                                <option value="{{ $role->name }}"
                                    {{ (old('staff_position') ?? ($staff->staff_position ?? '')) == $role->name ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('staff_position')
                        <span class="invalid-feedback mt-2" role="alert">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="position-relative form-group">
                    <label for="pangkat" class="">Pangkat</label>
                    <input name="pangkat" id="pangkat" type="text"
                        class="form-control @error('pangkat') is-invalid @enderror"
                        value="{{ old('pangkat') ?? ($staff->pangkat ?? '') }}">
                    @error('pangkat')
                        <span class="invalid-feedback mt-2" role="alert">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

<div tabindex="-1" class="dropdown-divider mt-4"></div>

<div class="row">
    <div class="col-lg-3">
        <h4 class="card-title">Foto</h4>
        <hr>
    </div>
    <div class="col-lg-9">
        <div class="form-row ml-1 mb-2">
            <div class="position-relative form-group">
                <label for="photo" class="">Upload Foto</label>
                <input name="photo" id="photo" type="file"
                    class="form-control-file @error('photo') is-invalid @enderror">
                <small class="form-text text-muted">Wajib mengisi foto sesuai dengan aslinya</small>
                <small class="form-text text-muted">Ukuran Maksimal : 1MB</small>
                @if(isset($staff) && $staff->photo)
                    <div class="mt-2">
                        <small class="form-text text-muted">Foto saat ini:</small><br>
                        <img src="{{ Storage::url($staff->photo) }}" alt="Foto Staff" class="img-thumbnail mt-1" width="150">
                    </div>
                @endif
                @error('photo')
                    <span class="invalid-feedback mt-2" role="alert">
                        <i>{{ $message }}</i>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="mt-2 btn btn-primary">Simpan Data</button>
        <a href="{{ route('info-kelurahan.kepengurusan') }}" class="mt-2 btn btn-outline-danger">Batal</a>
    </div>
</div>
