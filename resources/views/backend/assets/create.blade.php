<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Asset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <form>

                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="" class="form-label">Description</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="" class="form-label">Price</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary text-dark">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
