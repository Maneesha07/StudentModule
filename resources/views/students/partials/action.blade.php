<a class="btn btn-md btn-primary" title="Edit"  href="{{ route('students.edit', $student) }}"><i class="fa fa-pencil"></i></a>
<form action="{{ route('students.destroy', $student) }}" method="post">
    @csrf
    @method('delete')
    <button type="button" title="Delete" class="btn btn-md btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this student?") }}') ? this.parentElement.submit() : ''">
    <i class="fa fa-trash"></i>
    </button>
</form>
