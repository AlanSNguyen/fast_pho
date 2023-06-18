@extends('layouts.admin.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@endpush
@section('content')
    <div class="page-content form-page">
        <!-- Page Header-->
        <div class="bg-dash-dark-2 py-4">
            <div class="container-fluid">
                <h2 class="h5 mb-0">Đơn photo</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3 px-0">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đơn photo</li>
                </ol>
            </nav>
        </div>
        <section class="tables py-0">
            <div class="container-fluid">
                <div class="row gy-4">
                    <div class="col-lg-12">
                        <div class="card mb-0">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="h4 mb-0">Striped table with hover effect</h3>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-2">
                                        <select id="status-filter" class="form-select">
                                            <option value="All">All</option>
                                            @foreach ($arrayViewStatus as $status)
                                                <option value="{{ $status['value'] }}">{{ $status['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0 table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Thông tin người mua</th>
                                            <th>Thời gian</th>
                                            <th>Số photo</th>
                                            <th>Thanh toán</th>
                                            <th>Ngày tạo</th>
                                            <th>Tình trạng</th>
                                        </tr>
                                        </thead>
                                        <tbody id="body-content">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <div class="pagination p1">
                                        <ul>
                                            <a href="#" id="first-paginate">
                                                <li>&lt;&lt;</li>
                                            </a>
                                            <a href="#" id="pre-paginate">
                                                <li></li>
                                            </a>
                                            <a href="#" class="is-active" id="current-paginate">
                                                <li></li>
                                            </a>
                                            <a href="#" id="next-paginate">
                                                <li></li>
                                            </a>
                                            <a href="#" id="last-paginate">
                                                <li>&gt;&gt;</li>
                                            </a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Footer-->
        <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">
            <div class="container-fluid text-center">
                <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                <p class="mb-0 text-dash-gray">2023{{ now()->year - 2023 === 0 ? '' : ' - ' . now()->year }} © Fast Pho.
                    Design by <a href="https://www.facebook.com/profile.php?id=100048327580198">DoubleS
                        Team</a>.</p>
            </div>
        </footer>
    </div>
@endsection
@push('scripts')
    <script>
        const arrayViewStatusOrder = JSON.parse('{!! json_encode($arrayViewStatus) !!}');
    </script>
    <script type="module">
        import main from '{{ asset('js/admin/orders/orders.js') }}'
        await main('PHOTOS')
    </script>
@endpush
