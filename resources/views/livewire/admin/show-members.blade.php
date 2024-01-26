<div>
    {{-- Do your work, then step back. --}}

        <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Members</h5>
                    <div class="d-flex align-items-center justify-content-between mb-4">

                        <input type="text" wire:model="search"  name="search" class="form-control sm w-auto" value="" placeholder="search">
{{--                        <div>--}}
{{--                            <select  wire:model="status" class="form-select">--}}
{{--                                <option value="">All</option>--}}
{{--                                <option value="Blocked">Blocked</option>--}}
{{--                                <option value="Unblocked">Unblocked</option>--}}

{{--                            </select>--}}
{{--                        </div>--}}
                        {{-- <a class="btn btn-primary" href="{{route('member.create-contribution')}}">Add</a> --}}
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
                                    <h6 class="fw-semibold mb-0">Email</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Phone</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Action</h6>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>

                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{$member->created_at->format('d-m-y')}}</p>
                                    </td>
                                       <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{$member->first_name}} {{$member->last_name}}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{$member->email}}</p>
                                    </td>

                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{$member->phone}}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                       
                                            {{-- @if($member->status == 'Pending') --}}

                                                   <a class="sidebar-link" href="{{ route('admin.view-member-contribution', $member->id) }}">
                                                                             {{-- <i class="ti ti-edit"></i> --}}
                                               <span class="badge bg-primary rounded-3 fw-semibold">View</span>
                                          </a>

                                                <a class="" href="{{ route('admin.delete-member', $member->id) }}">
                                                    {{--                                                <i class="ti ti-delet"></i>--}}
                                                    <span class="badge bg-danger rounded-3 fw-semibold">Delete</span>
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
                     {{ $members->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
