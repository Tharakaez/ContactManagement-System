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
                    <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal"
                        data-bs-target="#addContactModal">
                        <i class="ti ti-users"></i>
                        Add Contact</button>

                    <div class="dropdown">
                        <button class="btn btn-outline-primary m-1 dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
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

        {{-- Alert Success --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class=" ti ti-alert-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class=" ti ti-x hover:text-red-600"></i>
                </button>
            </div>
        @endif

        {{-- Alert Error --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class=" ti ti-alert-circle"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class=" ti ti-x hover:text-red-600"></i>
                </button>
            </div>
        @endif

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
                            <h6 class="mb-1 fw-semibold fs-4">Text</h6>
                            <span class="fw-normal">Text</span>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">Text</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">Text</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">Text</h6>
                        </td>
                        <td class="border-bottom-0">
                            <a href="{{ route('single.contact') }}" class=" text-info view p-2"><i class="ti ti-eye fs-5"></i></a>

                            <button type="button" class="text-warning edit btn p-2" data-bs-toggle="modal"
                                data-bs-target="#editContactModal">
                                <i class="ti ti-pencil fs-5"></i>
                            </button>

                            <button type="button" class="text-danger deleteContactBTN btn p-2" value="">
                                <i class="ti ti-trash fs-5"></i>
                            </button>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- End: Table --}}

        {{-- Start: add contact modal --}}
        <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Contact</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2" id="name"
                                        placeholder="Enter Name" required name="name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Designation</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2" id="designation"
                                        placeholder="Enter Designation" name="designation">
                                </div>
                            </div>

                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="border-blue-200 form-control rounded-2" id="email"
                                        placeholder="Enter Email" oninput="validateEmail(this)" name="email">
                                    <p id="emailError" class="text-danger"></p>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="border-blue-200 form-control rounded-2" id="phone"
                                        placeholder="Enter Phone" oninput="validatePhone(this)" required name="phone">
                                    <p id="phoneError" class="text-danger"></p>
                                </div>
                            </div>

                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2" id="location"
                                        placeholder="Enter Location" required name="location">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="cat" class="form-label">Category</label>
                                    <select name="categoryId" id="cat"
                                        class="border-blue-200 form-select form-control rounded-2">
                                        @if (!empty($categories))
                                            @foreach ($categories as $data)
                                                <option value="{{ $data['id'] }}">
                                                    {{ $data['categoryName'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Note</label>
                                <textarea class="border-blue-200 form-control rounded-2" id="note" rows="2" placeholder="Enter Note"
                                    name="note"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Avatar</label>
                                <input type="file" class="border-blue-200 rounded-2 form-control form-input"
                                    id="formFile" accept="image/*" onchange="validateImageFile(this)" name="image">
                                <p id="fileError" class="text-danger"></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="bg-red-400 btn btn-danger"
                                    data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="bg-blue-500 btn btn-primary">Add Contact</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- End: add contact modal --}}

        {{-- Start: edit contact modal --}}
        <div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Contact</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <input type="hidden" name="id" id="idEdit">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2" id="nameEdit"
                                        placeholder="Enter Name" required name="name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Designation</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2"
                                        id="designationEdit" placeholder="Enter Designation" name="designation">
                                </div>
                            </div>

                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="border-blue-200 form-control rounded-2" id="emailEdit"
                                        placeholder="Enter Email" oninput="validateEditEmail(this)" name="email">
                                    <p id="editEmailError" class="text-danger"></p>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="editPhone" class="form-label">Edit Phone</label>
                                    <input type="number" class="border-blue-200 form-control rounded-2" id="editPhone"
                                        placeholder="Enter Phone" oninput="validateEditPhone(this)" required
                                        name="phone">
                                    <p id="editPhoneError" class="text-danger"></p>
                                </div>
                            </div>

                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2"
                                        id="editLocation" placeholder="Enter Location" required name="location">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="catEdit" class="form-label">Category</label>
                                    <select name="categoryId" id="catEdit"
                                        class="border-blue-200 form-select form-control rounded-2">
                                        @if (!empty($categories))
                                            @foreach ($categories as $data)
                                                <option value="{{ $data['id'] }}">
                                                    {{ $data['categoryName'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Note</label>
                                <textarea class="border-blue-200 form-control rounded-2" id="noteEdit" rows="2" placeholder="Enter Note"
                                    name="note"></textarea>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="imageOld" name="imageOld" hidden>
                                <label for="editFormFile" class="form-label">Edit Avatar</label>
                                <input type="file" class="border-blue-200 rounded-2 form-control form-input"
                                    id="editFormFile" accept="image/*" onchange="validateEditImageFile(this)"
                                    name="imageEdit">
                                <p id="editFileError" class="text-danger"></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="bg-red-400 btn btn-danger"
                                    data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="bg-blue-500 btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- End: edit contact modal --}}

        {{-- Start: delede contact modal --}}
        <div class="modal fade" id="deleteContactModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ url('deleteContact') }}" method="POST">
                        @csrf
                        <div class="flex justify-end modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                            <input type="text" name="id" id="contact_id" hidden>
                            <img src="{{ asset('assets/images/icons/waning.gif') }}" alt="" width="100"
                                class="">
                            <h1 class="text-center modal-title fs-5 fw-bolder" id="exampleModalLabel">Are You Sure?</h1>
                            <p class="text-center text-gray-400">Do you really want to delete these records? This process
                                cannot be undone.</p>
                        </div>

                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="bg-blue-500 btn btn-primary"
                                data-bs-dismiss="modal">No</button>
                            <button type="submit" class="bg-red-400 btn btn-danger">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End: delede contact modal --}}
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
                $('#deleteContactModal').modal('show');
            });
        });
    </script>


@endsection
