@extends('layouts.layoutDashboard')
@section('content')
    <div class="container-fluid">
        {{-- Start: breadcrumbs --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Category</li>
            </ol>
        </nav>
        {{-- End: breadcrumbs --}}

        {{-- Start: Btn card --}}
        <div class="card">
            <div class="card-body">
                <div class=" d-flex">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="ti ti-cards"></i>
                        Add Category</button>
                </div>
            </div>
        </div>
        {{-- End: Btn card --}}

        {{-- Alert --}}
        @include('components.alert')


        {{-- Start: Table --}}
        <div class="table-responsive">
            <table class="table mb-0 align-middle text-nowrap">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="mb-0 fw-semibold">#</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="mb-0 fw-semibold">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="mb-0 fw-semibold">Note</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="mb-0 fw-semibold">Action</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 fw-normal">test</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 fw-normal">text</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="mb-0 fw-normal">text</h6>
                        </td>
                        <td class="border-bottom-0">
                            <button type="button" class="text-warning edit btn p-2" data-bs-toggle="modal"
                                data-bs-target="#editModal" data-id="" data-categoryname="" data-note="">
                                <a data-bs-toggle="tooltip" data-bs-title="Edit Contact">
                                    <i class="ti ti-pencil fs-5"></i>
                                </a>
                            </button>

                            <button type="button" class="text-danger deleteContactBTN btn p-2" value="">
                                <a data-bs-toggle="tooltip" data-bs-title="Delete Contact">
                                    <i class="ti ti-trash fs-5"></i>
                                </a>
                            </button>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
        {{-- End: Table --}}

        {{-- Start: add Category modal --}}
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex-wrap row">

                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control rounded-2" id="name"
                                        placeholder="Enter Name" required name="categoryName">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="location" class="form-label">Note</label>
                                    <input type="text" class="form-control rounded-2" id="note"
                                        placeholder="Enter Note" name="note">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- End: add Category modal --}}

        {{-- Start: edit Category modal --}}
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex-wrap row">
                                <div class="mb-3 col-md-6">
                                    <input type="hidden" name="id" id="idEdit">
                                    <label for="nameEdit" class="form-label">Category Name</label>
                                    <input type="text" class="form-control rounded-2" id="nameEdit"
                                        placeholder="Enter Name" required name="categoryName">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="noteEdit" class="form-label">Note</label>
                                    <input type="text" class="form-control rounded-2" id="noteEdit"
                                        placeholder="Enter Note" name="note">
                                </div>
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
        {{-- End: edit Category modal --}}

        {{-- Start: delede Category modal --}}
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="#" method="POST">
                        @csrf
                        <div class="flex justify-end modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                            <input type="text" name="id" id="category_id" hidden>
                            <img src="{{ asset('assets/images/icons/waning.gif') }}" alt="" width="100"
                                class="">
                            <h1 class="text-center modal-title fs-5 fw-bolder" id="exampleModalLabel">Are You Sure?</h1>
                            <p class="text-center text-secondary">Do you really want to delete these records? This process
                                cannot be undone.</p>
                        </div>

                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End: delede Category modal --}}

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script>
        // Start :data send to modal
        document.querySelectorAll('.edit').forEach(function(editButton) {
            editButton.addEventListener('click', function() {
                // Extract data attributes
                var id = this.getAttribute('data-id');
                var categoryName = this.getAttribute('data-categoryname');
                var note = this.getAttribute('data-note');

                // Update the modal inputs
                document.getElementById('idEdit').value = id;
                document.getElementById('nameEdit').value = categoryName;
                document.getElementById('noteEdit').value = note;
            });
        });
        // End :data send to modal


        //Delete Category BTn
        $(document).ready(function() {
            $('.deleteCategoryBTN').click(function(e) {
                e.preventDefault();

                var id = $(this).val();
                $('#category_id').val(id);
                // alert(id);
                $('#deleteCategoryModal').modal('show');
            });
        });
    </script>
@endsection
