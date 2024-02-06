<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="h3 pb-1">Request</div>
                    {{-- {{ __("You're logged in!") }} --}}
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>User</th>
                                <th>Asset</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assetRequests as $assetRequest)
                                <tr>
                                    <td>{{ $assetRequest->user->name }}</td>
                                    <td>{{ $assetRequest->assets->name }}</td>
                                    <td>{{ $assetRequest->quantity }}</td>
                                    <td>{{ $assetRequest->assets->price * $assetRequest->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="h3">Assets</div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <a href="{{ route('admin.asset.create') }}" class="btn btn-primary">Add new</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assets as $asset)
                                <tr>
                                    <td>{{ $asset->name }}</td>
                                    <td>{{ $asset->description }}</td>
                                    <td>{{ $asset->price }}</td>
                                    <td>
                                        -
                                        {{-- <a href="#" class="btn btn-warning">Edit</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
