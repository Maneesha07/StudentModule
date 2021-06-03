@extends('layouts.app', ['title' => __('Student Management')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 order-xl-1">
                <div class="card">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Student Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('students.index') }}" class="btn btn-sm btn-primary back-to-previous">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('students.update', $student) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Student information') }}</h6>                            
                            <div class="pl-lg-0">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name of the Student') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $student->name) }}"  autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-age">{{ __('Age') }}</label>
                                    <input type="text" name="age" id="input-age" class="form-control form-control-alternative{{ $errors->has('age') ? ' is-invalid' : '' }}" placeholder="{{ __('Age') }}" value="{{ old('age', $student->age) }}" >

                                    @if ($errors->has('age'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-gender">{{ __('Gender') }}</label>
                                    <select name="gender" id="input-gender" class="form-control form-control-alternative{{ $errors->has('gender') ? ' is-invalid' : '' }}">
                                        <option value="">Select Any</option>
                                        <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('teacher_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="select-teacher_id">{{ __('Reporting Teacher') }}</label>
                                    <select name="teacher_id" id="select-teacher_id" class="form-control form-control-alternative{{ $errors->has('teacher_id') ? ' is-invalid' : '' }}">
                                        <option value="">Select Any</option>
                                        @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ $student->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->first_name ." ".$teacher->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('teacher_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('teacher_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-0">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-success mt-2">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection