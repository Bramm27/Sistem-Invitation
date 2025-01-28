@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex">
                    <h6>Guest table</h6>
                    @if (auth()->check() && auth()->user()->role_id == 1)
                        <a href="/admin/create" class="btn btn-primary ms-auto">Add Guest</a>
                    @endif
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
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link Invitation</th>
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
            @elseif($person->respons == 'hadir') bg-gradient-success 
            @else bg-gradient-danger @endif">
                                                {{ $person->respons }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($person->check_in == 'Tamu Hadir' || $person->check_in == 'Tamu Tidak Hadir')
                                                <!-- Jika sudah check-in, tampilkan status sebagai teks -->
                                                <span
                                                    class="badge bg-gradient-{{ $person->check_in == 'Tamu Hadir' ? 'success' : 'danger' }}">
                                                    {{ $person->check_in }}
                                                </span>
                                            @else
                                                <!-- Jika belum check-in, tampilkan tombol untuk check-in -->
                                                @if (auth()->check() && auth()->user()->role_id == 1)
                                                <button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal"
                                                    data-bs-target="#checkInModal_{{ $person->id }}">
                                                    Check In
                                                </button>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <a href="http://127.0.0.1:8000/invited/{{ $person->username }}" class="text-xs font-weight-bold mb-0">http://127.0.0.1:8000/invited/{{ $person->username }}</a>
                                        </td>
                                    </tr>

                                    <!-- Modal untuk setiap tamu -->
                                    <div class="modal fade" id="checkInModal_{{ $person->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Kehadiran untuk {{ $person->name }}
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-center">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).on('click', '.btnHadir, .btnTidakHadir', function() {
            let personId = $(this).data('id');
            let status = $(this).hasClass('btnHadir') ? 'hadir' : 'tidak hadir'; // Sesuaikan status

            $.ajax({
                url: "{{ route('guest.checkin') }}",
                method: 'POST',
                data: {
                    id: personId,
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Cari tombol Check In dan ubah menjadi span dengan status
                    let button = $('button[data-bs-target="#checkInModal_' + personId + '"]');
                    button.replaceWith(
                        `<span class="badge bg-gradient-${status === 'hadir' ? 'success' : 'danger'}">
                    Tamu ${status === 'hadir' ? 'Hadir' : 'Tidak Hadir'}
                </span>`
                    );

                    // Menutup modal dengan benar
                    let modal = $('#checkInModal_' + personId);
                    modal.modal('hide');

                    // Menghapus overlay hitam setelah modal ditutup
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                },
                error: function(xhr) {
                    // Menangani error jika terjadi masalah
                    console.error('Terjadi kesalahan:', xhr.responseJSON.message);
                }
            });
        });
    </script>
@endpush
