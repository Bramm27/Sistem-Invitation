@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="container">
                <h4 class="mb-4">Daftar Ulasan</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 50%;">Review</th>
                                <th style="width: 20%;">Rating</th>
                                <th style="width: 30%;">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $key => $review)
                                <tr>
                                    <td style="word-wrap: break-word; white-space: normal;">
                                        {{ $review->review }}
                                    </td>
                                    <td>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fa-solid fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></i>
                                        @endfor
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    td {
        word-wrap: break-word;
        white-space: normal;
    }
</style>
@endpush
