@extends('dashboard.layouts.master', ['title' => "Tambah Kepengurursan Kelurahan"])

@section('content')

<?php
    $data=[
        'icon' => "pe-7s-plus",
        'judul' => "Tambah Kepengurusan Kelurahan",
        'link' => route('info-kelurahan.kepengurusan') ,
        'page1' => "Kepengurursan Kelurahan",
        'page2' => "/ Tambah"
    ]
?>
@include('dashboard.layouts.page-title',$data)

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title font-weight-bold mb-4 mt-2" style="font-size: large;">Tambah Staf Kelurahan</h5>
                <div tabindex="-1" class="dropdown-divider"></div>

                <form action="{{ route('info-kelurahan.kepengurusan-store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('dashboard.info_kelurahan.kepengurusan._form')
                </form>

            </div>
        </div>

    </div>
</div>


<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih NIK",
            allowClear: true,
            width:'100%'
        });
    });
    $(document).ready(function() {
        $('.select2position').select2({
            placeholder: "Pilih Jabatan",
            allowClear: true,
            width:'100%'
        });
    });
</script>

<script>
    $(document).ready(function() {
        if($('#villager option:selected')) {
            console.log($('#villager option:selected').val());
        }
    });
</script>

@endsection
