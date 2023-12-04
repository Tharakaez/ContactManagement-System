@extends('layouts.layoutDashboard')

@section('content')
    <div class="container-fluid">
        {{-- Start: breadcrumbs --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contacts</li>
            </ol>
        </nav>
        {{-- End: breadcrumbs --}}

        {{-- Start: Btn card --}}
        <div class="card">
            <div class="card-body">
                <div class=" d-flex">
                    <form action="{{ url('/search') }}" class="d-flex" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control rounded-2 m-1" id="search"
                            placeholder="{{ $searchTerm }}" name="searchTxt">
                        <button type="submit" class="btn btn-primary m-1"><i class="ti ti-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        {{-- End: Btn card --}}

        {{-- Alert --}}
        @include('components.alert')

        {{-- Start: Table --}}
        @if (!empty($contact) && count($contact) > 0)
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
                    <tbody id="contacts-list">
                        @foreach ($contact as $item)
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="mb-1 fw-semibold fs-4">{{ $item['name'] }}</h6>
                                    <span class="fw-normal">{{ $item['designation'] }}</span>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="mb-0 fw-normal">{{ $item['email'] }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="mb-0 fw-normal">{{ $item['phone'] }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="mb-0 fw-normal">{{ $item['location'] }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <a href="{{ url('/singleContact') . $item['id'] }}" class=" text-info view p-2"
                                        data-bs-toggle="tooltip" data-bs-title="View Contact">
                                        <i class="ti ti-eye fs-5"></i></a>

                                    @if ($item['isFavorite'] == 0)
                                        <a href="{{ url('/favoriteContact') . $item['id'] }}" <a data-bs-toggle="tooltip"
                                            data-bs-title="Add Favorite">
                                            <i class="ri-heart-line fs-5 text-success"></i>
                                        </a>
                                    @else
                                        <a href="{{ url('/unFavoriteContact') . $item['id'] }}" <a data-bs-toggle="tooltip"
                                            data-bs-title="Remove Favorite">
                                            <i class="ri-heart-fill fs-5 text-success"></i>
                                        </a>.
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info " role="alert">
                No Data Found to Show !
            </div>
        @endif
        {{-- End: Table --}}


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->

@endsection
