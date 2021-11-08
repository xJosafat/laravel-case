<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <a class="btn btn-success" href="" title="New employee"> <i class="fas fa-plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-responsive-lg">
                            <tr>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>
                                        <form action="" method="POST">
                                            <a href="{{URL::to('/')}}/employees/{{$employee->id}}" title="show">
                                                <i class="fas fa-eye text-success  fa-lg"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {!! $employees->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
