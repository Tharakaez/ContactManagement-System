@extends('layouts.layoutDashboard')

@section('content')
    <div class="container-fluid">
        {{-- Start: breadcrumbs --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Favourites</li>
            </ol>
        </nav>
        {{-- End: breadcrumbs --}}

        {{-- Alert --}}
        @include('components.alert')

        {{-- Start: Table --}}
        <div class="table-responsive">
            <table class="table mb-0 align-middle text-nowrap">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="mb-0 fw-semibold">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="mb-0 fw-semibold">Email</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="mb-0 fw-semibold">Phone</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="mb-0 fw-semibold">Location</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="mb-0 fw-semibold">Action</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-bottom-0">
                            <h6 class="mb-1 fw-semibold fs-4">Tharaka Harischandra</h6>
                            <span class="fw-normal">UI/UX Designer</span>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 fw-normal">tharakarz@gmail.com</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 fw-normal">077 540 5228</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 fw-normal">Kandy</h6>
                        </td>

                        <td class="border-bottom-0">
                            <button type="button" class="btn btn-warning">
                                Unfavorite
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td class="border-bottom-0">
                            <h6 class="mb-1 fw-semibold fs-4">Tharaka Harischandra</h6>
                            <span class="fw-normal">UI/UX Designer</span>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 fw-normal">tharakarz@gmail.com</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 fw-normal">077 540 5228</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 fw-normal">Kandy</h6>
                        </td>

                        <td class="border-bottom-0">
                            <button type="button" class="btn btn-warning">
                                Unfavorite
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        {{-- End: Table --}}


    </div>
@endsection
