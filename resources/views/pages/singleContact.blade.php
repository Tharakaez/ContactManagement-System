@extends('layouts.layoutDashboard')
@section('content')
    <div class="container-fluid">
        {{-- Start: breadcrumbs --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('contact.view') }}">Contacts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Details</li>
            </ol>
        </nav>
        {{-- End: breadcrumbs --}}

        {{-- Alert --}}
        @include('components.alert')

        {{-- Start: Contact card --}}
        @if (!empty($data))
            @foreach ($data as $item)
                <div class="card">
                    <div class="bg-white border-b card-header d-flex justify-content-between">
                        <h1 class="fs-5 fw-bolder">Contact Details</h1>
                        <div class="">
                            @if ($item['isFavorite'] == 0)
                                <a href="{{ url('/favoriteContact') . $item['id'] }}" class=" btn btn-success m-1">
                                    Add Favorite
                                    <i class=" ti ti-heart"></i>
                                </a>
                            @else
                                <a href="{{ url('/unFavoriteContact') . $item['id'] }}" class=" btn btn-warning  m-1">
                                    Unfavorite
                                    <i class=" ti ti-heart"></i>
                                </a>.
                            @endif
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="flex-wrap row">

                            <div class=" col-lg-3 d-flex flex-column align-items-center align-items-lg-start">
                                <img src="{{ URL::to('/') }}/adminImages/contactImage/{{ $item['image'] }}" alt="avatar"
                                    class="mb-3 rounded-circle" width="150">
                                <!-- ----------------data is on DB-------------- -->
                                <div class=" d-flex">
                                    <div class="flex-grow-1 d-flex flex-column align-items-center align-items-lg-start">
                                        <h6 class="mb-1 fw-semibold fs-4">{{ $item['name'] }}</h6>
                                        <!-- ----------------data is on DB-------------- -->
                                        <span class="mb-1 fw-normal">{{ $item['designation'] }}</span>
                                        <!-- ----------------data is on DB-------------- -->
                                        <span class="px-3 py-1  rounded-3 text-bg-warning  ">Category -
                                            {{ $item['categoryName'] }}</span>
                                    </div>

                                </div>
                            </div>

                            <div class="mt-3 col-lg-4 d-flex flex-column align-items-center align-items-lg-start mt-lg-0">

                                <div class=" d-flex flex-lg-column flex-column ">
                                    <div class=" d-flex align-items-center flex-column flex-lg-row">
                                        <div
                                            class=" p-2 d-flex align-items-center justify-content-center bg-info rounded-2">
                                            <i class=" text-white ti ti-mail fs-6 "></i>
                                        </div>
                                        <div
                                            class="mt-2 ms-2 d-flex flex-column align-items-center mt-lg-0 align-items-lg-start">
                                            <h6 class="fw-semibold mb-1">Email</h6>
                                            <h6 class="fw-normal">{{ $item['email'] }}</h6>
                                            <!-- ----------------data is on DB-------------- -->
                                        </div>
                                    </div>


                                    <div
                                        class="mt-lg-3 d-flex flex-column align-items-center align-items-lg-start  col-lg-12">
                                        <div class=" d-flex align-items-center flex-column flex-lg-row">
                                            <div
                                                class="p-2 d-flex align-items-center justify-content-center bg-info rounded-2">
                                                <i class="fs-6 text-white ti ti-phone"></i>
                                            </div>
                                            <div
                                                class="mt-2 ms-2 d-flex flex-column align-items-center mt-lg-0 align-items-lg-start">
                                                <h6 class="fw-semibold mb-1">Phone</h6>
                                                <h6 class="fw-normal">{{ $item['phone'] }}</h6>
                                                <!-- ----------------data is on DB-------------- -->
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="mt-3 d-flex flex-column align-items-center align-items-lg-start">
                                    <div class="d-flex align-items-center flex-column flex-lg-row ">
                                        <div class="p-2 d-flex align-items-center justify-content-center bg-info rounded-2">
                                            <i class="fs-6 text-white ti ti-location"></i>
                                        </div>
                                        <div
                                            class="mt-2 ms-2 d-flex flex-column align-items-center mt-lg-0 align-items-lg-start">
                                            <h6 class="fw-semibold mb-1">Location</h6>
                                            <h6 class="fw-normal">{{ $item['location'] }}</h6>
                                            <!-- ----------------data is on DB-------------- -->
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="mt-4 col-lg-5 mt-lg-0">
                                <div class=" d-flex flex-column align-items-center align-items-lg-start">
                                    <h6 class="fw-semibold mb-1">Note </h6>
                                    <h6 class="fw-normal"> {{ $item['note'] }}</h6>
                                </div>

                                <div class="mt-3 d-flex align-items-center justify-content-center mt-lg-4 d-lg-block">
                                    <button type="button" class="btn btn-primary m-1 edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal" data-id="{{ $item['id'] }}"
                                        data-name="{{ $item['name'] }}" data-designation="{{ $item['designation'] }}"
                                        data-email="{{ $item['email'] }}" data-phone="{{ $item['phone'] }}"
                                        data-location="{{ $item['location'] }}"
                                        data-categoryid="{{ $item['categoryId'] }}" data-note="{{ $item['note'] }}"
                                        data-image="{{ $item['image'] }}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger m-1 deleteContactBTN"
                                        value="{{ $item['id'] }}">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        @endif
        {{-- End: Contact card --}}

        {{-- Start: edit contact modal --}}
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Contact</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('edit.contact') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <input type="text" name="id" id="idEdit" hidden>
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control rounded-2" id="nameEdit"
                                        placeholder="Enter Name" required name="name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Designation</label>
                                    <input type="text" class="form-control rounded-2" id="designationEdit"
                                        placeholder="Enter Designation" name="designation">
                                </div>
                            </div>

                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control rounded-2" id="emailEdit"
                                        placeholder="Enter Email" oninput="validateEditEmail(this)" name="email">
                                    <p id="editEmailError" class="text-danger"></p>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="editPhone" class="form-label">Edit Phone</label>
                                    <input type="number" class="form-control rounded-2" id="editPhone"
                                        placeholder="Enter Phone" oninput="validateEditPhone(this)" required
                                        name="phone">
                                    <p id="editPhoneError" class="text-danger"></p>
                                </div>
                            </div>

                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control rounded-2" id="editLocation"
                                        placeholder="Enter Location" required name="location">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="catEdit" class="form-label">Category</label>
                                    <select name="categoryId" id="catEdit" class="form-select form-control rounded-2">
                                        @if (!empty($categories))
                                            @foreach ($categories as $data)
                                                <option value="{{ $data['id'] }}">
                                                    {{ $data['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Note</label>
                                <textarea class="form-control rounded-2" id="noteEdit" rows="2" placeholder="Enter Note" name="note"></textarea>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="imageOld" name="imageOld" hidden>
                                <label for="editFormFile" class="form-label">Edit Avatar</label>
                                <input type="file" class="rounded-2 form-control form-input" id="editFormFile"
                                    accept="image/*" onchange="validateEditImageFile(this)" name="imageEdit">
                                <p id="editFileError" class="text-danger"></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- End: edit contact modal --}}

        {{-- Start: delede contact modal --}}
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="flex justify-end modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('delete.sincontact') }}" method="POST">
                        @csrf
                        <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                            <div class="col-md-8 d-flex flex-column justify-content-center align-items-center">
                                <input type="text" name="id" id="contact_id" hidden>
                                <img src="{{ asset('assets/images/icons/waning.gif') }}" alt="" width="100"
                                    class="">
                                <h1 class="text-center modal-title fs-5 fw-bolder" id="exampleModalLabel">Are You Sure?
                                </h1>
                                <p class="text-center text-dark ">Do you really want to delete these records? This process
                                    cannot be undone.</p>
                            </div>
                        </div>

                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-danger">Yes</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End: delede contact modal --}}

    </div>
    {{-- End: container-fluid --}}

    {{-- Start: Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    {{-- Edit Contact Modal --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listeners to all "Edit" buttons
            document.querySelectorAll('.edit').forEach(function(editButton) {
                editButton.addEventListener('click', function() {
                    // Extract data attributes
                    var id = this.getAttribute('data-id');
                    var name = this.getAttribute('data-name');
                    var designation = this.getAttribute('data-designation');
                    var email = this.getAttribute('data-email');
                    var phone = this.getAttribute('data-phone');
                    var location = this.getAttribute('data-location');
                    var categoryId = this.getAttribute('data-categoryid');
                    var note = this.getAttribute('data-note');
                    var image = this.getAttribute('data-image');

                    // Update the modal inputs
                    document.getElementById('idEdit').value = id;
                    document.getElementById('nameEdit').value = name;
                    document.getElementById('designationEdit').value = designation;
                    document.getElementById('emailEdit').value = email;
                    document.getElementById('editPhone').value = phone;
                    document.getElementById('editLocation').value = location;
                    document.getElementById('catEdit').value = categoryId;
                    document.getElementById('noteEdit').value = note;
                    document.getElementById('imageOld').value = image;
                });
            });
        });

        //Delete ContactBTN
        $(document).ready(function() {
            $('.deleteContactBTN').click(function(e) {
                e.preventDefault();

                var id = $(this).val();
                $('#contact_id').val(id);
                // alert(id);
                $('#deleteModal').modal('show');
            });
        });
    </script>
    {{-- End: Script --}}

@endsection
