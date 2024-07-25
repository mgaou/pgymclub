<table style="border-collapse: collapse; border: 1px solid #595959;">
	<tbody>
		<tr>
			<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">NOM</td>
			<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">PRENOMS</td>
			<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">SEXE</td>
			<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">TELEPHONE</td>
			<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">EMAIL</td>
			<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">ADRESSE</td>
			<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">CATEGORIE</td>
			<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">OBSERVATIONS</td>
		</tr>

		@foreach($data as $item)
			<tr>
				<td colspan="8" style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">{{ $item->name }}</td>
			</tr>
			@foreach($item->members as $member)
			<tr>
				<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">{{$member->firstname}}</td>
				<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">{{$member->lastname}}</td>
				<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">{{$member->gender}}</td>
				<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">{{$member->phone}}</td>
				<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">{{$member->email}}</td>
				<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;r">{{$member->adress}}</td>
				<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;">{{$member->category->name}}</td>
				<td style="text-align: center; border-collapse: collapse; border: 1px solid #595959;"></td>
			</tr>
			@endforeach
			<tr>
				<td colspan="8" style="border-collapse: collapse; border: 1px solid #595959;">Effectif: {{$item->members->count()}}</td>
			</tr>
    	@endforeach
	</tbody>
</table>