<form action="{{ route('member.presence.destroy', [$member_id,$presence->id]) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this presence?')">Supprimer</button>
</form>