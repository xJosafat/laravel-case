<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit employee') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Edit Employee</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="javascript:history.back()" title="Go back"> <i class="fas fa-backward "></i> </a>
                            </div>
                        </div>
                    </div>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{URL::to('/')}}/employeesAdmin/{{$employee->id}}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name prefix:</strong>
                                    <input type="text" name="name_prefix" class="form-control" value="{{$employee->name_prefix}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" class="form-control" value="{{$employee->first_name}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Middle initial:</strong>
                                    <input type="text" maxlength="1" name="middle_initial" class="form-control" value="{{$employee->middle_initial}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" class="form-control" value="{{$employee->last_name}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Gender:</strong>
                                    <input type="text" maxlength="1" name="gender" class="form-control" value="{{$employee->gender}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="text" name="email" class="form-control" value="{{$employee->email}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Father's name:</strong>
                                    <input type="text" name="father_name" class="form-control" value="{{$employee->father_name}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Mother's name:</strong>
                                    <input type="text" name="mother_name" class="form-control" value="{{$employee->mother_name}}">
                                    <strong>Maiden name:</strong>
                                    <input type="text" name="mother_maiden_name" class="form-control" value="{{$employee->mother_maiden_name}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Birth date:</strong>
                                    <input type="text" name="birth_date" class="form-control" value="{{$employee->birth_date}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Joining date:</strong>
                                    <input type="text" name="joining_date" class="form-control" value="{{$employee->joining_date}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Salary:</strong>
                                    <input type="number" name="salary" class="form-control" value="{{$employee->salary}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>SSN:</strong>
                                    <input type="text" name="ssn" class="form-control" value="{{$employee->ssn}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Phone:</strong>
                                    <input type="text" name="phone" class="form-control" value="{{$employee->phone}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Location:</strong>
                                    <input type="text" name="city" class="form-control" value="{{$employee->city}}"> <input type="text" name="state" class="form-control" value="{{$employee->state}}">
                                    <strong>ZIP code:</strong>
                                    <input type="text" name="zip" class="form-control" value="{{$employee->zip}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
