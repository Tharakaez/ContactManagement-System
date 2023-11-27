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
                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">tharakarz@gmail.com</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">077 540 5228</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">Kandy</h6>
                        </td>

                        <td class="border-bottom-0">
                            <button type="button" class="bg-orange-300 btn btn-warning">
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
                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">tharakarz@gmail.com</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">077 540 5228</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">Kandy</h6>
                        </td>
                        <td class="border-bottom-0">
                            <button type="button" class="bg-orange-300 btn btn-warning">
                                Unfavorite
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
                        <button type="button" class="" data-bs-dismiss="modal" aria-label="Close">
                            <i class=" ti ti-x fs-5 hover:text-red-600"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2" id="name"
                                        placeholder="Enter Name" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Designation</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2" id="designation"
                                        placeholder="Enter Designation">
                                </div>
                            </div>

                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="border-blue-200 form-control rounded-2" id="email"
                                        placeholder="Enter Email" oninput="validateEmail(this)">
                                    <p id="emailError" class="text-danger"></p>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="border-blue-200 form-control rounded-2" id="phone"
                                        placeholder="Enter Phone" oninput="validatePhone(this)" required>
                                    <p id="phoneError" class="text-danger"></p>
                                </div>
                            </div>

                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2" id="location"
                                        placeholder="Enter Location" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="location" class="form-label">Note</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2" id="note"
                                        placeholder="Enter Note">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Avatar</label>
                                <input type="file" class="border-blue-200 rounded-2 form-control form-input"
                                    id="formFile" accept="image/*" onchange="validateImageFile(this)">
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
                        <button type="button" class="" data-bs-dismiss="modal" aria-label="Close">
                            <i class=" ti ti-x fs-5 hover:text-red-600"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2" id="nameEdit"
                                        placeholder="Enter Name" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Designation</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2"
                                        id="designationEdit" placeholder="Enter Designation">
                                </div>
                            </div>

                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="border-blue-200 form-control rounded-2" id="emailEdit"
                                        placeholder="Enter Email" oninput="validateEditEmail(this)">
                                    <p id="editEmailError" class="text-danger"></p>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="editPhone" class="form-label">Edit Phone</label>
                                    <input type="number" class="border-blue-200 form-control rounded-2" id="editPhone"
                                        placeholder="Enter Phone" oninput="validateEditPhone(this)" required>
                                    <p id="editPhoneError" class="text-danger"></p>
                                </div>
                            </div>

                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2"
                                        id="editLocation" placeholder="Enter Location" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="location" class="form-label">Note</label>
                                    <input type="text" class="border-blue-200 form-control rounded-2" id="editNote"
                                        placeholder="Enter Note">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="editFormFile" class="form-label">Edit Avatar</label>
                                <input type="file" class="border-blue-200 rounded-2 form-control form-input"
                                    id="editFormFile" accept="image/*" onchange="validateEditImageFile(this)">
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
                    <div class="flex justify-end modal-header">
                        <button type="button" class="" data-bs-dismiss="modal" aria-label="Close">
                            <i class=" ti ti-x fs-5 hover:text-red-600"></i>
                        </button>
                    </div>
                    <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('assets/images/icons/waning.gif') }}" alt="" width="100"
                            class="">
                        <h1 class="text-center modal-title fs-5 fw-bolder" id="exampleModalLabel">Are You Sure?</h1>
                        <p class="text-center text-gray-400">Do you really want to delete these records? This process
                            cannot be undone.</p>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="bg-blue-500 btn btn-primary" data-bs-dismiss="modal">No</button>
                        <button type="button" class="bg-red-400 btn btn-danger">Yes</button>
                    </div>

                </div>
            </div>
        </div>
        {{-- End: delede contact modal --}}
    </div>
@endsection
