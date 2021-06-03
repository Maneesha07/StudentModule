<a class="btn btn-md btn-primary" href="{{ route('marks.edit', $marks) }}" title="Edit"><i class="fa fa-pencil"></i></a>
<form action="{{ route('marks.destroy', $marks) }}" method="post">
    @csrf
    @method('delete')
    <button type="button"  title="Delete" class="btn btn-md btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this marks ?") }}') ? this.parentElement.submit() : ''">
    <i class="fa fa-trash"></i>
    </button>
</form>
