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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="ti ti-users"></i>
                        Add Contact</button>

                    <div class="dropdown">
                        <button class="btn btn-outline-primary m-1 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="ti ti-filter"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item filter-option" href="#" data-category="all">All Categories</a>
                            </li>
                            <!-- Populate this list with your category options -->
                            <li><a class="dropdown-item filter-option" href="#" data-category="all">Test</a>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
        {{-- End: Btn card --}}

        {{-- Alert --}}
        @include('components.alert')

        {{-- Start: Table --}}
        @if (!empty($data) && count($data) > 0)
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
                        @foreach ($data as $item)
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

                                    <button type="button" class="text-warning edit btn p-2" data-bs-toggle="modal"
                                        data-bs-target="#editModal" data-id="{{ $item['id'] }}"
                                        data-name="{{ $item['name'] }}" data-designation="{{ $item['designation'] }}"
                                        data-email="{{ $item['email'] }}" data-phone="{{ $item['phone'] }}"
                                        data-location="{{ $item['location'] }}"
                                        data-categoryid="{{ $item['categoryId'] }}" data-note="{{ $item['note'] }}"
                                        data-image="{{ $item['image'] }}">
                                        <a data-bs-toggle="tooltip" data-bs-title="Edit Contact">
                                            <i class="ti ti-pencil fs-5"></i>
                                        </a>
                                    </button>

                                    <button type="button" class="text-danger deleteContactBTN btn p-2"
                                        value="{{ $item['id'] }}">
                                        <a data-bs-toggle="tooltip" data-bs-title="Delete Contact">
                                            <i class="ti ti-trash fs-5"></i>
                                        </a>
                                    </button>

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

        {{-- Start: add contact modal --}}
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Contact</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add.contact') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control rounded-2" id="name"
                                        placeholder="Enter Name" required name="name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Designation</label>
                                    <input type="text" class="form-control rounded-2" id="designation"
                                        placeholder="Enter Designation" name="designation">
                                </div>
                            </div>

                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control rounded-2" id="email"
                                        placeholder="Enter Email" oninput="validateEmail(this)" name="email">
                                    <p id="emailError" class="text-danger"></p>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="form-control rounded-2" id="phone"
                                        placeholder="Enter Phone" oninput="validatePhone(this)" required name="phone">
                                    <p id="phoneError" class="text-danger"></p>
                                </div>
                            </div>

                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control rounded-2" id="location"
                                        placeholder="Enter Location" required name="location">
                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="cat" class="form-label">Category</label>
                                    <select name="categoryId" id="cat" class=" form-select">
                                        <option value="" selected disabled hidden> Select Category</option>
                                        @if (!empty($categories) && count($categories) > 0)
                                            @foreach ($categories as $item)
                                                <option value="{{ $item['id'] }}">
                                                    {{ $item['name'] }}</option>
                                            @endforeach
                                        @else
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Note</label>
                                <textarea class="form-control rounded-2" id="note" rows="2" placeholder="Enter Note" name="note"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Avatar</label>
                                <input type="file" class="rounded-2 form-control form-input" id="formFile"
                                    accept="image/*" onchange="validateImageFile(this)" name="image">
                                <p id="fileError" class="text-danger"></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-primary">Add Contact</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- End: add contact modal --}}

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
                                    <input type="hidden" name="id" id="idEdit">
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
                    <form action="{{ route('delete.contact') }}" method="POST">
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
        {{-- End: delete contact modal --}}

        
    </div>



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
@endsection
