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
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="h3">My Assets</div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <a href="{{ route('user.assetrequest.create') }}" class="btn btn-primary">Add new</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>User</th>
                                <th>Asset</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requestAssets as $requestAsset)
                                <tr>
                                    <td>{{ $requestAsset->user->name }}</td>
                                    <td>{{ $requestAsset->assets->name }}</td>
                                    <td>{{ $requestAsset->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
