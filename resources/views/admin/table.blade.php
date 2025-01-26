@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex">
                    <h6>Guest table</h6>
                    <a href="/admin/create" class="btn btn-primary ms-auto">Add Guest</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                        Guest
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Company
                                        Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        No. Handphone</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Check-in</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guests as $person)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('admin') }}/assets/img/team-2.jpg"
                                                        class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $person->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $person->company_name }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">+62 {{ $person->number_phone }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="badge badge-sm 
                                                @if ($person->respons == 'Belum ada respon') bg-gradient-warning 
                                                @elseif($person->respons == 'Hadir') bg-gradient-success 
                                                @else bg-gradient-danger @endif">
                                                {{ $person->respons }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal"
                                                data-bs-target="#checkInModal_{{ $person->id }}">
                                                Check In
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal untuk setiap tamu -->
                                    <div class="modal fade" id="checkInModal_{{ $person->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <h5 class="modal-title">Konfirmasi Kehadiran untuk {{ $person->name }}
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                    <p>Apakah Anda hadir?</p>
                                                    <button class="btn btn-success btnHadir"
                                                        data-id="{{ $person->id }}">Hadir</button>
                                                    <button class="btn btn-danger btnTidakHadir"
                                                        data-id="{{ $person->id }}">Tidak Hadir</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Event delegation untuk tombol Check In dalam tabel yang dimuat secara dinamis
            $(document).on('click', '.checkInButton', function() {
                let personId = $(this).data('id');
                console.log('Person ID:', personId);

                // Set data-id pada button modal
                $('#btnHadir').attr('data-id', personId);
                $('#btnTidakHadir').attr('data-id', personId);

                // Menampilkan modal menggunakan Bootstrap API
                let modal = new bootstrap.Modal(document.getElementById('checkInModal'));
                modal.show();
            });

            // AJAX ketika klik tombol "Hadir"
            $('#btnHadir').on('click', function() {
                let personId = $(this).attr('data-id');

                $.ajax({
                    url: '/check-in',
                    method: 'POST',
                    data: {
                        id: personId,
                        status: 'hadir',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Status berhasil diubah menjadi Hadir');
                        $('#checkInModal').modal('hide');
                        location.reload(); // Refresh halaman untuk update data
                    },
                    error: function() {
                        alert('Terjadi kesalahan, coba lagi.');
                    }
                });
            });

            // AJAX ketika klik tombol "Tidak Hadir"
            $('#btnTidakHadir').on('click', function() {
                let personId = $(this).attr('data-id');

                $.ajax({
                    url: '/check-in',
                    method: 'POST',
                    data: {
                        id: personId,
                        status: 'tidak hadir',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Status berhasil diubah menjadi Tidak Hadir');
                        $('#checkInModal').modal('hide');
                        location.reload(); // Refresh halaman untuk update data
                    },
                    error: function() {
                        alert('Terjadi kesalahan, coba lagi.');
                    }
                });
            });
        });
    </script>
@endpush
