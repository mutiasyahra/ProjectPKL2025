@extends('dashboard.layouts.master', ['title' => "Edit Kepengurusan Kelurahan"])

@section('content')

<?php
    $data=[
        'icon' => "pe-7s-note",
        'judul' => "Edit Kepengurusan Kelurahan",
        'link' => route('info-kelurahan.kepengurusan') ,
        'page1' => "Kepengurusan Kelurahan",
        'page2' => "/ Edit",
        'page3' =>"/ $staff->full_name"
    ]
?>
@include('dashboard.layouts.page-title',$data)

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title font-weight-bold mb-4 mt-2" style="font-size: large;">Edit Staf Kelurahan</h5>

                <div tabindex="-1" class="dropdown-divider"></div>
                <form action="{{ route('info-kelurahan.kepengurusan-update', $staff->nik) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @include('dashboard.info_kelurahan.kepengurusan._form')
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.select2position').select2({
            placeholder: "Pilih Jabatan",
            allowClear: true,
            width: '100%',
            padding: '4px'
        });
    });
</script>

@endsection
