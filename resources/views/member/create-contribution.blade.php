@extends('layouts.member')
@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Make Contribution</h5>

                    <form action="{{ route('member.store-contribution') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="description" class="form-label">Description</label>
                                <input  type="text" class="form-control" name="description" id="description"  aria-describedby="textHelp">
                                @error('description')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number"  name="amount" class="form-control" id="amount" aria-describedby="amount">
                                @error('amount')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Submit </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection