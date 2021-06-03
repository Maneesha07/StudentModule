@extends('layouts.app', ['title' => __('Marks Management')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 order-xl-1">
                <div class="card">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Marks Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('marks.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('marks.update', $marks) }}" autocomplete="off">
                                @csrf
                                @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Update Mark List') }}</h6>
                            <div class="pl-lg-0">
                                <div class="form-group{{ $errors->has('student_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="select-student_id">{{ __('Name of the Student') }}</label>
                                    <select name="student_id" id="select-student_id" class="form-control form-control-alternative{{ $errors->has('student_id') ? ' is-invalid' : '' }}">
                                        <option value="">Select Any</option>
                                        @foreach($students as $student)
                                        <option value="{{ $student->id }}"  {{ $marks->student_id == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('student_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('student_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('mark_in_maths') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-mark_in_maths">{{ __('Maths') }}</label>
                                    <input type="text" name="mark_in_maths" id="input-mark_in_maths" class="form-control form-control-alternative{{ $errors->has('mark_in_maths') ? ' is-invalid' : '' }}" placeholder="{{ __('Mark') }}" value="{{ old('mark_in_maths', $marks->mark_in_maths) }}" >

                                    @if ($errors->has('mark_in_maths'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mark_in_maths') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('mark_in_science') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-mark_in_science">{{ __('Science') }}</label>
                                    <input type="text" name="mark_in_science" id="input-mark_in_science" class="form-control form-control-alternative{{ $errors->has('mark_in_science') ? ' is-invalid' : '' }}" placeholder="{{ __('Mark') }}" value="{{ old('mark_in_science', $marks->mark_in_science) }}" >

                                    @if ($errors->has('mark_in_science'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mark_in_science') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('mark_in_history') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-mark_in_history">{{ __('History') }}</label>
                                    <input type="text" name="mark_in_history" id="input-mark_in_history" class="form-control form-control-alternative{{ $errors->has('mark_in_history') ? ' is-invalid' : '' }}" placeholder="{{ __('Mark') }}" value="{{ old('mark_in_history', $marks->mark_in_history) }}" >

                                    @if ($errors->has('mark_in_history'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mark_in_history') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('terms') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="select-terms">{{ __('Terms') }}</label>
                                    <select name="terms" id="select-terms" class="form-control form-control-alternative{{ $errors->has('terms') ? ' is-invalid' : '' }}">
                                        <option value="">Select Any</option>
                                        <option value="Term 1" {{ $marks->terms == 'Term 1' ? 'selected' : '' }}>Term 1</option>
                                        <option value="Term 2" {{ $marks->terms == 'Term 2' ? 'selected' : '' }}>Term 2</option>
                                        <option value="Term 3" {{ $marks->terms == 'Term 3' ? 'selected' : '' }}>Term 3</option>
                                    </select>
                                    @if ($errors->has('terms'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('terms') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-0">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-success mt-2">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

