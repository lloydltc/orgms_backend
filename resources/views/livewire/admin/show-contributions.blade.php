<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Contributions</h5>
                    <div class="d-flex align-items-center justify-content-between mb-4">

                        <input type="text" wire:model="search"  name="search" class="form-control sm w-auto" value="" placeholder="search">
{{--                        <div>--}}
{{--                            <select  wire:model="status" class="form-select">--}}
{{--                                <option value="">All</option>--}}
{{--                                <option value="Blocked">Blocked</option>--}}
{{--                                <option value="Unblocked">Unblocked</option>--}}

{{--                            </select>--}}
{{--                        </div>--}}
                        {{-- <a class="btn btn-primary" href="{{route('member.create-contribution')}}">Contribute</a> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Date</h6>
                                </th>
                                  <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Name</h6>
                                </th>
                                 <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Description</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Amount</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Status</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Action</h6>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contributions as $contribution)
                                <tr>

                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{$contribution->created_at->format('d-m-y')}}</p>
                                    </td>
                                     <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{$contribution->user->first_name}} {{$contribution->user->lasst_name}}</p>
                                    </td>
                                       <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{$contribution->description}}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{$contribution->amount}}</p>
                                    </td>

                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{$contribution->status}}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            {{--                                        <div class="d-flex align-items-center gap-2">--}}
                                            {{--                                            <span class="badge bg-primary rounded-3 fw-semibold">Low</span>--}}
                                            {{--                                        </div>--}}
                                    
                                            {{-- <a class="sidebar-link" href="{{ route('worker.wallet.view-contribution', $withdrawal->id) }}"> --}}
                                                {{--                                            <i class="ti ti-edit"></i>--}}
                                                {{-- <span class="badge bg-primary rounded-3 fw-semibold">View</span>
                                            </a> --}}
                                            {{-- @if($contribution->status == 'Pending') --}}

                                                   <a class="sidebar-link" href="{{ route('admin.approve-contribution', $contribution->id) }}">
                                                                             {{-- <i class="ti ti-edit"></i> --}}
                                               <span class="badge bg-primary rounded-3 fw-semibold">Approve</span>
                                           </a>

                                                <a class="" href="{{ route('admin.decline-contribution', $contribution->id) }}">
                                                    {{--                                                <i class="ti ti-delet"></i>--}}
                                                    <span class="badge bg-danger rounded-3 fw-semibold">Decline</span>
                                                </a>
                                            {{-- @endif --}}
                                        </div>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="mx-6">
                     {{ $contributions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
