@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="card bg-blueGray-100 w-full">
            <div class="card-header">
                <div class="card-row">
                    <h6 class="card-title">
                        Dashboard
                    </h6>
                </div>
            </div>

            <div class="card-body">
                <div class="flex py-3 space-x-2">
                    <div>
                        My current plan: {{ $currentSubscription->plan->name ?? 'No active plan' }}

                        @if($currentSubscription !== null)
                            active until {{ $currentSubscription?->expired_at->format('Y-m-d') }}
                        @endif
                    </div>

                    @if($currentSubscription !== null && $currentSubscription?->plan->name !== 'Trial')
                        <form method="POST" action="{{ route('admin.plan.destroy', $currentSubscription->plan) }}">
                            @csrf
                            @method('DELETE')

                            [<button class="hover:underline">Cancel plan</button>]
                        </form>
                    @endif
                </div>

                <div>Silver | Gold</div>
                <div class="flex space-x-0.5">
                    <form method="POST" action="{{ route('admin.plan.update', 1) }}">
                        @csrf
                        @method('PUT')

                        [<button class="hover:underline">Go monthly for $9.99/month</button>]
                    </form>

                    <div>|</div>

                    <form method="POST" action="{{ route('admin.plan.update', 3) }}">
                        @csrf
                        @method('PUT')

                        [<button class="hover:underline">Go monthly for $19.99</button>]
                    </form>
                </div>

                <div class="flex space-x-0.5">
                    <form method="POST" action="{{ route('admin.plan.update', 2) }}">
                        @csrf
                        @method('PUT')

                        [<button class="hover:underline">Go yearly for $99.99/year</button>]
                    </form>

                    <div>|</div>

                    <form method="POST" action="{{ route('admin.plan.update', 4) }}">
                        @csrf
                        @method('PUT')

                        [<button class="hover:underline">Go yearly for $199.99</button>]
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
